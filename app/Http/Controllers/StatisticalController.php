<?php

namespace App\Http\Controllers;

use App\Models\Statistical;
use Illuminate\Http\Request;

class StatisticalController extends Controller{
    public static function add(){
        $current_date = date('Y-m-d');
        $statistical = Statistical::where('curr_date', $current_date)->first();

        if($statistical == null){
            $statistic = new Statistical();
            $statistic->views = 0;
            $statistic->downloads = 0;
            $statistic->curr_date = $current_date;
            $statistic->save();
        }else{
            $statistical->views = $statistical->views + 1;
            $statistical->save();
        }
    }

    public static function get($date){
        $statistical = Statistical::where('curr_date', $date)->first();

        if($statistical == null){
            $statistic = new Statistical();
            $statistic->views = 0;
            $statistic->downloads = 0;
            $statistic->curr_date = $date;
            $statistic->save();

            return Statistical::where('curr_date', $date)->first()->views;
        }

        return $statistical->views;
    }

    public static function updateDownloads(){
        $current_date = date('Y-m-d');
        $statistical = Statistical::where('curr_date', $current_date)->first();

        if($statistical == null){
            $statistic = new Statistical();
            $statistic->views = 0;
            $statistic->downloads = 0;
            $statistic->curr_date = $current_date;
            $statistic->save();
        }else{
            $statistical->views = $statistical->views + 1;
            $statistical->downloads = $statistical->downloads + 1;
            $statistical->save();
        }
    }
}
