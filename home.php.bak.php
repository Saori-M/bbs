<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

<?php
require_once "connect_db.php";

$page = $_POST["page"];
$state = false;

  if ($page == "login") {
    $email = $_POST["email"];
    $stmt = $dbh->prepare("SELECT password,id from users where email = ?");
    $stmt->execute(array($email));
    $user_data = $stmt->fetch();
    $password = $user_data["password"];
    $id = $user_data["id"];

    if ($password == $_POST["password"]){
      $state = true;
      echo $state;
      session_start();
      $SESSION['user_id'] = $id;
    } else {
      $state = false;
    }
  } elseif ($page == "create") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $dbh->prepare("insert into users (name,email,password) values (:name,:email,:password)");
    $stmt->bindParam(":name",$name,PDO::PARAM_STR);
    $stmt->bindParam(":email",$email,PDO::PARAM_STR);
    $stmt->bindParam(":password",$password,PDO::PARAM_STR);
    $stmt->execute();

    echo "ユーザー登録が完了しました。";
    $state = true;

    $stmt = $dbh->prepare("SELECT id from users where email = ?");
    $stmt->execute(array($email));
    session_start();
    $_SESSION['user_id'] = $stmt->fetch()["id"];

  } elseif ($page == "thread") {
    $title = $_POST["title"];
    $text = $_POST["text"];
    $id = $_POST["id"];
    $stmt = $dbh->prepare("insert into threads (title,text,user_id) values (:title,:text,:user_id)");

    $stmt->bindParam(":title",$title,PDO::PARAM_STR);
    $stmt->bindParam(":text",$text,PDO::PARAM_STR);
    $stmt->bindParam(":user_id",$id,PDO::PARAM_STR);

    $stmt->execute();
    echo "スレッドを追加しました。";
    $state = true;
  } else {
    echo "不正なリクエストです。";
    $state = false;
  }


  if ($state == true) {
     ?>
      <h1>スレッド一覧</h1>
      <?php

        $sql = "select * from threads";
        $stmt = $dbh->query($sql);
        foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $thread){
          echo $thread["title"]."<br />".$thread["text"]."<br />";

    ?>
          <a href="./res.php?id=<?php echo $thread["id"]; ?>">コメントを見る</a><br />
          <?php
          $thread_id = $thread["id"];
         if ($id == $thread["user_id"]) {
            ?>
            <a href="./edit?id=<?php echo $thread_id; ?>name=<?php echo $id; ?>">編集・削除</a><br />
            <?php
            echo "-----<br />";
          } else {
            echo "-----<br />";
          }
        }
  }?>
    </body>
  </html>
