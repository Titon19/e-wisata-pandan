<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id'); // 'user_id' adalah foreign key di tabel complaints
    }
}
