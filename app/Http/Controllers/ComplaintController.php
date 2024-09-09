<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => ['required', 'min:3', 'max:50']
        ]);

        $complaint = new Complaint();
        $complaint->transaction_id = $request->transaction_id;
        $complaint->user_id = Auth::user()->id;
        $complaint->body = $request->body;
        $complaint->save();

        $transactionId = $request->transaction_id;
        $userRole = Auth::user()->role;
        $userId = Auth::user()->id;

        if ($userRole == 'member') {
            Complaint::where('transaction_id', $transactionId)
                ->where('user_id', $userId)
                ->update(['seen' => 1]);
        } else {
            Complaint::where('transaction_id', $transactionId)
                ->where('user_id', $userId)
                ->update(['seenForAdmin' => 1]);
        }
        dd($request->all());

        return redirect()->back()->with('success', 'Komplain berhasil dikirim');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
