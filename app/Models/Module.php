<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'title', 'slug', 'description', 'order_number', 'status',
])]
class Module extends Model
{
    //
}
