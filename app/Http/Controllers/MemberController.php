<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toastr;

class MemberController extends Controller{
    public function __construct(){
        //SystemInfoController::updateViews();
    }

    public function getDashBoard(){
        $project = ProjectController::getByMember();

        return view('member.profile', compact('project'));
    }

    public function postUpdateAccount(Request $request){
        $user = UserController::updateAccount($request);

        if($user['status']){
            Toastr::success('Cập nhật thành công!');

            return redirect()->route('member.dashboard');
        }else{
            if($user['msg'] == 'pass fail'){
                Toastr::error('Xác nhận mật khẩu không chính xác!');
            }else{
                Toastr::error('Tên đăng nhặp hoặc email bị trùng!');
            }

            return redirect()->route('member.dashboard');
        }
    }

    public function ajaxUpdateDownloads(Request $request){
        StatisticalController::updateDownloads();
        PostController::updateDownloads($request);
    }

    public function getPost(){
        $tag = TagController::getAll();

        return view('member.post', compact('tag'));
    }

    public function postPost(Request $request){
        $post = PostController::add($request);

        if($request->input('tags') != null){
            foreach($request->input('tags') as $value){
                TagPostController::add($post, $value);
            }
        }

        Toastr::success('Đăng bài thành công!');
        return redirect()->route('member.my_post');
    }

    public function getListPost(){
        $post = PostController::getPostByUser();

        return view('member.list_post', compact('post'));
    }

    public function getEditPost($title){
        $post = PostController::getEditByUser(getId($title));
        if($post != null){
            $tag = TagController::getAll();
            $tag_post = TagPostController::get($post->id);
    
            return view('member.edit_post', compact('post', 'tag', 'tag_post'));
        }
        else{
            return abort(404);
        }
    }

    public function postUpdatePost(Request $request){
        PostController::update($request);
        TagPostController::delete($request->id);
        if($request->input('tags') != null){
            foreach($request->input('tags') as $value){
                TagPostController::add($request->id, $value);
            }
        }
        Toastr::success('Sửa bài thành công!');

        return redirect()->route('member.my_post');
    }
}
