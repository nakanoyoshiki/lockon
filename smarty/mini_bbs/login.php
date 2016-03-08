<?php
require('dbconnect.php');
require('smarty.php');
session_start();
ini_set( 'display_errors', 1 );
require_once('Smarty/libs/Smarty.class.php');
$email = $password = "";
$errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(!isset($_POST['email']) || !mb_strlen($_POST['email'])){
		$errors['email'] = 'emailを入力して下さい';
  }else{
    $email = $_POST['email'];
  }
  if(!isset($_POST['password']) || !mb_strlen($_POST['password'])){
    $errors['password'] = 'passwordを入力してください';
  }else{
    $password = $_POST['password'];
  }
  if(count($errors) === 0){
    try{
      $stmt = $pdo -> prepare("SELECT * FROM members WHERE email = ? AND password = ?;");
      $stmt->bindValue(1, $email);
      $stmt->bindValue(2, $password);
      $stmt->execute();
      if($member = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['id'] = $member['id'];
            header('Location: index.php ');
      }else{
        $errors['login_error'] = 'ログインすることができませんでした';
      }
    }catch(PDOException $e) {
      $errors['insert'] =  '申し訳ございませんが、ログインできませんでした';//.$e->getMessage();
    }
  }
}

$smarty->assign("title", "ログイン");
$smarty->assign('errors', array(''));
$smarty->assign('email', $email);
$smarty->assign('password', $password);
$smarty->assign('_SESSION', $_SESSION);
$smarty->display('login.tpl');
?>