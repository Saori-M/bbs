<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <?php require_once "connect_db.php";
          session_start();?>

    <h1>スレッド一覧</h1>
      <?php
        $sql = "select * from threads";
        $stmt = $dbh->query($sql);
        foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $thread){
          echo $thread["title"]."<br />".$thread["text"]."<br />";
      ?>
          <a href="./res.php?id=<?php echo $thread["id"]; ?>">コメントを見る</a><br />
      <?php
         if ($thread["user_id"] == $_SESSION['user_id']) {
        ?>
            <a href="./edit?id=<?php echo $thread["id"]; ?>">編集・削除</a><br />
        <?php
            echo "-----<br />";
          } else {
            echo "-----<br />";
          }
        }
      ?>

      <h1>スレッド作成</h1>
      <form action="new_thread.php" method="post">
      title：<br />
      <input type="text" name="title" size="30" value="" /><br />
      text：<br />
      <textarea cols="30" rows="5" type="text" name="text" size="30" value="" ></textarea><br />
        <br />
      <input type="hidden" name="page" value="thread">
      <input type="submit" value="作成" />
      </form>

      <?php require "footer.html";?>
    </body>
  </html>
