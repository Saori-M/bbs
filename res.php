<html>
  <head>
    <?php
    require_once "./connect_db.php";
    session_start();

    if(isset($_GET['id'])) {
      $id = $_GET['id'];
    }

    $stmt = $dbh->prepare("SELECT * from threads where id = ?");
    $stmt->execute(array($id));
    $thread_data = $stmt->fetch();

//表示したいもの
    $title = $thread_data["title"];
    $text = $thread_data["text"];

    ?>

  </head>
  <body>
    <h1><?php echo $title."<br />"; ?></h1>
    <h2><?php echo $text."<br />"; ?></h2>

    <?php

    $stmt = $dbh->prepare("SELECT * from comments where thread_id = ?");
    $stmt->execute(array($id));
    $comment_data = $stmt->fetchALL();

    foreach($comment_data as $row){
      echo $row["text"];
      if ($row["user_id"] == $_SESSION['user_id']) {
    ?>
    <a href="edit_comment?res_id=<?php echo $row["id"];?>">編集・削除<br /></a>
    <?php
      } else {
        echo "<br />";
      }
    }
    ?>

    <form action="new_res?id=<?php echo $id;?>" method="post">
    コメント：<br />
    <textarea cols="30" rows="5" type="text" name="text" size="30" value="" ></textarea><br />
      <br />
<!--    <input type="hidden" name="thread_id" value=<?php echo $_SESSION['user_id']; ?>>-->
    <input type="submit" value="作成" />
    </form>

    <?php
  //  require "./footer.html";
     ?>

  </body>
</html>
