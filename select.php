<?php
session_start();
include("funcs.php");

$pdo =  db_connect();

$stmt = $pdo->prepare("SELECT * FROM sns_contents order by indate DESC");
$status = $stmt->execute();

$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<div class='postBlock'>";
    $view .= "<p class='uName'>".$result["u_name"]."</p>";
    $view .= "<p>".$result["contents"]."</p>";
    $view .= "<p>".$result["indate"]."</p>";
    
    if($result["u_name"] == $_SESSION["u_name"]){
      $view .= '<a href="u_view.php?id='.$result["id"].'">';
      $view .= "更新　";
      $view .= "</a>";
      $view .= '<a href="delete.php?id='.$result["id"].'">';
      $view .= "削除";
      $view .= "</a>";
    }  
    $view .= "</div>";
  }

}
?>
