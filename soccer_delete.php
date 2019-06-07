<?php

//1. id受け取り
$id = $_GET["id"];

//1.  DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db_soccer;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした！'.$e->getMessage());
}

//3．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_soccer_table WHERE id=:id");//$idではなく、バインド変数:idを使う
$stmt->bindValue(":id", $id, PDO::PARAM_INT);//DBにとって危ない文字をbindValueで排除
$status = $stmt->execute();

//4．データ削除
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: soccer_select.php");
    exit;
}

?>