<?php
session_start();
require('dbconnect.php');
$id = $_REQUEST['id'];
$stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
$stmt->execute(array($id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap 101 Template</title>
  </head>
  <body>
  </body>
</html>