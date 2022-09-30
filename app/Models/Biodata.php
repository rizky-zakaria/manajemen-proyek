<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'alamat', 'desa', 'kecamatan', 'kabupaten', 'provinsi'
    ];
}
