<?php
require_once "connect_db.php";
session_start();


if(isset($_GET['res_id'])) {
   $res_id = $_GET['res_id'];
}


$stmt = $dbh->prepare("UPDATE comments SET text = ? WHERE id = ? ");
$stmt->execute(array($_POST['text'], $res_id));

$stmt = $dbh->prepare("SELECT * FROM comments WHERE id = ? ");
$stmt->execute(array($res_id));
$comment_data = $stmt->fetch();


$thread_id = $comment_data["thread_id"];


header("Location: ./res.php?id=$thread_id");
exit();

 ?>
