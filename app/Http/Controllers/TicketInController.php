<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\TicketIn;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TicketInController extends Controller
{
    public function index()
    {

        $tickets = Ticket::all();
        $ticketsIn = TicketIn::with(['ticket'])->get();
        return view('dashboard.ticket_in.index', compact('ticketsIn', 'tickets'));
    }

    public function create()
    {
        $tickets = Ticket::all();
        return view('dashboard.ticket_in.create', compact('tickets'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required',
            'old_stock' => 'required',
            'in_stock' => 'required'
        ]);

        $tickets = Ticket::find($request->ticket_id);
        $JumlahBaru = $tickets->stock + $request->in_stock;

        TicketIn::create([
            'ticket_id' => $request->ticket_id,
            'old_stock' => $tickets->stock,
            'new_stock' => $JumlahBaru,
            'in_stock' => $request->in_stock
        ]);

        $tickets->update([
            'stock' => $JumlahBaru
        ]);

        return Redirect::route('dashboard.ticket_in.index');
    }

    public function edit(TicketIn $ticketIn)
    {

        $tickets = Ticket::all();
        return view('dashboard.ticket_in.edit', compact('ticketIn', 'tickets'));
    }


    public function update(TicketIn $ticketIn, Request $request)
    {
        $request->validate([
            'ticket_id' => 'required',
            'old_stock' => 'required',
            'in_stock' => 'required'
        ]);

        $tickets = Ticket::find($request->ticket_id);
        $JumlahBaru = $tickets->stock - $ticketIn->in_stock;
        $JumlahEdit = $JumlahBaru + $request->in_stock;

        $ticketIn->update([
            'ticket_id' => $request->ticket_id,
            'old_stock' => $tickets->stock,
            'new_stock' => $JumlahEdit,
            'in_stock' => $request->in_stock
        ]);

        $tickets->update([
            'stock' => $JumlahEdit
        ]);

        return Redirect::route('dashboard.ticket_in.index');
    }


    public function destroy(TicketIn $ticketIn)
    {

        $ticket = Ticket::find($ticketIn->ticket_id);
        $JumlahBaru = $ticket->stock - $ticketIn->in_stock;


        $ticket->update([
            'stock' => $JumlahBaru
        ]);

        $ticketIn->delete();
        return Redirect::route('dashboard.ticket_in.index');
    }
}
