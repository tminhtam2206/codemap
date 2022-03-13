<?php

namespace App\Http\Controllers;

use App\Models\TagPost;
use Illuminate\Http\Request;

class TagPostController extends Controller{
    public static function add($post_id, $name){
        $tag_post = new TagPost();
        $tag_post->post_id = $post_id;
        $tag_post->name = $name;
        $tag_post->save();
    }

    public static function delete($post_id){
        TagPost::where('post_id', $post_id)->delete();
    }

    public static function get($post_id){
        return TagPost::where('post_id', $post_id)->get();
    }
}
