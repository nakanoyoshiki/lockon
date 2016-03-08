<?php
ini_set( 'display_errors', 1 );
require_once('Smarty/libs/Smarty.class.php');
session_start();
require('dbconnect.php');
require('smarty.php');
if(isset($_SESSION['id'])){
	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
		$stmt->execute(array($id));
		$message = $stmt->fetch(PDO::FETCH_ASSOC);
		$errors = array();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($_SESSION['id'] == $message['member_id']){
        $stmt = $pdo -> prepare("DELETE FROM posts WHERE id = ?");
        $stmt -> execute(array($id));
    		// $stmt = $pdo -> prepare("UPDATE posts SET message =? WHERE id = ?");
    		// $message = $stmt->execute(array($message, $id));
				header('Location: index.php');
      }else{
        $errors['message'] = '他のユーザの投稿を消すことはできません';
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