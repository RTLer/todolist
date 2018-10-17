<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $fillable = [
        'user_id',
        'title',
        'expired_at',
    ];

    public $dates = [
        'expired_at'
    ];
}
