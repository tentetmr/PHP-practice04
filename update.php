<?php
include("funcs.php");
//1.GETでid値を取得
$pdo =  db_connect();

//1.POSTでid,name,email,naiyouを取得
$id = $_POST["id"];
$contents = $_POST["contents"];
$updatedSysdate = $_POST["updatedSysdate"];


//3.UPDATE gs_an_table SET ....; で更新(bindValue)
$sql = 'UPDATE sns_contents SET contents=:contents, indate=:updatedSysdate WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':contents',  $contents, PDO::PARAM_STR);
$stmt->bindValue(':id',      $id,     PDO::PARAM_INT);    //更新したいidを渡す
$stmt->bindValue(':updatedSysdate',      $updatedSysdate);    //更新したいidを渡す
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: member.php");
  exit;

}



?>
