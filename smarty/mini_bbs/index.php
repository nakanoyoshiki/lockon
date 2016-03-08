<?php
ini_set( 'display_errors', 1 );
require_once('Smarty/libs/Smarty.class.php');
require('smarty.php');
session_start();
require('dbconnect.php');
if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$stmt = $pdo -> prepare("SELECT name, id  FROM members WHERE id = ?;");
	$stmt->bindValue(1, $id);
	$stmt->execute();
	$member = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
	header('Location: login.php');
	exit();
}
$errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$message = null;
	if(!isset($_POST['message']) || !mb_strlen($_POST['message'])){
		$errors['message'] = 'messageを入力して下さい';
	}elseif (strlen($_POST['message']) > 140) {
		$errors['message'] = 'messageは140文字以内で入力してください';
	}else{
		$message = $_POST['message'];
	}
	if(count($errors) === 0){
		try{
		  $stmt = $pdo -> prepare("INSERT INTO posts(member_id,message) VALUES (:member_id, :message)");
			$stmt->bindValue(':member_id', $id, PDO::PARAM_INT);
	 		$stmt->bindValue(':message', $message, PDO::PARAM_STR);
	 		$stmt->execute();
		}catch(PDOException $e) {
			$errors['insert'] =  '申し訳ございませんが、投稿できませんでした';//.$e->getMessage();
		}
	}
}
$post='';
$posts = array();
$stsm = $pdo->query('SELECT posts.member_id ,members.name ,posts.message, posts.created , posts.id
  FROM members,posts WHERE members.id = posts.member_id ORDER BY posts.created DESC');
$stsm->execute();
while($post  = $stsm -> fetch(PDO::FETCH_ASSOC)){
  $posts[] = $post;
}

$smarty->assign("title", "掲示板");
$smarty->assign('errors', $errors);
$smarty->assign('posts', $posts);
$smarty->assign('member', $member);
$smarty->display('index.tpl');

?>