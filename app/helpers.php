<?php

use App\Http\Controllers\SystemInfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

const app_version = 'v2021.10.14';
const app_url = 'http://localhost/codemap/';
const server = 'https://cp1.awardspace.net/file-manager/www/tangkinhcac.atwebpages.com/views'; //tminhtam170599
const database = 'https://supportindeed.com/phpMyAdmin4/index.php?db=3841113_truyencuatui&lang=vi&collation_connection=utf8mb4_unicode_ci&token=9df4d49be5fd4f25d8e8fac987665393';

const fields = [
    'tags' => [
        'name' => 42
    ],
    'post' => [
        'title' => 150
    ],
    'user' => [
        'username' => 42,
        'email' => 255
    ],
    'post_comments' => [
        'content' => 255
    ]
];

function getName(){
    return Auth::user()->username;
}

function getRole(){
    return Auth::user()->role;
}

function getUserId(){
    if(isset(Auth::user()->id)){
        return Auth::user()->id;
    }

    return 0;
}

function getSizeDB(){
    $tong = 0;

    $SizeDB = DB::table('information_schema.TABLES')
    ->select(['data_length as DataLength','index_length as IndexLength'])
    ->where('information_schema.TABLES.table_schema','=',config('database.connections.'.config('database.default').'.database'))
    ->get()
    ->map(function($eachDatabse){

        $dataIndex = $eachDatabse->DataLength + $eachDatabse->IndexLength;

        $modifiedObject = new \StdClass;
        $kbSize = ($dataIndex/1024);
        $modifiedObject->SizeInKb = $kbSize;

        return (object)array_merge((array)$eachDatabse,(array)$modifiedObject);

    });
    
    for($i = 0; $i< count($SizeDB); $i++){
        $tong += $SizeDB[$i]->SizeInKb;
    }

    $resutl = round(($tong/31457.3)*100, 2);
    return $resutl.'%';
}

function getId($name){
    $arr = explode("-", $name);
    return $arr[count($arr)-1];
}

function getThumb($name){
    $arr = explode("/", $name);
    return $arr[count($arr)-1];
}



function hasActive($link){
    if(request()->is($link)){
        return 'has-active';
    }
}

function hasActive_Member($link){
    if(request()->is($link)){
        return 'active';
    }
}

function hasActive2($link){
    if (strlen(strstr(url()->current(), $link)) > 0) {
        return 'has-active';
    }
}

function getView(){
    return number_format(SystemInfoController::views());
}

function getIDYoutube($link){
    parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
    return $my_array_of_vars['v'];
}