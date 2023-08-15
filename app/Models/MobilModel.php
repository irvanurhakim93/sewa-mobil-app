<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilModel extends Model
{
    use HasFactory;

    protected $table = 'data_mobil';
    protected $primaryKey = 'id';

    protected $fillable =[
        'model_mobil',
        'plat_mobil',
        'tarif'
    ];
}
