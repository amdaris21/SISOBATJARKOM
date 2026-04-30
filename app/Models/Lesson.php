<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'module_id', 'title', 'slug', 'description', 'order_number', 'status',
])]
class Lesson extends Model
{
    // ──────────────────────────────────────────────
    //  RELATIONSHIPS
    // ──────────────────────────────────────────────

    /**
     * Modul induk dari lesson ini.
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Daftar konten interaktif (blocks) dalam lesson ini.
     * Otomatis diurutkan berdasarkan order_number (ascending).
     */
    public function blocks(): HasMany
    {
        return $this->hasMany(LessonBlock::class)->orderBy('order_number');
    }

    /**
     * Progress user pada lesson ini.
     */
    public function progress(): HasMany
    {
        return $this->hasMany(Progress::class);
    }
}
