<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'lokasi', 'waktu_mulai', 'waktu_selesai', 'file', 'status', 'user_id', 'anggaran'
    ];

    public function progres()
    {
        return $this->hasMany(Progres::class);
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function historyprogres()
    {
        return $this->hasMany(HistoryProgres::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
