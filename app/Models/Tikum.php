<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tikum extends Model
{
    protected $table = "tikum_tables";
    protected $fillable = [
        'id',
        'nama',
        'latitude',
        'longitude',
        'alamat',
        'keterangan',
        'kapasitas',
        'image'
    ];
    use HasFactory;
}
