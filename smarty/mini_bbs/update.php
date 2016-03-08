<?php
ini_set( 'display_errors', 1 );
require_once('Smarty/libs/Smarty.class.php');
require('dbconnect.php');
session_start();
require('smarty.php');
if(isset($_SESSION['id'])){
	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
		$stmt->execute(array($id));
		$message = $stmt->fetch(PDO::FETCH_ASSOC);
		$errors = array();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!isset($_POST['message']) || !strlen($_POST['message'])){
				$errors['message'] = 'messageを入力して下さい';
			}elseif (strlen($_POST['message']) > 140) {
				$errors['message'] = 'messageは140文字以内で入力してください';
			}else{
				$message = $_POST['message'];
			}
			if(count($errors) === 0){
    		$stmt = $pdo -> prepare("UPDATE posts SET message =? WHERE id = ?");
    		$message = $stmt->execute(array($message, $id));
				header('Location: index.php');
			}
  	}
	}else {
		header('Location: index.php');
	}
}else{
	header('Location: login.php');
}
$smarty->assign("title", "掲示板");
$smarty->assign('errors', $errors);
$smarty->assign('message',$message);
$smarty->display('update.tpl');
?>