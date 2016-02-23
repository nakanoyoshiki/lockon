<?php
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
  }elseif ($stmt !== false) {
  	while($item = $stmt->fetch(PDO::FETCH_ASSOC)){
			if($item['email'] == $_POST['email']){
				$errors['email'] = 'このメールアドレスはすでに使われてます';
			}
		}
  }else{
    $email = $_POST['email'];
  }
  $password = null;
	if(!isset($_POST['password'])	){
		$errors['password'] ='パスワードを入力してください';
  }elseif (mb_strlen($_POST['password']) < 5) {
		$errors['password'] = '5文字以上入力してください';
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
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>会員登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
		<div class="page-header">
  		<h1>会員登録</h1>
		</div>
    <?php if(count($errors) > 0): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li>
            <?php echo htmlentities($error , ENT_QUOTES,'UTF-8'); ?>
          </li>
        <?php  endforeach; ?>
      </ul>
    <?php endif ?>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">名前</label>
					<div class="col-sm-8">
						<input type="text" name="name" class="form-control"  placeholder="name"
             value="<?php echo htmlspecialchars($name,ENT_QUOTES, 'UTF-8');?>">
					</div>
			</div>
			<div class="form-group">
    		<label class="col-sm-2 control-label">メールアドレス</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control"  placeholder="Email"
          value="<?php echo htmlspecialchars($email,ENT_QUOTES, 'UTF-8');?>">
    		</div>
  		</div>
  		 <div class="form-group">
    		<label class="col-sm-2 control-label">パスワード</label>
    			<div class="col-sm-8">
      			<input type="password" name="password" class="form-control"  placeholder="Password"
            value="<?php echo htmlspecialchars($password,ENT_QUOTES, 'UTF-8');?>">
    			</div>
  		</div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
      		<button type="submit" value="入力内容を確認する" class="btn btn-default">確認</button>
    		</div>
  		</div>
		</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>