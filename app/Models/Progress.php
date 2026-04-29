<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id', 'lesson_id', 'is_completed', 'completed_at',
])]
class Progress extends Model
{
    /**
     * Nama tabel eksplisit karena Laravel tidak bisa
     * meng-auto-pluralize "progress" → "progresses" dengan benar.
     */
    protected $table = 'progress';
}
