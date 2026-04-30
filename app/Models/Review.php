<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'rating', 'content', 'status',
])]
class Review extends Model
{
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
