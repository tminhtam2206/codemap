<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller{
    public static function getAll(){
        return User::orderBy('created_at', 'desc')->get();
    }

    public static function updateRole(Request $request){
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->save();
    }


    public static function count(){
        return User::count();
    }

    public static function updateAccount(Request $request){
        $user = User::find(Auth::user()->id);
        
        if(Hash::check($request->password, $user->password)){
            //khong doi mat khau
            if(strlen(trim($request->newpassword)) <= 0){
                try{
                    if(trim($request->username) != trim($user->username)){
                        $user->username = Str::slug($request->username, '');
                    }
                    if(trim($request->email) != trim($user->email)){
                        $user->email = $request->email;
                    }
                    $user->save();

                    return [
                        'status' => true,
                        'msg'   => 'ok'
                    ];
                }catch(Exception $e){
                    return [
                        'status' => false,
                        'msg'   => 'fail'
                    ];
                }
            }else{//co doi mat khau
                try{
                    if(trim($request->username) != trim($user->username)){
                        $user->username = Str::slug($request->username, '');
                    }
                    if(trim($request->email) != trim($user->email)){
                        $user->email = $request->email;
                    }
                    $user->password = bcrypt($request->newpassword);
                    $user->save();

                    return [
                        'status' => true,
                        'msg'   => 'ok'
                    ];
                }catch(Exception $e){
                    return [
                        'status' => false,
                        'msg'   => 'fail'
                    ];
                }
            }
        }else{
            return [
                'status' => false,
                'msg'   => 'pass fail'
            ];
        }
    }

    public static function getAllUserByProject(){
        return User::select('id', 'username')
        ->get();
    }

    public static function lock_unlock_user($id){
        $user = User::find($id);

        if($user->lock == 'N'){
            $user->lock = 'Y';
            $user->save();
        }else{
            $user->lock = 'N';
            $user->save();
        }
    }
}
