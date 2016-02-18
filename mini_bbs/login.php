<?php
require('dbconnect.php');
session_start();
$_POST['save'] =null;
$email = $password ="";
$email = $_POST['email'];
$password = $_POST['password'];
$errors = array();
$stmt = $pdo -> prepare("SELECT * FROM members WHERE email = ? AND password = ?;");
$stmt->bindValue(1, $email);
$stmt->bindValue(2, $password);
$stmt->execute();
if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['time'] = time();
      header('Location: index.php ');// ログイン成功
      if($_POST['save'] =='on'){
        setcookie('email', $_POST['email']. time()+60*60*24*14);
        setcookie('password', $_POST['password']. time()+60*60*24*14);
      }
  }else{
    $error['login'] = 'failed';
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
  		<h1>ログイン <small>Subtext for header</small></h1>
		</div>
    <div class="col-sm-offset-2">
      <p>&raquo;<a href="join/">まだ会員登録をしていない場合</a></p>
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
      		<div class="checkbox">
        		<label>
          		<input type="checkbox" name="save"> Remember me
        		</label>
      		</div>
    		</div>
  		</div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
      		<button type="submit" value="入力内容を確認する" class="btn btn-default">Sign in</button>
    		</div>
  		</div>
		</form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>