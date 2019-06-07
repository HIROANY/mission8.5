<?php

//1. soccer_detail.phpから送られてきたデータを変数で受け取る
$id = $_POST["id"];//id
$sdate = $_POST["sdate"];//練習日付
$name =  $_POST["name"];//選手名
$number =  $_POST["number"];//背番号
$inlineRadioOptions = $_POST["inlineRadioOptions"];//ポジション

$vas =  $_POST["vas"];//VAS
$jump =  $_POST["jump"];//跳躍力
$training =  $_POST["training"];//練習強度（選手）
$training2 =  $_POST["training2"];//練習強度（監督）

//登録日の曜日
$datetime = new DateTime($sdate);
$week = array("日", "月", "火", "水", "木", "金", "土");
$w = (int)$datetime->format('w');
$sweek = $week[$w];

//2. DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_soccer;charset=utf8;host=localhost','root','');
} catch (PDOException $e){
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//３．データ登録SQL作成
$sql = "UPDATE gs_soccer_table SET 
sdate=:sdate, 
sweek=:sweek, 
name=:name, 
number=:number, 
inlineRadioOptions=:inlineRadioOptions, 
vas=:vas, 
jump=:jump, 
training=:training, 
training2=:training2 
WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':sdate', $sdate, PDO::PARAM_STR);
$stmt->bindValue(':sweek', $sweek, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':number', $number, PDO::PARAM_INT);
$stmt->bindValue(':inlineRadioOptions', $inlineRadioOptions, PDO::PARAM_STR);
$stmt->bindValue(':vas', $vas, PDO::PARAM_INT);
$stmt->bindValue(':jump', $jump, PDO::PARAM_INT);
$stmt->bindValue(':training', $training, PDO::PARAM_INT);
$stmt->bindValue(':training2', $training2, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: soccer_select.php");
    exit;
}
?>