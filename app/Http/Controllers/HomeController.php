<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{
    public function __construct(){
        SystemInfoController::updateViews();
        StatisticalController::add();
    }

    public function getRegister(){
        if(getUserId() > 0){
            return redirect()->route('home');
        }

        return view('register');
    }

    public function getLogin(){
        if(getUserId() > 0){
            return redirect()->route('home');
        }
        
        return view('login');
    }

    public function getHomePage(){
        $new = PostController::getNewPost();
        $hot = PostController::getHotPost(3);
        $project = PostController::getByTag('Đồ Án', 9);
        $software = PostController::getByTag('Phần Mềm', 9);
        $graphic = PostController::getByTag('Đồ Họa', 9);
        $homework = PostController::getByTag('Bài Tập', 9);
        $utilities = PostController::getByTag('Tiện Ích', 4);
        $tips = PostController::getByTag('Thủ Thuật', 5);

        return view('home.homepage', compact(
            'new',
            'hot',
            'project',
            'software',
            'graphic',
            'homework',
            'utilities',
            'tips'
        ));
    }

    public function getInstruct(){
        $instruct = SystemInfoController::getInstruct();

        return view('home.instruct', compact('instruct'));
    }

    public function getPolicy(){
        $policy = SystemInfoController::getPolicy();

        return view('home.policy', compact('policy'));
    }

    public function getRules(){
        $rules = SystemInfoController::getRules();

        return view('home.rules', compact('rules'));
    }

    public function getListPost(){
        $post = PostController::getAllPost_Home();

        return view('home.list_post', compact('post'));
    }

    public function getPost($title){
        $post = PostController::get(getId($title));

        if($post == null){
            abort(404);
        }else{
            $comment = PostCommentController::getByPost($post->id);
            $tags = TagPostController::get($post->id);
            $check_link = ProjectController::checkProjectInPost($post->id);
            $link_download = ProjectController::get($post->id);
            $config = ConfigSystemController::getConfigSystem();
            PostController::updateViews($post->id);
    
            return view('home.post', compact(
                'post', 
                'comment', 
                'tags', 
                'link_download', 
                'check_link',
                'config'
            ));
        }
    }

    public function getSearch(Request $request){
        $post = PostController::search($request->key);

        return view('home.search', compact('post'));
    }

    public function postComment(Request $request){
        if(getUserId() > 0){
            PostCommentController::add($request);

            return redirect()->route('home.post', ['title'=>$request->title_slug]);
        }
    }

    public function getNewPost(){
        $post = PostController::getNewPost2(20);

        return view('home.new_update', compact('post'));
    }

    public function getUtilities(){
        $post = PostController::getByTag(20, 'utilities');

        return view('home.utilities', compact('post'));
    }

    public function getPostByTag($name){
        $post = PostController::getByTag($name, 20);

        return view('home.post_tag', compact('post', 'name'));
    }

    public function getTags(){
        $tags = TagController::getAll();

        return view('home.tag', compact('tags'));
    }

    public function contactUS(){
        return view('home.contact');
    }

    public function postContactUs(Request $request){
        ContactController::add($request);

        return view('home.thank');
    }
}
