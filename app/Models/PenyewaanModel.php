<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyewaanModel extends Model
{
    use HasFactory;

    protected $table = 'data_penyewaan_mobil';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal_disewa',
        'tanggal_pengembalian'
    ];

    function mobildisewa(){
        return $this->belongsTo('App\Models\MobilModel','id');
    }
}
