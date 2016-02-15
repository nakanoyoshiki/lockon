<?php
// $link = mysql_connect('localhost', 'root', 'root');
// if(!$link){
// 	die('データベースに接続できません');
// }
// mysql_select_db('mini_bbs' ,$link);

try {
$pdo = new PDO('mysql:host=localhost;dbname=mini_bbs;charset=utf8','root','root');
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}
?>