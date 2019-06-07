<?php

//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_soccer;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//２．データ表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_soccer_table");

$status = $stmt->execute();

//３．データ表示
$view1 = '<table class="table table-striped">'.
"<tr>
<th>id</th>
<th>練習日付</th>
<th>練習曜日</th>
<th>選手名</th>
<th>背番号</th>
<th>ポジション</th>
<th>VAS</th>
<th>跳躍力</th>
<th>練習強度（選手）</th>
<th>練習強度（監督）</th>
</tr>";

$view2 = "";
$view3 = "</table>";

if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery".$error[2]);
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
        $view2 .= 
        "<tr>
        <td>".$result["id"]."</td>
        <td>".$result["sdate"]."</td>
        <td>".$result["sweek"]."</td>
        <td>".$result["name"]."</td>
        <td>".$result["number"]."</td>
        <td>".$result["inlineRadioOptions"]."</td>
        <td>".$result["vas"]."</td>
        <td>".$result["jump"]."</td>
        <td>".$result["training"]."</td>
        <td>".$result["training2"]."</td>
        <td><a href='soccer_detail.php?id=".$result["id"]."'>更新</a></td>
        <td><a href='soccer_delete.php?id=".$result["id"]."'>削除</a></td>
        </tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>サッカー選手データ</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>main{padding-top: 100px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<!-- navbar-inverse で黒系ナビゲーションの指定をしています。-->
<!-- navbar-fixed-top でヘッダー固定の指定をしています。-->
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
<span class="icon-bar"></span> </button>
<!--button~はウインドウのサイズが780px以下になった時に表示されます。-->
<a class="navbar-brand" href="#">GIANT KILLING(仮)</a>
<!--こちらにサイト名を入れます。-->
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="soccer_index.php">登録画面</a></li>
<li class="active"><a href="soccer_select.php">一覧画面</a></li>
<li><a href="tachometer.php">コンディションメーター</a></li>
</ul>
</div>
<!--/.nav-collapse -->
</div>
</div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div align="center">
    <h2>データ一覧（全データ表示）</h2>
</div>
    <div class="container jumbotron"><?=$view1?><?=$view2?><?=$view3?></div>
<!-- Main[End] -->


</body>
</html>