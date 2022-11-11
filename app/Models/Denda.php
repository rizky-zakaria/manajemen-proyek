<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $fillable = ['proyek_id', 'nominal'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
