<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Post(){
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }
}
