@extends('bar.main')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HOME</title>
        <!-- レスポンシブ読み込み -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- fonts読み込み -->
        <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">
        <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
        <!-- css読み込み -->
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    </head>
<body>
    <?php
        //情報 住所
        $todouhuken = "東京都";
        $sityouson =  "足立区";
        $syousai = "足立二丁目";

        //エンコード化する
        $todouhuken_ok  = urlencode($todouhuken);
        $sityouson_ok  = urlencode($sityouson);
        //住所情報取得
        $url_big_data = "https://geolonia.github.io/japanese-addresses/api/ja/$todouhuken_ok/$sityouson_ok.json";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url_big_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $report =  curl_exec($curl);
        $array = json_decode($report, true);
        //軽度緯度検索
        $keyIndex = array_search($syousai, array_column($array, 'town'));
        $result = $array[$keyIndex];

        //情報 軽度緯度
        $appid = "{$data}";    
        $lat = $result['lat']; 
        $lon = $result['lng']; 

        //天気予報取得
        $url_weather = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$appid";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url_weather);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $report =  curl_exec($curl);
        $array = json_decode($report, true);
        //天気結果
        $weather = $array["weather"][0]["description"];
    ?>
    <script>
        //厳格モード 
        'use strict'
        
        //時間・挨拶
        function clock() {
            //現在の時間を表示
            var now = new Date();
            var Hour = set( now.getHours() );
            var Min  = set( now.getMinutes() );
            var Sec  = set( now.getSeconds() );
            var msg = Hour + ":" + Min + ":" + Sec ;
            document.getElementById("showclock").innerHTML = msg;

            //挨拶を表示
            if(Hour < 12){
                document.getElementById('welcome_word').textContent= "おはようございます。";
            }else if(Hour < 17){
                document.getElementById('welcome_word').textContent= "こんにちは。";
            }else if(Hour < 21){
                document.getElementById('welcome_word').textContent= "こんばんは。";
            }else{
                document.getElementById('welcome_word').textContent= "お疲れ様です。";
            }
        }
        //関数を定期的に実行
        setInterval('clock()');
        //桁数が1桁の場合2桁に変更
        function set(num) {
            var ret;
            if( num < 10 ) { 
                ret = "0" + num; 
            }else { 
                ret = num; 
            }
            return ret;
        }
    </script>
    <!-- javascript読み込み -->
    <script src="{{ asset('/js/home.js') }}"></script>
    <!-- 表示 -->
    <table>
        <tr>
            <td>
                <script>
                    //天気画像
                    let weather = '<?php echo $weather ; ?>';
                    if( weather == "clear sky" || weather == "few clouds"){
                        document.write( '<img src="{{ asset('image/weather/sun.png') }}" id="weather">' );
                    }else if( weather == "scattered clouds" || weather == "broken clouds"){
                        document.write( '<img src="{{ asset('image/weather/cloude.png') }}" id="weather">' );
                    }else if( weather == "	shower rain" || weather == "rain" ){
                        document.write( '<img src="{{ asset('image/weather/rain.png') }}" id="weather">' );
                    }else if( weather == "thunderstorm"){
                        document.write( '<img src="{{ asset('image/weather/thunder.png') }}" id="weather">' );
                    }else{
                        document.write( '<img src="{{ asset('image/weather/snow.png') }}" id="weather">' );  
                    }
                </script>
            </td>
        </tr>
        <tr>
            <td>
                <h1 id="welcome_word" class="word"></h1>
            </td>
        </tr>
        <tr>
            <td height=40px>
                <h4 id="showclock" class="word"></h4>
            </td>
        </tr>
    </table>
</body>
</html>
