<?php
 require_once "connect_db.php";
 session_start();

 if(isset($_GET['id'])) {
    $thread_id = $_GET['id'];
  }

 $text = $_POST["text"];
 $stmt = $dbh->prepare("insert into comments (text,user_id,thread_id) values (:text,:user_id,:thread_id)");

 $stmt->bindParam(":text",$text,PDO::PARAM_STR);
 $stmt->bindParam(":user_id",$_SESSION['user_id'],PDO::PARAM_STR);
 $stmt->bindParam(":thread_id",$thread_id,PDO::PARAM_STR);

 $stmt->execute();
 header("Location: ./res.php?id=$thread_id");
 exit();

 ?>
