<?php
require_once "connect_db.php";

if(isset($_GET['res_id'])) {
   $res_id = $_GET['res_id'];
}
$stmt = $dbh->prepare("SELECT * FROM comments WHERE id = $res_id ");
$stmt->execute();
$comment_data = $stmt->fetch();
$thread_id = $comment_data["thread_id"];


$stmt = $dbh->prepare("DELETE FROM comments WHERE id = $res_id");
$stmt->execute();

header("Location: ./res.php?id=$thread_id");
exit();


 ?>
