<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProyek extends Model
{
    use HasFactory;
    protected $fillable = ['jenis', 'bidang'];

    public function dokumen()
    {
        return $this->hasOne(Dokumen::class);
    }
}
