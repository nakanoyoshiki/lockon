<?php
try{
  $pdo = new PDO('mysql:host=localhost;dbname=mini_bbs;charset=utf8','root','root');
}catch(PDOException $e) {
  exit('データベース接続失敗。'.$e->getMessage());
}
?>