<?php
session_start();
require('dbconnect.php');
if(isset($_SESSION['id'])){
  if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $stmt = $pdo -> prepare("DELETE FROM posts WHERE id = ?");
    $stmt -> execute(array($id));
    header('Location: index.php');
  }else{
    header('Location: index.php');
  }
}else{
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
  </head>
  <body>
  </body>
</html>