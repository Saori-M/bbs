
<html>
<head>
  <?php
  require_once "connect_db.php";
  if(isset($_GET['id'])) {
     $id = $_GET['id'];
 }

 $stmt = $dbh->prepare("select * from threads where id = ? ");
 $stmt->execute(array($id));
 $thread = $stmt->fetch();
 echo $id;
 ?>
   <h2> <?php echo $thread["title"]."<br />";?></h2>
   <h3> <?php echo $thread["text"]."<br />";?></h3>


<h3>編集フォーム</h3>
<form action="editting_thread.php?id=<?php echo $id;?>" method="post">
  title：<br />
  <input type="text" name="title" size="30" value="" /><br />
  text：<br />
  <textarea cols="30" rows="5" type="text" name="text" size="30" value="" ></textarea><br />
  <br />
  <input type="hidden" name="page" value="thread">
  <input type="submit" value="編集" />
</form>

<form action="delete_thread.php?id=<?php echo $id;?>" method="post">
  <input type="hidden" name="page" value="thread">
  <input type="submit" value="削除" />
</form>


</head>
<body>
<h1><?php echo "" ?></h1>

</body>
</html>
