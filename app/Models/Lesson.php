<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'module_id', 'title', 'slug', 'description', 'order_number', 'status',
])]
class Lesson extends Model
{
    //
}
