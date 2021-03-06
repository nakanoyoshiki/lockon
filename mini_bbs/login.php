<?php
require('dbconnect.php');
session_start();
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
  		<h1>ログイン </h1>
		</div>
    <div class="col-sm-offset-2">
      <?php if (count($errors) > 0): ?>
        <ul>
          <?php foreach ($errors as $error): ?>
            <li>
              <?php echo htmlentities($error , ENT_QUOTES,'UTF-8'); ?>
            </li>
          <?php  endforeach; ?>
        </ul>
      <?php endif ?>
      <p>&raquo;<a href="regist_form.php">まだ会員登録をしていない場合</a></p>
      <p>メールアドレスとパスワードを記入してログインしてください。</p>
    </div>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
    		<label  class="col-sm-2 control-label">Email</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
    		</div>
  		</div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">passsword</label>
        <div class="col-sm-8">
          <input type="text" name="password" class="form-control"  value="<?php echo htmlspecialchars($password); ?>">
        </div>
      </div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
      		<button type="submit" value="入力内容を確認する" class="btn btn-default">ログイン</button>
    		</div>
  		</div>
		</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>