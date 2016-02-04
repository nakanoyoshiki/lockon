<?php
  session_start();
  require('dbconnect.php');

  if(!empty($_POST)){
    if($_POST['message'] != ''){
      $sql = sprintf('INSERT INTO posts SET message="%s"',
        mysqli_real_escape_string($db, $_POST['message'])
      );
      mysqli_query($db, $sql) or die(mysqli_error($db));
      header('Location: index.php');
      exit();
    }
  }
//  $sql = sprintf('SELECT p.* FROM posts p');
//  $posts = mysql_query($db, $sql) or die(mysql_error($db));
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
	  		<h1>掲示板 <small>Subtext for header</small></h1>
			</div>
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="form-group">

						<div class="col-sm-8 col-sm-offset-2">
							<textarea type="text" rows="5" name="message" class="form-control " id="inputPassword3" placeholder="メッセージをどうぞ"></textarea>
						</div>
				</div>
	  		<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-8">
	      		<input type="submit" value="投稿" class="btn btn-primary">
	    		</div>
	  		</div>
			</form>


			<div class="col-sm-offset-2 col-sm-8">
				<div class="panel panel-primary">
  				<div class="panel-heading">
    				<h3 class="panel-title">Panel title</h3>
  				</div>
  				<div class="panel-body">
 <!--		<p><?php echo htmlspecialchars($posts['message'], ENT_QUOTES, 'UTF-8'); ?></p> -->
  				</div>
				</div>
			</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>