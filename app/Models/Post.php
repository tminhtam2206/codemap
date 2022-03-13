<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'views' => 'string',
        'downloads' => 'string',
    ];

    public function User(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Project(){
        return $this->hasMany('App\Models\Project', 'post_id', 'id');
    }
}
