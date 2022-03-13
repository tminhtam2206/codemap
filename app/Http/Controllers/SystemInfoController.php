<?php

namespace App\Http\Controllers;

use App\Models\SystemInfo;
use Illuminate\Http\Request;

class SystemInfoController extends Controller{
    public static function getPolicy(){
        $system = SystemInfo::first();

        if($system == null){
            $system = new SystemInfo();
            $system->instruct = '';
            $system->policy = '';
            $system->rules = '';
            $system->save();

            return [
                'content' => SystemInfo::first()->policy,
                'updated_at' => SystemInfo::first()->created_at
            ];
        }

        return [
            'content' => SystemInfo::first()->policy,
            'updated_at' => SystemInfo::first()->created_at
        ];
    }

    public static function getInstruct(){
        $system = SystemInfo::first();

        if($system == null){
            $system = new SystemInfo();
            $system->instruct = '';
            $system->policy = '';
            $system->rules = '';
            $system->save();

            return [
                'content' => SystemInfo::first()->instruct,
                'updated_at' => SystemInfo::first()->created_at
            ];
        }

        return [
            'content' => $system->instruct,
            'updated_at' => $system->created_at
        ];
    }

    public static function getRules(){
        $system = SystemInfo::first();

        if($system == null){
            $system = new SystemInfo();
            $system->instruct = '';
            $system->policy = '';
            $system->rules = '';
            $system->save();

            return [
                'content' => SystemInfo::first()->rules,
                'updated_at' => SystemInfo::first()->created_at
            ];
        }

        return [
            'content' => SystemInfo::first()->rules,
            'updated_at' => SystemInfo::first()->created_at
        ];
    }

    public static function update(Request $request){
        $system = SystemInfo::first();
        
        if(isset($request->rules)){
            $system->rules = $request->rules;
            $system->save();
        }elseif(isset($request->policy)){
            $system->policy = $request->policy;
            $system->save();
        }else{
            $system->instruct = $request->instruct;
            $system->save(); 
        }
    }

    public static function updateViews(){
        $system = SystemInfo::first();
        
        if($system == null){
            $system = new SystemInfo();
            $system->instruct = '';
            $system->policy = '';
            $system->rules = '';
            $system->save();
        }

        $system->page_views = $system->page_views + 1;
        $system->save();
    }

    public static function views(){
        return SystemInfo::first()->page_views;
    }
}
