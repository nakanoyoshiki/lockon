<?php
session_start();
require('../dbconnect.php');
$errors = array();
if($_SERVER['REQUEST_METHOD']== 'POST'){
  $name = null;
  if(!isset($_POST['name']) || !strlen($_POST['name'])){
    $errors['name']= '名前を入力してください';
  }elseif (strlen($_POST['name']) > 15) {
    $errors['name'] = '名前は15文字以内で入力してください';
  }else {
    $name = $_POST['name'];
  }
  $email = null;
  if(!isset($_POST['email']) || !strlen($_POST['email'])){
    $errors['email'] = 'メールアドレスを入力してください';
  }else {
    $email = $_POST['email'];
  }
  $password = null;
  if(!isset($_POST['password']) || !strlen($_POST['password'])){
      $errors['password'] ='パスワードを入力してください';
    }elseif (strlen($_POST['password']) < 1) {
      $errors['password'] ='5文字以上入力してください';
    } else {
    $password = $_POST['password'];
  }
	if(count($errors) ===0){
    $sql = sprintf('INSERT INTO members SET name="%s" , email="%s", password="%s" ',
      mysql_real_escape_string($name),
      mysql_real_escape_string($email),
      mysql_real_escape_string($password)
    );
	}
	mysql_query($sql);
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
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div> -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Link</a></li>
      </ul>
      <ul class="nav navbar-nav ">
        <li><a href="#">Link</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		<div class="page-header">
  		<h1>会員登録 <small>Subtext for header</small></h1>
		</div>
		<input type="hidden" name="action" value="submit" />
		<form class="form-horizontal" id="frmInput" action="thanks.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="=submit" />
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">名前</label>
					<div class="col-sm-8">
						<input type="text" name="name" class="form-control" id="name" placeholder="name">
					</div>
			</div>
			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">メールアドレス</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control" id="email" placeholder="Email">
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="inputPassword3" class="col-sm-2 control-label">パスワード</label>
    			<div class="col-sm-8">
      			<input type="text"　name="password" class="form-control" id="password" placeholder="Password">
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