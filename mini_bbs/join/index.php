<?php
  session_start();

  if(!empty($_POST)){
    if($_POST['name'] ==''){
      $error['name'] ='blank';
    }
    if($_POST['email'] ==''){
      $error['email'] ='blank';
    }
//    if($_POST['password'] ==''){
//      $error['password'] ='blank';
//    }
    if(empty($error)){
      $_SESSION['join'] = $_POST;
      header('Location: check.php');
      exit();
    }
  }
 	if($_REQUEST['action'] == 'rewrite'){
		$_POST = $_SESSION['join'];
		$error =['rewrite'] == true;
	}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>会員登録</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">名前</label>
					<div class="col-sm-8">
						<input type="text" name="name" class="form-control" id="inputPassword3" placeholder="name"
             value="<?php echo htmlspecialchars($_POST['name'],ENT_QUOTES, 'UTF-8');?>">
            <?php if ($error['name'] == 'blank') : ?>
            <p> 名前を入力してください </p>
            <?php endif; ?>
					</div>
			</div>
			<div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label">メールアドレス</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email"
          value="<?php echo htmlspecialchars($_POST['email'],ENT_QUOTES, 'UTF-8');?>">
          <?php if ($error['email'] == 'blank') : ?>
          <p> メールアドレスを入力してください </p>
          <?php endif; ?>
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="inputPassword3" class="col-sm-2 control-label">パスワード</label>
    			<div class="col-sm-8">
      			<input type="text"　name="password" class="form-control" id="inputPassword3" placeholder="Password"
            value="<?php echo htmlspecialchars($_POST['password'],ENT_QUOTES, 'UTF-8');?>">
            <?php if ($error['password'] == 'blank') : ?>
            <p> メールアドレスを入力してください </p>
            <?php endif; ?>

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