<?php
$link = mysql_connect('localhost', 'root', 'root');
if(!$link){
	die('データベースに接続できません');
}
mysql_select_db('mini_bbs' ,$link);
?>