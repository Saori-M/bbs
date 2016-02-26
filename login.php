<?php

require_once "connect_db.php";

    $email = $_POST["email"];
    $stmt = $dbh->prepare("SELECT password,id from users where email = ?");
    $stmt->execute(array($email));
    $user_data = $stmt->fetch();
    $password = $user_data["password"];

    if ($password == $_POST["password"]) {
      session_start();
      $_SESSION['user_id'] = $user_data["id"];
      header('Location: ./home.php');
      exit();
    } else {
      header('Location: ./index.php');
      exit();
    }

?>
