<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'lesson_id', 'type', 'title', 'content', 'media_url',
    'embed_url', 'command', 'options', 'correct_answer', 'order_number',
])]
class LessonBlock extends Model
{
    //
}
