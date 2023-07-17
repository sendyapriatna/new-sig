<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "location_tables";
    protected $fillable = [
        'id',
        'nama',
        'latitude',
        'longitude',
        'alamat',
        'tiket',
        'image',
    ];
    use HasFactory;
}
