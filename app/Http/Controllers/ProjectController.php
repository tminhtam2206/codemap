<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Statistical;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller{
    public static function getAll(){
        return Project::orderBy('id', 'desc')->get();
    }

    public static function add(Request $request){
        $project = new Project();
        $project->post_id = $request->post_id;
        $project->user_id = $request->user_id;
        $project->link = $request->link;
        $project->pass = Str::random(16);
        $project->save();
    }

    public static function get($post_id){
        return Project::where('user_id', getUserId())
        ->where('post_id', $post_id)
        ->first();
    }

    public static function checkProjectInPost($post_id){
        $project = Project::where('post_id', $post_id)
        ->first();

        if($project == null){
            return false;
        }

        return true;
    }

    public static function check(Request $request){
        $project = Project::where('user_id', $request->user_id)
        ->where('post_id', $request->post_id)
        ->first();

        if($project == null){
            return true;
        }

        return false;
    }

    public static function delete($project_id){
        Project::find($project_id)->delete();
    }

    public static function getByMember(){
        return Project::where('user_id', getUserId())
        ->orderBy('created_at', 'desc')
        ->get();
    }
}
