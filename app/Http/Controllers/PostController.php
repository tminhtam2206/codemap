<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller{
    public static function getAll(){
        return Post::orderBy('created_at', 'desc')->get();
    }

    public static function add(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->title_slug = Str::slug($request->title);

        $link_remove = storage_path().'/app/public/posts/';
        $image = $request->file('thumb');
        if($image != null){
            $new_name = 'thumb_'.date('YmdHis').uniqid().'.jpg';
            $image->move($link_remove, $new_name);
            $post->thumb = asset('storage/app/public/posts').'/'.$new_name;
        }else{
            $post->thumb = asset('storage/app/public/posts').'/'.'thumb.jpg';
        }

        $link_remove_cover = storage_path().'/app/public/covers/';
        $cover = $request->file('cover');
        if($cover != null){
            $new_name_cover = 'cover_'.date('YmdHis').uniqid().'.jpg';
            $cover->move($link_remove_cover, $new_name_cover);
            $post->cover = asset('storage/app/public/covers').'/'.$new_name_cover;
        }else{
            $post->cover = asset('storage/app/public/covers').'/'.'cover.jpg';
        }

        if(trim($request->video) != ''){
            $post->video = getIDYoutube($request->video);
        }

        $post->content = $request->content;
        $post->user_id = getUserId();
        $post->save();

        $rename = Post::find($post->id);
        $rename->title_slug = $rename->title_slug.'-'.$post->id;
        $rename->save();

        return $post->id;
    }

    public static function update(Request $request){
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->title_slug = Str::slug($request->title).'-'.$request->id;

        $link_remove = storage_path().'/app/public/posts/';
        $image = $request->file('thumb');
        if($image != null){
            try{
                if(getThumb($post->thumb) != 'thumb.jpg'){
                    unlink($link_remove.getThumb($post->thumb));
                }
            }catch(Exception $e){
                //no code
            }

            $new_name = 'thumb_'.date('YmdHis').uniqid().'.jpg';
            $image->move($link_remove, $new_name);
            $post->thumb = asset('storage/app/public/posts').'/'.$new_name;
        }

        $link_remove_cover = storage_path().'/app/public/covers/';
        $cover = $request->file('cover');
        if($cover != null){
            try{
                if(getThumb($post->cover) != 'cover.jpg'){
                    unlink($link_remove_cover.getThumb($post->cover));
                }
            }catch(Exception $e){
                //no code
            }

            $new_name_cover = 'cover_'.date('YmdHis').uniqid().'.jpg';
            $cover->move($link_remove_cover, $new_name_cover);
            $post->cover = asset('storage/app/public/covers').'/'.$new_name_cover;
        }

        if(trim($request->video) != ''){
            $post->video = getIDYoutube($request->video);
        }else{
            $post->video = '';
        }

        $post->content = $request->content;
        $post->save();
    }

    public static function delete($id){
        $post = Post::find($id);
        $post->delete = 'Y';
        $post->save();
    }

    public static function deleteRestore($id){
        $post = Post::find($id);
        $post->delete = 'N';
        $post->save();
    }

    public static function get($id){
        return Post::where('id', $id)
        ->where('delete', 'N')->first();
    }

    public static function getEditByUser($id){
        return Post::where('id', $id)
        ->where('delete', 'N')
        ->where('user_id', getUserId())
        ->first();
    }

    public static function count(){
        return Post::count();
    }

    public static function getAllPost_Home(){
        return Post::select('title', 'title_slug', 'thumb', 'user_id', 'views', 'created_at')
        ->where('delete', 'N')
        ->orderBy('created_at', 'desc')
        ->paginate(20);
    }

    public static function getNewPost(){
        return Post::select('title', 'title_slug', 'thumb', 'user_id', 'views', 'created_at')
        ->where('delete', 'N')
        ->orderBy('created_at', 'desc')
        ->paginate(6);
    }

    public static function getHotPost($num){
        return Post::select('title', 'title_slug', 'cover', 'user_id', 'views', 'created_at')
        ->where('delete', 'N')
        ->orderBy('views', 'desc')
        ->paginate($num);
    }

    public static function search($key){
        return Post::select('title', 'title_slug', 'thumb', 'user_id', 'views', 'created_at')
        ->where('delete', 'N')
        ->where('title_slug', 'like', '%'.Str::slug($key, '-').'%')
        ->orderBy('created_at', 'desc')
        ->paginate(20);
    }

    public static function updateViews($post_id){
        $post = Post::find($post_id);
        $post->views = $post->views + 1;
        $post->save();
    }

    public static function getNewPost2($num){
        return Post::select('title', 'title_slug', 'thumb', 'user_id', 'views', 'created_at')
        ->where('delete', 'N')
        ->orderBy('created_at', 'desc')
        ->paginate($num);
    }

    public static function getByTag($tag, $num){
        return Post::join('tag_posts', 'tag_posts.post_id', '=', 'posts.id')
        ->where('tag_posts.name', $tag)
        ->where('posts.delete', 'N')
        ->select('posts.title', 'posts.title_slug', 'posts.thumb', 'posts.user_id', 'posts.views', 'posts.created_at', 'tag_posts.name')
        ->paginate($num);
    }

    public static function getFullPostByProject(){
        return Post::select('id', 'title')
        ->where('delete', 'N')
        ->get();
    }

    public static function updateDownloads(Request $request){
        $post = Post::find($request->id);
        $post->downloads = $post->downloads + 1;
        $post->save();
    }

    public static function get5Post(){
        return Post::select('title', 'title_slug', 'views', 'created_at')
        ->where('delete', 'N')
        ->orderBy('created_at', 'desc')
        ->paginate(5);
    }

    public static function getPostByUser(){
        return Post::select('id', 'title', 'title_slug', 'thumb', 'views', 'user_id')
        ->where('user_id', getUserId())
        ->where('delete', 'N')
        ->orderBy('created_at', 'desc')
        ->get();
    }
}
