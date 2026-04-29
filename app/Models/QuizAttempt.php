<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id', 'quiz_id', 'status', 'score', 'completed_at', 'note',
])]
class QuizAttempt extends Model
{
    //
}
