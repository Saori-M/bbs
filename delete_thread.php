<?php
require_once "connect_db.php";

if(isset($_GET['id'])) {
   $id = $_GET['id'];
}
echo $id;
$stmt = $dbh->prepare("DELETE FROM threads WHERE id = $id");
$stmt->execute();

header("Location: ./home.php");
exit();

 ?>
