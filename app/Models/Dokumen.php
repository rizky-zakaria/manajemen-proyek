<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyek_id', 'jenis_id', 'jenis_dokumen', 'dokumen'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function jenisproyek()
    {
        return $this->belongsTo(JenisProyek::class);
    }
}
