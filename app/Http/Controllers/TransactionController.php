<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Wisata;
use App\Complaint;
use App\Transaction;
use App\PaymentMethod;
use App\TransactionDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('member_id', Auth::user()->id)
            ->with(['wisata', 'transaksi_detail'])
            ->get();

        $complaints = Complaint::where('user_id', Auth::user()->id)
            ->whereIn('transaction_id', $transactions->pluck('id'))
            ->with('user')
            ->get();

        $data = [
            'title' => 'E-Wisata | Pesanan Saya',
            'transactions' => $transactions,
            'complaints' => $complaints, // Make sure to include this line
            'userName' => Auth::user()->name,
            'userAvatar' => Auth::user()->avatar
        ];

        return view('dashboard.transaksi.pesananku', $data);
    }


    public function create()
    {
        $paymentMethods = PaymentMethod::all();
        $wisata = Wisata::all();
        $tickets = Ticket::all();

        $data = [
            'title' => 'Buat Pesanan',
            'paymentMethods' => $paymentMethods,
            'wisata' => $wisata,
            'tickets' => $tickets
        ];

        return view('dashboard.transaksi.create', $data);
    }

    public function pemesanan()
    {
        $transactions = Transaction::with(['wisata', 'member'])->orderBy('id', 'DESC')->get();

        $complaints = Complaint::where('user_id', Auth::user()->id)
            ->whereIn('transaction_id', $transactions->pluck('id'))
            ->with('user')
            ->get();

        $data = [
            'title' => 'E-Wisata | Data Pemesanan',
            'transactions' => $transactions,
            'complaints' => $complaints,
            'userName' => Auth::user()->name,
            'userAvatar' => Auth::user()->avatar
        ];

        return view('dashboard.transaksi.pemesanan', $data);
    }

    /**
     * Show pesanan saya detail oleh member, can upload bukti pembayaran
     */
    public function show($id)
    {
        $transaction = Transaction::where('id', $id)->with(['wisata', 'transaksi_detail'])->first();
        $data = [
            'title' => env('APP_NAME') . ' | Detail Pesanan',
            'transaction' => $transaction,
            'userName' => Auth::user()->name,
            'userRole' => Auth::user()->role
        ];

        return view('dashboard.transaksi.show', $data);
    }

    public function print($id)
    {
        $transaction = Transaction::where('id', $id)->with(['wisata', 'transaksi_detail'])->first();
        $data = [
            'title' => env('APP_NAME') . ' | Detail Pesanan',
            'transaction' => $transaction,
            'userName' => Auth::user()->name,
            'userRole' => Auth::user()->role
        ];

        return view('dashboard.transaksi.print', $data);
    }

    public function report(Request $request, $id)
    {
        // Menemukan transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);

        // Validasi data yang diterima dari form
        $request->validate([
            'body' => ['required', 'min:3', 'max:50']
        ]);

        // Membuat instance Complaint
        $complaint = new Complaint();
        $complaint->transaction_id = $transaction->id; // Menggunakan ID transaksi yang ditemukan
        $complaint->user_id = Auth::user()->id;
        $complaint->body = $request->body;
        $complaint->save();

        // Mengupdate status "seen" berdasarkan peran pengguna
        $userRole = Auth::user()->role;
        $userId = Auth::user()->id;

        $updateData = [];
        if ($userRole == 'member') {
            $updateData['seen'] = 1;
        } else {
            $updateData['seenForAdmin'] = 1;
        }

        // Mengupdate status pengaduan
        Complaint::where('transaction_id', $transaction->id)
            ->where('user_id', $userId)
            ->update($updateData);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim.');
    }


    /**
     * Detail pesanan and admin can manage status lunas
     */
    public function detail($id)
    {
        $transaction = Transaction::where('id', $id)->with(['wisata', 'transaksi_detail'])->first();
        $data = [
            'title' => env('APP_NAME') . ' | Detail Pesanan',
            'transaction' => $transaction,
            'userName' => Auth::user()->name,
            'userRole' => Auth::user()->role
        ];
        $transaction->read_booking = 1;
        $transaction->read_review = 1;
        $transaction->save();
        return view('dashboard.transaksi.detail', $data);
    }

    public function upload_bukti(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => ['required', 'file', 'mimes:jpg,jpeg,png,bmp', 'between:0,2048']
        ]);

        if ($request->hasFile('payment_proof')) {
            $filename = Str::random(32) . '.' . $request->file('payment_proof')->getClientOriginalExtension();
            $file_path = $request->file('payment_proof')->storeAs('public/uploads', $filename);
        }

        $transaksi = Transaction::find($id);
        $transaksi->payment_proof = isset($file_path) ? $file_path : '';
        $transaksi->save();

        return redirect()->back()->with('success', 'Berhasil mengupload bukti pembayaran');
    }

    public function destroy($id)
    {
        $transaksi = Transaction::find($id);

        // Delete transaksi detail
        TransactionDetail::where('transaction_id', $transaksi->id)->delete();

        $transaksi->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data transaksi');
    }

    public function set_lunas(Request $request, $id)
    {
        $transaksi = Transaction::find($id);
        $transaksi->status = 1;
        $transaksi->save();

        return redirect()->back()->with('success', 'Berhasil mengupdate data');
    }

    public function testimoni_update(Request $request, $id)
    {
        $request->validate([
            'testimoni' => ['required', 'string', 'max:255']
        ]);

        $transaksi = Transaction::find($id);
        $transaksi->testimoni = $request->testimoni;
        $transaksi->star_score = $request->star_score;
        $transaksi->read_review = 0;
        $transaksi->save();

        $transaksi->touch();

        return redirect()->back()->with('success', 'Berhasil memberikan review');
    }

    public function testimoni_list()
    {
        $testimoni = Transaction::with(['wisata', 'member'])
            ->whereNotNull('testimoni') // Hanya ambil data dengan kolom testimoni tidak null
            ->orderBy('id', 'DESC')
            ->get();

        $data = [
            'title' => 'E-Wisata | Pesan Formulir Kontak',
            'testimoni' => $testimoni,
            'userName' => Auth::user()->name,
            'userRole' => Auth::user()->role
        ];

        return view('dashboard.testimoni.index', $data);
    }

    public function destroyTestimoni($id)
    {
        $transaction = Transaction::find($id);

        if ($transaction) {
            $transaction->update(['testimoni' => null]);
            return redirect()->back()->with('success', 'Berhasil menghapus testimoni');
        }

        return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
    }
}
