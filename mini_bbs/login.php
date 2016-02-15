<?php
require('dbconnect.php');
session_start();
$errors = array();
$stmt = $pdo -> query("SELECT * FROM members");
 // while($item = $stmt->fetch()){
 //
 //     echo $item['name'];
 //   }


$count_login =0;
//if($_SERVER['REQUEST_METHOD']== 'POST'){
  if(count($errors) ==0){
    if(!empty($_POST["email"]) || !empty($_POST["name"])){
      // $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
      // $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
      // $stmt -> execute();
      //echo '最初';
      if($stmt !== false){
        //echo ':::::::::::::::::';
        while($item = $stmt->fetch()){
          //echo '確認してる';

          if($item['email'] == $_POST['email']){
          //  echo $item['email'];
            if($item['email'] == $_POST['email']){
          //    echo 'ソロッターーーー';
              $count_login = $count_login +1;
            }
          }
        }
        if($count_login==1){
      //    echo 'ログインできる';
      //    echo $_POST['email'];
          header( 'Location: index.php');

        }else{
          print $item['email'];
        }
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
  		<h1>ログイン <small>Subtext for header</small></h1>
		</div>
    <div class="col-sm-offset-2">
      <p>&raquo;<a href="join/">まだ会員登録をしていない場合</a></p>
      <p>メールアドレスとパスワードを記入してログインしてください。</p>
    </div>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
    		</div>
  		</div>
      <!-- <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-8">
            <input type="password"　name="password" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo htmlspecialchars($_POST['password']); ?>">
          </div>
      </div> -->
  		<div class="form-group">
    		<label for="inputName3" class="col-sm-2 control-label">名前</label>
    			<div class="col-sm-8">
      			<input type="text"　email="email" class="form-control" id="inputName3" placeholder="Name" value="<?php echo htmlspecialchars($_POST['email']); ?>">
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