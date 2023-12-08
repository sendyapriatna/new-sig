<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $table = "shelter_tables";
    protected $fillable = [
        'id',
        'nama',
        'latitude',
        'longitude',
        'alamat',
        'keterangan',
        'kontak',
        'kapasitas',
        'image',
    ];
    use HasFactory;
}
