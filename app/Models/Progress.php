<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Cast attributes.
     * - is_completed: boolean (0/1 di DB → true/false di PHP)
     * - completed_at: Carbon instance untuk manipulasi tanggal
     */
    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
            'completed_at' => 'datetime',
        ];
    }

    // ──────────────────────────────────────────────
    //  RELATIONSHIPS
    // ──────────────────────────────────────────────

    /**
     * User pemilik progress ini.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Lesson yang di-track progressnya.
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
