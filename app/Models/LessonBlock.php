<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonBlock extends Model
{
    protected $fillable = [
        'lesson_id', 'type', 'title', 'content', 'media_url',
        'embed_url', 'command', 'options', 'correct_answer', 'order_number',
    ];

    /**
     * Cast attributes.
     * 'options' disimpan sebagai JSON di database,
     * otomatis menjadi array di PHP saat diakses.
     *
     * Contoh isi options untuk mini_quiz:
     * ["Topologi Bus", "Topologi Star", "Topologi Ring"]
     */
    protected function casts(): array
    {
        return [
            'options' => 'array',
        ];
    }

    // ──────────────────────────────────────────────
    //  RELATIONSHIPS
    // ──────────────────────────────────────────────

    /**
     * Lesson induk dari block ini.
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
