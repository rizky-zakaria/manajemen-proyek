<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gantt extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id', 'task_name', 'resource', 'tgl_mulai', 'bln_mulai', 'thn_mulai', 'tgl_selesai', 'bln_selesai', 'thn_selesai', 'duration', 'percent', 'dependencies', 'project_id'
    ];
}
