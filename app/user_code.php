<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_code extends Model
{
    protected $fillable = [
        'code',
        'published_at'
    ];
}
