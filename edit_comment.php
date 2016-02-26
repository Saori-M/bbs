
<html>
<head>
  <?php
  require_once "connect_db.php";

    $res_id = $_GET['res_id'];

 $stmt = $dbh->prepare("select * from comments where id = ? ");
 $stmt->execute(array($res_id));
 $comments = $stmt->fetch();

 ?>
   <h3> <?php echo $comments["text"]."<br />";?></h3>


<h3>編集フォーム</h3>
<form action="editting_comment.php?res_id=<?php echo $res_id;?>" method="post">
  text：<br />
  <textarea cols="30" rows="5" type="text" name="text" size="30" value="" ></textarea><br />
  <br />
  <input type="submit" value="作成" />
</form>

<form action="delete_comment.php?res_id=<?php echo $res_id;?>" method="post">
  <input type="submit" value="削除" />
</form>


</head>
<body>
<h1><?php echo "" ?></h1>

</body>
</html>
