<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'lokasi', 'waktu_mulai', 'waktu_selesai', 'file', 'status', 'user_id'
    ];
}
