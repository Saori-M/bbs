<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <?php
  $logout = $_POST["logout"];
  if ($logout == true);{
    session_unset();
    echo "ばいばい";
  }

   ?>

</head>
<body>
  <header>


    <a class=home href="./index.php">ログイン画面へ</a>


  </header>
</body>

</html>
