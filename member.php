<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
  <header>
  <a href="index.php">ログアウト</a>
  </header>
  <main>
<!-- 投稿フィールド -->
    <form method="POST" action="insert.php" class="post">
      <p>
        <textarea name="contents" id="" cols="30" rows="10"></textarea>
      </p>

      <input type="submit" value="send">
      </form>

<!-- セレクトフィールド -->
<div class="postContents">
<?php
include("select.php");
echo $view;
?>
</div>

</main>
<footer>
<!-- フッターフィールド -->
</footer>
</body>
</html>