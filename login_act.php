<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

include("funcs.php");

$pdo =  db_connect();

$sql = "SELECT * FROM sns_user WHERE u_id=:lid AND u_pw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

$val = $stmt->fetch(); //1レコードだけ取得する方法

if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["u_name"]   = $val['u_name'];
  //Login処理OKの場合select.phpへ遷移
  header("Location: member.php");
}else{
  //Login処理NGの場合login.phpへ遷移
  header("Location: index.php");
  $loginFailed .= "<P>ログインに失敗しました</p>";
}
//処理終了
exit();
?>

