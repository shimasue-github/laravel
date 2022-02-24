<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BAR</title>
        <!-- レスポンシブ読み込み -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <style>
        #g-nav{
            /*position:fixed;にし、z-indexの数値を大きくして前面へ*/
            position:fixed;
            z-index: 999;
            /*ナビのスタート位置と形状*/
            bottom:-120%;
            left:0;
            width:100%;
            height: 100vh;/*ナビの高さ*/
            /* background-image: url(../images/back.png);   */
            background:rgba(71, 77, 185, 0.875);
            /*動き*/
            transition: all 0.6s;
        }
        /*アクティブクラスがついたら位置を0に*/
        #g-nav.panelactive{
            bottom: 0;
        }
        /*ナビゲーションの縦スクロール*/
        #g-nav.panelactive #g-nav-list{
            /*ナビの数が増えた場合縦スクロール*/
            position: fixed;
            z-index: 999; 
            width: 100%;
            height: 100vh;/*表示する高さ*/
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }
        /*ナビゲーション*/
        #g-nav ul {
            /*ナビゲーション天地中央揃え*/
            position: absolute;
            z-index: 999;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
        }
        /*リストのレイアウト設定*/
        #g-nav li{
            list-style: none;
            text-align: center; 
        }
        #g-nav li a{
            color: white;
            text-decoration: none;
            padding:10px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: bold;
        }
        /*========= ボタンのためのCSS ===============*/
        .openbtn{
            position:fixed;
            z-index: 9999;/*ボタンを最前面に*/
            top:10px;
            right: 10px;
            cursor: pointer;
            width: 50px;
            height:50px;
        }
            
        /*×に変化*/	
        .openbtn span{
            display: inline-block;
            transition: all .4s;
            position: absolute;
            left: 14px;
            height: 3px;
            border-radius: 2px;
            background-color: rgb(0, 0, 0);
            width: 45%;
        }
        .openbtn span:nth-of-type(1) {
            top:15px;	
        }
        .openbtn span:nth-of-type(2) {
            top:23px;
        }
        .openbtn span:nth-of-type(3) {
            top:31px;
        }
        .openbtn.active span:nth-of-type(1) {
            top: 18px;
            left: 18px;
            transform: translateY(6px) rotate(-45deg);
            width: 30%;
        }
        .openbtn.active span:nth-of-type(2) {
            opacity: 0;
        }
        .openbtn.active span:nth-of-type(3){
            top: 30px;
            left: 18px;
            transform: translateY(-6px) rotate(45deg);
            width: 30%;
        }
        a{
            text-align: left;
            margin-left: -180px;
        }
        </style>
    </head>
<body>
    <div class="openbtn"><span></span><span></span><span></span></div>
    <nav id="g-nav">
        <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
            <ul>
                <li><a href={{ asset('../home')}}>HOME</a></li> 
                <li><a href={{ asset('../configuration')}}>CONFIGURATION</a></li> 
            </ul>
        </div>
    </nav>  
    <!-- jquery読み込み -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
    $(".openbtn").click(function () {//ボタンがクリックされたら
        $(this).toggleClass('active');//ボタン自身に activeクラスを付与し
        $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
    });
    $("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
        $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
        $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
    });
    </script>
</body>
</html>