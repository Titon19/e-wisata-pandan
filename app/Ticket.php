<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'ticket_name',
        'stock',
        'price',
        'ticket_status'
    ];

    public function transaksi()
    {
        return $this->hasMany('App\Transaction', 'ticket_id', 'id');
    }
    public function ticketIn()
    {
        return $this->hasMany('App\TicketIn', 'ticket_id', 'id');
    }
}
