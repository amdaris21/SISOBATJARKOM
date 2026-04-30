<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'quiz_id', 'status', 'score', 'completed_at', 'note',
])]
class QuizAttempt extends Model
{
    /**
     * Cast attributes.
     * - score: pastikan integer (bukan string dari DB)
     * - completed_at: Carbon instance untuk manipulasi tanggal
     */
    protected function casts(): array
    {
        return [
            'score' => 'integer',
            'completed_at' => 'datetime',
        ];
    }

    // ──────────────────────────────────────────────
    //  RELATIONSHIPS
    // ──────────────────────────────────────────────

    /**
     * User yang mengerjakan quiz.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Quiz yang dikerjakan.
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
