<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SystemController;
use UniSharp\LaravelFilemanager\Lfm;
Auth::routes();

Route::get('/', [HomeController::class, 'getHomePage'])->name('home');
Route::get('/huong-dan-websites', [HomeController::class, 'getInstruct'])->name('home.instruct');
Route::get('/chinh-sach-bao-mat', [HomeController::class, 'getPolicy'])->name('home.policy');
Route::get('/dieu-khoan-dich-vu', [HomeController::class, 'getRules'])->name('home.rules');
Route::get('/lien-he', [HomeController::class, 'contactUS'])->name('home.contact');
Route::post('/gui-lien-he', [HomeController::class, 'postContactUs'])->name('home.contact.post');

Route::get('/dang-nhap', [HomeController::class, 'getLogin'])->name('home.login');
Route::get('/dang-ky', [HomeController::class, 'getRegister'])->name('home.register');

Route::get('/bai-dang-moi', [HomeController::class, 'getNewPost'])->name('home.new_post');
Route::get('/tags/{name}', [HomeController::class, 'getPostByTag'])->name('home.tags_post');
Route::get('/tags', [HomeController::class, 'getTags'])->name('home.tags');

Route::get('/bai-dang', [HomeController::class, 'getListPost'])->name('home.list_post');
Route::get('/bai-dang/{title}', [HomeController::class, 'getPost'])->name('home.post');
Route::get('/tim-kiem', [HomeController::class, 'getSearch'])->name('home.search');
Route::post('/post-comment', [HomeController::class, 'postComment'])->name('home.post_comment');

Route::middleware('auth')->group(function(){
    Route::get('/logout', [GeneralController::class, 'logOut'])->name('logout');
    //Profile
    Route::get('/profile', [MemberController::class, 'getDashBoard'])->name('member.dashboard');
    Route::post('/update-account', [MemberController::class, 'postUpdateAccount'])->name('member.update_account');

    //Download file
    Route::post('/ajax-download', [MemberController::class, 'ajaxUpdateDownloads'])->name('member.ajax_download');
    //Post
    Route::get('/post', [MemberController::class, 'getPost'])->name('member.post');
    Route::post('/post-now', [MemberController::class, 'postPost'])->name('member.post_now');
    //List post
    Route::get('/my-post', [MemberController::class, 'getListPost'])->name('member.my_post');
    Route::get('/edit/{title}', [MemberController::class, 'getEditPost'])->name('member.edit_post');
    Route::post('/edit/post', [MemberController::class, 'postUpdatePost'])->name('member.edit_post.post');
});

Route::prefix('admin')->middleware('admin')->group(function(){
    Lfm::routes();

    Route::get('/dashboard', [AdminController::class, 'getDashBoard'])->name('admin.dashboard');
    //Member
    Route::get('/list-members', [AdminController::class, 'getListMember'])->name('admin.list_member');
    Route::get('/list-members/lock-unlock/{id}', [AdminController::class, 'lock_unlock_user'])->name('admin.list_member.lock_unlock');
    Route::post('/list-member/update-role', [AdminController::class, 'postUpdateRole'])->name('admin.list_member.update_role');
    Route::get('/list-member/export', [AdminController::class, 'exportUser'])->name('admin.list_member.export');
    //Tag
    Route::get('/tags', [AdminController::class, 'getListTag'])->name('admin.list_tags');
    Route::post('/tags/add', [AdminController::class, 'postAddTag'])->name('admin.list_tags.add');
    Route::post('/tags/update', [AdminController::class, 'postUpdateTag'])->name('admin.list_tags.update');
    Route::geT('/tags/delete/{id}', [AdminController::class, 'postDeleteTag'])->name('admin.list_tags.delete');
    Route::get('/tags/export', [AdminController::class, 'exportTag'])->name('admin.list_tags.export');
    //Post
    Route::get('/list-post', [AdminController::class, 'getAllPost'])->name('admin.list_post');
    Route::get('/post', [AdminController::class, 'getPost'])->name('admin.post');
    Route::post('/post/add', [AdminController::class, 'postPost'])->name('admin.post.add');
    Route::get('/list-post/edit/{title}', [AdminController::class, 'getEditPost'])->name('admin.post.edit');
    Route::post('/post/update', [AdminController::class, 'postUpdatePost'])->name('admin.post.update');
    Route::get('/list-post/delete/{id}', [AdminController::class, 'getDeletePost'])->name('admin.list_post.delete');
    Route::get('/list-post/delete-restore/{id}', [AdminController::class, 'getDeleteRestorePost'])->name('admin.list_post.delete_restore');
    Route::get('/post/export', [AdminController::class, 'exportPost'])->name('admin.list_post.export');
    //Profile
    Route::get('/profile', [AdminController::class, 'getProfile'])->name('admin.profile');
    Route::post('/profile/update', [AdminController::class, 'postUpdateAccount'])->name('admin.profile.update');
    //Instruct
    Route::get('/instruct', [AdminController::class, 'getInstruct'])->name('admin.instruct');
    Route::post('/instruct/update', [AdminController::class, 'postInstruct'])->name('admin.instruct.update');
    //Rules
    Route::get('/rules', [AdminController::class, 'getRules'])->name('admin.rules');
    Route::post('/rules/update', [AdminController::class, 'postRules'])->name('admin.rules.update');
    //Policy
    Route::get('/policy', [AdminController::class, 'getPolicy'])->name('admin.policy');
    Route::post('/policy/update', [AdminController::class, 'postPolicy'])->name('admin.policy.update');
    //Project
    Route::get('/project', [AdminController::class, 'getProject'])->name('admin.project');
    Route::get('/project/{id}', [AdminController::class, 'getDeleteProject'])->name('admin.project.delete');
    Route::post('/project/add', [AdminController::class, 'postProject'])->name('admin.project.add');
    Route::get('/projects/export', [AdminController::class, 'exportProject'])->name('admin.project.export');
    //System
    Route::get('/backup-database', [SystemController::class, 'backup_all_database'])->name('admin.backup_database');
    Route::get('/backup-single-database/{table}', [SystemController::class, 'backup_single_database'])->name('admin.backup_single_database');
    //Feedback & contact
    Route::get('/contact', [AdminController::class, 'getContact'])->name('admin.contact');
    //Config system
    Route::get('/config-system', [AdminController::class, 'getConfigSystem'])->name('admin.config_system');
    Route::post('/config-system/maintenance', [AdminController::class, 'ajaxUpdateMaintenance'])->name('admin.config_system.maintenance');
    Route::post('/config-system/lock-comment', [AdminController::class, 'ajaxUpdateLockComment'])->name('admin.config_system.lock_comment');
    Route::post('/config-system/google-login', [AdminController::class, 'ajaxUpdateGoogleLogin'])->name('admin.config_system.google_login');
    Route::post('/config-system/facebook-login', [AdminController::class, 'ajaxUpdateFacebookLogin'])->name('admin.config_system.facebook_login');

});