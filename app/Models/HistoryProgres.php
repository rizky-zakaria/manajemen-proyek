<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryProgres extends Model
{
    use HasFactory;

    protected $fillable = ['proyek_id', 'user_id', 'bukti', 'keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
