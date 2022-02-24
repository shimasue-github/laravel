<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CONFIGURATION</title>
        <!-- レスポンシブ読み込み -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- fonts読み込み -->
        <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">
        <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
        <!-- css読み込み -->
        {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}
        <style>
            #card{
                border-radius: 5px;
                border:1px solid black;
                background-image: url({{ asset('image/weather/card.png')}});
                color: rgb(0, 0, 0);
                height :180px;
                width: 90%;
                margin-top: 60px;
                margin-left: auto;
                margin-right: auto;
            }
            #face{
                border-radius: 5px;
            }
            p{
                margin-top:-3px; 
                margin-bottom:-3px;  
                margin-left: 5px; 
            }
        </style>
    </head>
<body>
    <table id="card">
        <tr>
            <td colspan="2" height=40px><p><?php echo $company ?></p></td>
        </tr>
        <tr>
            <td width="90px" rowspan="5"><img src="{{ asset('image/weather/face.png')}}" id="face"></td>
        </tr>
        <tr>
            <td><p>社員番号 : <?php echo $id ?><p></td>
        </tr>
        <tr>
            <td><p>所属 : <?php echo $belongs ?><p></td>
        </tr>
        <tr>
            <td><p>氏名 : <?php echo $name ?><p></td>
        </tr>
        <tr>
            <td><p>入社年月 : <?php echo $hiredate?><p></td>
        </tr>
    </table>
</body>
</html>