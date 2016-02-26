<?php
require_once "connect_db.php";

if(isset($_GET['id'])) {
   $id = $_GET['id'];
}

$sql = "delete * from threads where id = $id";
$stmt = $dbh->query($sql);

header("Location: ./res.php?id=$id");
exit();


 ?>
