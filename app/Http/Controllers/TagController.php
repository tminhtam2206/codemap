<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;

class TagController extends Controller{
    public static function getAll(){
        return Tag::orderBy('name', 'asc')->get();
    }

    public static function add(Request $request){
        try{
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->save();

            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public static function update(Request $request){
        try{
            $tag = Tag::find($request->id);
            $tag->name = $request->name;
            $tag->save();

            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public static function delete($id){
        Tag::find($id)->delete();
    }

    public static function count(){
        return Tag::count();
    }
}
