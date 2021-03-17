<?php
session_start();
include("funcs.php");

if(
  !isset($_POST["contents"]) || $_POST["contents"]==""
){
  exit('ParamError');
}

$contents = $_POST["contents"];
$u_name = $_SESSION["u_name"];

$pdo =  db_connect();

$sql = "INSERT INTO sns_contents(id, u_name, contents, indate )VALUES(NULL, :a1, :a2, sysdate())";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $u_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $contents, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  header("Location: member.php");
  exit;

}
?>

