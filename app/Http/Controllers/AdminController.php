<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Exports\UserExport;
use App\Exports\TagExport;
use App\Exports\PostExport;
use App\Exports\ProjectExport;
use App\Models\ConfigSystem;
use Excel;

class AdminController extends Controller{
    public function __construct(){
        //SystemInfoController::updateViews();
    }

    public function getDashBoard(){
        $member = UserController::count();
        $post = PostController::count();
        $tag = TagController::count();

        $days = Carbon::today();

        $day7 = date('Y-m-d', strtotime($days));
        $day6 = date('Y-m-d', strtotime($days->addDays(-1)));
        $day5 = date('Y-m-d', strtotime($days->addDays(-1)));
        $day4 = date('Y-m-d', strtotime($days->addDays(-1)));
        $day3 = date('Y-m-d', strtotime($days->addDays(-1)));
        $day2 = date('Y-m-d', strtotime($days->addDays(-1)));
        $day1 = date('Y-m-d', strtotime($days->addDays(-1)));

        $val_day7 = StatisticalController::get($day7);
        $val_day6 = StatisticalController::get($day6);
        $val_day5 = StatisticalController::get($day5);
        $val_day4 = StatisticalController::get($day4);
        $val_day3 = StatisticalController::get($day3);
        $val_day2 = StatisticalController::get($day2);
        $val_day1 = StatisticalController::get($day1);

        return view('admin.dashboard', compact(
            'member',
            'post',
            'tag',
            'day7',
            'day6',
            'day5',
            'day4',
            'day3',
            'day2',
            'day1',
            'val_day7',
            'val_day6',
            'val_day5',
            'val_day4',
            'val_day3',
            'val_day2',
            'val_day1',
        ));
    }

    public function getListMember(){
        $user = UserController::getAll();

        return view('admin.member', compact('user'));
    }

    public function postUpdateRole(Request $request){
        UserController::updateRole($request);
        Toastr::success('Cập nhật thành công!');
        return redirect()->route('admin.list_member');
    }

    public function getListTag(){
        $tag = TagController::getAll();

        return view('admin.tag', compact('tag'));
    }

    public function postAddTag(Request $request){
        if(TagController::add($request)){
            Toastr::success('Thêm thành công!');
            return redirect()->route('admin.list_tags');
        }else{
            Toastr::error('Tag bị trùng!');
            return redirect()->route('admin.list_tags');
        }
    }

    public function postUpdateTag(Request $request){
        if(TagController::update($request)){
            Toastr::success('Chỉnh sửa thành công!');
            return redirect()->route('admin.list_tags');
        }else{
            Toastr::error('Tag bị trùng!');
            return redirect()->route('admin.list_tags');
        }
    }

    public function postDeleteTag($id){
        TagController::delete($id);

        Toastr::success('Xóa thành công!');
        return redirect()->route('admin.list_tags');
    }

    public function getAllPost(){
        $post = PostController::getAll();

        return view('admin.list_post', compact('post'));
    }

    public function getPost(){
        $tag = TagController::getAll();

        return view('admin.post', compact('tag'));
    }

    public function postPost(Request $request){
        $post = PostController::add($request);

        if($request->input('tags') != null){
            foreach($request->input('tags') as $value){
                TagPostController::add($post, $value);
            }
        }

        Toastr::success('Đăng bài thành công!');
        return redirect()->route('admin.list_post');
    }

    public function getEditPost($title){
        $post = PostController::get(getId($title));
        $tag = TagController::getAll();
        $tag_post = TagPostController::get($post->id);

        return view('admin.edit_post', compact('post', 'tag', 'tag_post'));
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

        return redirect()->route('admin.list_post');
    }

    public function getDeletePost($id){
        PostController::delete($id);
        Toastr::success('Xóa bài thành công!');

        return redirect()->route('admin.list_post');
    }

    public function getDeleteRestorePost($id){
        PostController::deleteRestore($id);
        Toastr::success('Khôi phục bài thành công!');

        return redirect()->route('admin.list_post');
    }

    public function getProfile(){
        $post = PostController::get5Post();
        $comment = PostCommentController::get5Comment();

        return view('admin.profile', compact('post', 'comment'));
    }

    public function postUpdateAccount(Request $request){
        $user = UserController::updateAccount($request);

        if($user['status']){
            Toastr::success('Cập nhật thành công!');

            return redirect()->route('admin.profile');
        }else{
            if($user['msg'] == 'pass fail'){
                Toastr::error('Xác nhận mật khẩu không chính xác!');
            }else{
                Toastr::error('Tên đăng nhặp hoặc email bị trùng!');
            }

            return redirect()->route('admin.profile');
        }
    }

    public function getInstruct(){
        $instruct = SystemInfoController::getInstruct();

        return view('admin.instruct', compact('instruct'));
    }

    public function postInstruct(Request $request){
        SystemInfoController::update($request);

        return redirect()->route('admin.instruct');
    }

    public function getRules(){
        $rules = SystemInfoController::getRules();

        return view('admin.rules', compact('rules'));
    }

    public function postRules(Request $request){
        SystemInfoController::update($request);

        return redirect()->route('admin.rules');
    }

    public function getPolicy(){
        $policy = SystemInfoController::getPolicy();

        return view('admin.policy', compact('policy'));
    }

    public function postPolicy(Request $request){
        SystemInfoController::update($request);

        return redirect()->route('admin.policy');
    }

    public function getProject(){
        $post = PostController::getFullPostByProject();
        $user = UserController::getAllUserByProject();
        $project = ProjectController::getAll();

        return view('admin.project', compact('post', 'user', 'project'));
    }

    public function postProject(Request $request){
        if(ProjectController::check($request)){
            ProjectController::add($request);
            Toastr::success('Thêm thành công!');
        }else{
            Toastr::error('Khách hàng đã từng mua đồ án này!');
        }

        return redirect()->route('admin.project');
    }

    public function getDeleteProject($id){
        ProjectController::delete($id);
        Toastr::success('Xóa thành công!');

        return redirect()->route('admin.project'); 
    }

    public function exportUser(){
        return Excel::download(new UserExport, 'users-'.date('d-m-Y').'.xlsx');
    }

    public function exportTag(){
        return Excel::download(new TagExport, 'tags-'.date('d-m-Y').'.xlsx');
    }

    public function exportPost(){
        return Excel::download(new PostExport, 'posts-'.date('d-m-Y').'.xlsx');
    }

    public function exportProject(){
        return Excel::download(new ProjectExport, 'projects-'.date('d-m-Y').'.xlsx');
    }

    public function lock_unlock_user($id){
        UserController::lock_unlock_user($id);

        return redirect()->route('admin.list_member');
    }

    public function getContact(){
        $contact = ContactController::getAll();

        return view('admin.contact', compact('contact'));
    }

    public function getConfigSystem(){
        $config = ConfigSystemController::getConfigSystem();

        return view('admin.config_system', compact('config'));
    }

    public function ajaxUpdateMaintenance(){
        ConfigSystemController::updateMaintenance();
    }

    public function ajaxUpdateLockComment(){
        ConfigSystemController::updateComment();
    }

    public function ajaxUpdateGoogleLogin(){
        ConfigSystemController::updateGoogleLogin();
    }

    public function ajaxUpdateFacebookLogin(){
        ConfigSystemController::updateFacebookLogin();
    }
}
