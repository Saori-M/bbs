<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>新規登録</title>
<meta name="description">
</head>
</body>
<?php
// registrations/new.phpから受け取る
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// データベースに接続
require_once "connect_db.php"

// usersテーブルにinsert
$stmt = $dbh->prepare("insert into users (name,email, password) values (:name,:email,:password)");
$stmt->bindParam(":name",$name);
$stmt->bindParam(":email",$email);
$stmt->bindParam(":password",$password);
$stmt->execute();

//データベース接続を切断
$dbh = null;

// 登録完了
echo "$name さん<br />$email で登録完了しました。";

print '<a href="./index.php">ログイン画面</a>';

?>
</body>
</html>
