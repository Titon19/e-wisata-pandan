<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketIn extends Model
{
    protected $table = 'tickets_in';
    protected $fillable = [
        'ticket_id',
        'old_stock',
        'new_stock',
        'in_stock',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
}
