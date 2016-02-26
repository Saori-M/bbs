<?php
require "connect_db.php";
session_start();

$title = $_POST["title"];
$text = $_POST["text"];

$stmt = $dbh->prepare("insert into threads (title,text,user_id) values (:title,:text,:user_id)");

$stmt->bindParam(":title",$title,PDO::PARAM_STR);
$stmt->bindParam(":text",$text,PDO::PARAM_STR);
$stmt->bindParam(":user_id",$_SESSION['user_id'],PDO::PARAM_STR);

$stmt->execute();

header('Location: ./home.php');
exit();

?>
