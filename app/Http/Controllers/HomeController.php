<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//使用テーブル名追加
use App\Important;
use App\User;

class HomeController extends Controller
{
    //ホーム
    public function home()
    {
        //天気
        $weather=Important::where('name', 'OverWeather')->get();
        $data = $weather[0]['pass'];
        
        return view('home',compact('data'));
    }

    //設定
    public function configuration()
    {
        //現在のユーザー情報を取得する
        $mine=User::where('name', '麻衣')->get();
        $name = $mine[0]['surname'].$mine[0]['name'];
        $company = $mine[0]['company'];
        $id = $mine[0]['id'];
        $belongs= $mine[0]['belongs'];
        $hiredate = $mine[0]['hiredate'];
        
        return view('configuration',compact('id','name','company','belongs','hiredate'));
    }  

    //勤怠
    public function stam(){
        return view('stam');
    }  
    
    //勤怠記録
    public function kintai(){
        $id = $_POST['text'];
        var_dump($id);
        exit;
        return view('stam');
    }

}

