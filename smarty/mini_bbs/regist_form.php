<?php
ini_set( 'display_errors', 1 );
require_once('Smarty/libs/Smarty.class.php');
require('dbconnect.php');
session_start();
if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$stmt = $pdo->prepare("SELECT * FROM members WHERE id = ?;");
	$stmt->bindValue(1, $id);
	$stmt->execute();
}
$name = $email = $password ="";
$errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = null;
	if(!isset($_POST['name']) || !mb_strlen($_POST['name'])){
		$errors['name'] = '名前を入力してください';
	}elseif (mb_strlen($_POST['name']) > 15) {
		$errors['name'] = '名前は15文字以内で入力してください';
	}else {
		$name = $_POST['name'];
	}
	$email= $_POST['email'];
	$stmt = $pdo -> prepare("SELECT email FROM members WHERE email = ?");
	$stmt-> execute(array($email));
  if(!isset($_POST['email']) || !mb_strlen($_POST['email'])){
    $errors['email'] = 'メールアドレスを入力してください';
		$email="";
  }elseif ($stmt !== false) {
  	while($item = $stmt->fetch(PDO::FETCH_ASSOC)){
			if($item['email'] == $_POST['email']){
				$errors['email'] = 'このメールアドレスはすでに使われてます';
				$email="";
			}
		}
  }else{
    $email = $_POST['email'];
  }
	if(!isset($_POST['password']) || !mb_strlen($_POST['password'])){
		$errors['password'] ='パスワードを入力してください';
  }elseif (mb_strlen($_POST['password']) < 5) {
		$errors['password'] = 'パスワードは5文字以上入力してください';
  } else {
  $password = $_POST['password'];
	}
	if(count($errors) === 0){
		try{
			$_SESSION['name'] = $_POST['name'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $_POST['password'];
	  	header( 'Location: regist_confirm.php');
		}catch(PDOException $e) {
			$errors['insert_error'] = '会員登録することができません';
		}
	}
}
$smarty = new Smarty();
$smarty->template_dir = '../../smarty_template/mini_bbs/templates/';
$smarty->compile_dir = '../../smarty_template/mini_bbs/templates_c/';
$smarty->config_dir = '../../smarty_template/mini_bbs/configs/';
$smarty->cache_dir = '../../smarty_template/mini_bbs/cache/';
$smarty->assign("title", "会員登録");
$smarty->assign('errors', $errors);
$smarty->assign("name",$name);
$smarty->assign("email",$email);
$smarty->assign("password",$password);
$smarty->assign('_SEESION' , $_SESSION);
$smarty->display('regist_form.tpl');
?>