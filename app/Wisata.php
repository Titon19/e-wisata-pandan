<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';
    protected $fillable = [
        'wisata',
        'slug',
        'price',
        'stock',
        'ticket_status',
        'category_id',
        'desc',
        'address',
        'latitude',
        'longitude',
        'thumbnail',
    ];
    public function facilities()
    {
        // params = ['Model', 'Pivot table name', 'foreign_key', 'local_key']
        return $this->belongsToMany('App\Fasilitas', 'wisata_facility', 'wisata_id', 'facility_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Kategori');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaction');
    }
}
