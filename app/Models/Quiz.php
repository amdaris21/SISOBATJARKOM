<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = [
        'module_id', 'title', 'description', 'zep_link', 'instruction', 'status', 'question_count', 'level',
    ];
    // ──────────────────────────────────────────────
    //  RELATIONSHIPS
    // ──────────────────────────────────────────────

    /**
     * Modul induk dari quiz ini.
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Daftar percobaan pengerjaan quiz oleh user.
     */
    public function attempts(): HasMany
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
