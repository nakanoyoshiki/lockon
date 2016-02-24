<?php
session_start();
ini_set( 'display_errors', 1 );
require_once('Smarty/libs/Smarty.class.php');
require('dbconnect.php');
$email = $password = $name ="";
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$errors =array();
if($_SERVER['REQUEST_METHOD']== 'POST'){
	if(!isset($name) || !mb_strlen($name)){
		$errors['name'] = '名前を入力してください';
	}elseif (mb_strlen($name) > 15) {
		$errors['name'] = '名前は15文字以内で入力してください';
	}
	$stmt = $pdo -> prepare("SELECT email FROM members WHERE email = ?");
	$stmt-> execute(array($email));
  if(!isset($email) || !mb_strlen($email)){
    $errors['email'] = 'メールアドレスを入力してください';
  }elseif ($stmt !== false) {
  	while($item = $stmt->fetch(PDO::FETCH_ASSOC)){
			if($item['email'] == $_POST['email']){
				$errors['email'] = 'このメールアドレスはすでに使われてます';
			}
		}
  }
	if(!isset($password) || !mb_strlen($password)){
		$errors['password'] ='パスワードを入力してください';
  }elseif (mb_strlen($password) < 5) {
		$errors['password'] = '5文字以上入力してください';
  }
	if(empty($errors)){
		try{
			$stmt = $pdo -> prepare("INSERT INTO members(name,email,password) VALUES (:name, :email, :password)");
			$stmt->bindParam(':name', $name, PDO::PARAM_STR);
			$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
			$stmt->execute();
			$_SESSION['name']='comp';
	    header('Location: regist_complete.php');
		}catch(PDOException $e) {
			$errors['insert'] =  '申し訳ございませんが、登録できませんでした';//.$e->getMessage();
		}
	}
}
$smarty = new Smarty();
$smarty->template_dir = '../../smarty_template/mini_bbs/templates/';
$smarty->compile_dir = '../../smarty_template/mini_bbs/templates_c/';
$smarty->config_dir = '../../smarty_template/mini_bbs/configs/';
$smarty->cache_dir = '../../smarty_template/mini_bbs/cache/';
$smarty->assign("title", "会員登録確認");
$smarty->assign('errors', $errors);
$smarty->assign("name",$name);
$smarty->assign("email",$email);
$smarty->assign("password",$password);
$smarty->assign('_SEESION' , $_SESSION);
$smarty->display('regist_confirm.tpl');
?>
