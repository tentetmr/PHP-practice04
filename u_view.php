<?php
include("funcs.php");
//1.GETでid値を取得
$id = $_GET["id"];

$pdo =  db_connect();


//3.SELECT * FROM gs_an_table WHERE id=:id;
$sql = "SELECT * FROM sns_contents WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //１データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();

}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Head[Start] -->
<header>
    <div class=""><a class="" href="member.php">データ一覧</a></div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
     <p>編集内容を入力</p>
     
     <div><textArea name="contents" rows="4" cols="40"><?=$row["contents"]?></textArea></div>
     <input type="hidden" name="updatedSysdate" value="<?=$row["updatedSysdate"]?>">
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="修正">
</form>
<!-- Main[End] -->


</body>
</html>
