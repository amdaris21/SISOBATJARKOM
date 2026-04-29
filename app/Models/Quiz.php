<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'module_id', 'title', 'description', 'zep_link', 'instruction', 'status',
])]
class Quiz extends Model
{
    //
}
