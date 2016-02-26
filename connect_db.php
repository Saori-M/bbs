<?php
header("Content-Type: text/html; charset=UTF-8");

try {
    $dbh = new PDO('mysql:host=localhost;dbname=bbs_app','dbuser','pass');
} catch (PDOException $e){
    var_dump($e->getMessage());
    exit;
}

 ?>
