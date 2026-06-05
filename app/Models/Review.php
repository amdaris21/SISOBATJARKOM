<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'rating', 'content', 'status',
    ];

    /**
     * Cast attributes.
     * - rating: integer (1-5)
     */
    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }

    // ──────────────────────────────────────────────
    //  RELATIONSHIPS
    // ──────────────────────────────────────────────

    /**
     * User yang menulis review.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
