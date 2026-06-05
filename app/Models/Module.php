<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'order_number', 'status',
    ];
    // ──────────────────────────────────────────────
    //  RELATIONSHIPS
    // ──────────────────────────────────────────────

    /**
     * Daftar materi (lesson) dalam modul ini.
     * Otomatis diurutkan berdasarkan order_number (ascending).
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('order_number');
    }

    /**
     * Daftar quiz dalam modul ini.
     */
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
}
