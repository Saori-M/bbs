<?php
require_once "connect_db.php";
session_start();

if(isset($_GET['id'])) {
   $id = $_GET['id'];
}

$stmt = $dbh->prepare("UPDATE threads SET title = ?, text = ? WHERE id = ? ");
$stmt->execute(array($_POST['title'], $_POST['text'], $_GET['id']));

header("Location: ./res.php?id=$id");
exit();

 ?>
