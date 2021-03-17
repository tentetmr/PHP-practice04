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
<h1>Lupicia Gourmand</h1>
</header>
<!-- ログインフィールド -->
<div class="intro">
Très Gourmandは会員制のグルメ情報共有サイトです。みんなには教えたくない、でも誰かに共有したい！そんな素敵なお店にまつわるレビューやエピソードを集めたグルマンのための憩いの場です
</div>
<p>既に会員の方は下よりログインしてください
</p>
<div class="sessionWrap">
  <div>
  <form method="post" action="login_act.php" class="post">
     <p>Login</p>
 
     <p>User ID：<input type="text" name="lid" placeholder="半角英数字"></p>
 
     <p>Password：<input type="text" name="lpw" placeholder="半角英数字"></p>
     
     <input type="submit" value="ログイン">
     
     <div class="loginFailed">
       <?php
       $loginFailed = "";
       echo $loginFailed;
       ?>
     </div>
  </form>
</div>


<div class="registrationButton">
  <p>↓↓まだ会員登録をされていない方↓↓</p>
  <button>新規登録</button>
</div>

<div class="registration deactive">
  <form method="post" action="register.php" class="post">
    <p>新規登録</p>
    
    <p>Username：<input type="text" name="u_name" placeholder="半角英数字"></p>
    
    <p>User ID ：<input type="text" name="lid" placeholder="半角英数字"></p>

    <p>Password：<input type="text" name="lpw" placeholder="半角英数字"></p>
    
    <input type="submit" value="新規登録">
  </form>
</div>

</div>

</header>
<main>
</main>
<footer>
<!-- フッターフィールド -->
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(".registrationButton").on("click",function(){
    $(".registration").removeClass("deactive");
    $(".registration").addClass("active");
  });
  
</script>
</body>
</html>