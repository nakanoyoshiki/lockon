<?php
session_start();
require('../dbconnect.php');
$errors = array();
if($_SERVER['REQUEST_METHOD']== 'POST'){
  $name = null;
  if(!isset($_SESSION['name']) || !strlen($_SESSION['name'])){
    $errors['name']= '名前を入力してください';
  }elseif (strlen($_SESSION['name']) > 15) {
    $errors['name'] = '名前は15文字以内で入力してください';
  }else{
    $name = $_SESSION['name'];
  }
  $email = null;
  if(!isset($_SESSION['email']) || !strlen($_SESSION['email'])){
    $errors['email'] = 'メールアドレスを入力してください';
  }else {
    $email = $_SESSION['email'];
  }
  $password = null;
   if(!isset($_SESSION['password']) || !strlen($_SESSION['password'])){
       $errors['password'] ='パスワードを入力してください';
     }elseif (strlen($_SESSION['password']) < 5) {
       $errors['password'] ='5文字以上入力してください';
     } else {
     $password = $_SESSION['password'];
  }
	if(count($errors) ==0){
    $stmt = $pdo -> prepare("INSERT INTO members(name,email,password) VALUES (:name, :email, :password)");
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
		$stmt->execute();
    header('Location: thanks.php');
  	exit();
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>会員登録</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
		<div class="page-header">
  		<h1>会員登録 <small>Subtext for header</small></h1>
		</div>
		<input type="hidden" name="action" value="submit" />
		<form class="form-horizontal" id="frmInput" action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="=submit" />
			<div class="form-group">
				<label class="col-sm-2 control-label">名前</label>
					<div class="col-sm-8">
						<input type="text" name="name" class="form-control" id="name" placeholder="name"
            value="<?php echo htmlspecialchars($_SESSION['name'],ENT_QUOTES, 'UTF-8');?>">
					</div>
			</div>
			<div class="form-group">
    		<label class="col-sm-2 control-label">メールアドレス</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control" id="email" placeholder="Email"
          value="<?php echo htmlspecialchars($_SESSION['email'],ENT_QUOTES, 'UTF-8');?>">
    		</div>
  		</div>
  		<div class="form-group">
    		<label  class="col-sm-2 control-label">パスワード</label>
    			<div class="col-sm-8">
      			<input type="text"　name="password" class="form-control" id="password" placeholder="Password"
             value="<?php echo htmlspecialchars($_SESSION['password'],ENT_QUOTES, 'UTF-8');?>">
    			</div>
  		</div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
      		<div class="checkbox">
        		<label>
          		<input type="checkbox"> Remember me
        		</label>
      		</div>
    		</div>
  		</div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
					<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> |
            <button class="btn btn-default" value ="入力内容を確認する" type="submit" value="登録する" />登録する</button>
          </div>
    		</div>
  		</div>
		</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>