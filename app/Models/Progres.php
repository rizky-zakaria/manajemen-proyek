<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;
    protected $fillable = [
        'proyek_id', 'progres', 'persentase'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
