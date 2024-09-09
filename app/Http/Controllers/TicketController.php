<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{


    public function index()
    {
        $tickets = Ticket::all();
        return view('dashboard.ticket.index', compact('tickets'));
    }
    public function create()
    {
        return view('dashboard.ticket.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'ticket_name' => 'required',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|between:0,9999999.99',
            'ticket_status' => 'required'
        ]);

        Ticket::create([
            'ticket_name' => $request->ticket_name,
            'stock' => $request->stock,
            'price' => $request->price,
            'ticket_status' => $request->ticket_status
        ]);

        return Redirect::route('dashboard.ticket.index')->with('success', 'Tiket berhasil ditambahkan.');
    }

    public function edit(Ticket $ticket)
    {
        return view('dashboard.ticket.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'ticket_name' => 'required',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|between:0,9999999.99',
        ]);


        // $stock = $ticket->stock;


        // $status = $stock < 2 ? 'Habis' : $request->ticket_status;

        $ticket->update([
            'ticket_name' => $request->ticket_name,
            'stock' => $request->stock,
            'price' => $request->price,
            'ticket_status' => $request->ticket_status
        ]);

        return Redirect::route('dashboard.ticket.index')->with('success', 'Tiket berhasil diedit.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return Redirect::route('dashboard.ticket.index');
    }
}
