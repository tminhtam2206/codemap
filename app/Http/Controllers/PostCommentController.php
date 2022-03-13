<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller{
    public static function delete($post_id){
        PostComment::where('post_id', $post_id)->delete();
    }

    public static function add(Request $request){
        $comment = new PostComment();
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->save();
    }

    public static function getByPost($post_id){
        return PostComment::where('post_id', $post_id)
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public static function get5Comment(){
        return PostComment::select('user_id', 'post_id', 'created_at')
        ->orderBy('created_at', 'desc')
        ->paginate(5);
    }
}
