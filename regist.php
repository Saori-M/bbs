<?php
require_once "connect_db.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$stmt = $dbh->prepare("insert into users (name,email,password) values (:name,:email,:password)");
$stmt->bindParam(":name",$name,PDO::PARAM_STR);
$stmt->bindParam(":email",$email,PDO::PARAM_STR);
$stmt->bindParam(":password",$password,PDO::PARAM_STR);
$stmt->execute();

header('Location: ./index.php');
exit();

?>
