<?php
session_start();
require('dbconnect.php');
if(isset($_SESSION['id'])){
	$id = $_REQUEST['id'];
	$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
	$stmt->execute(array($id));
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$errors = array();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$message = null;
		if(!isset($_POST['message']) || !strlen($_POST['message'])){
			$errors['message'] = 'messageを入力して下さい';
		}elseif (strlen($_POST['message']) > 140) {
			$errors['message'] = 'messageは140文字以内で入力してください';
		}else{
			$message = $_POST['message'];
		}
		if(count($errors) === 0){
    	$stmt = $pdo -> prepare("UPDATE posts SET message =? WHERE id = ?");
    	$result = $stmt->execute(array($message, $id));
			header('Location: index.php');
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
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
		<div class="page-header">
	  	<h1>掲示板 <small>Subtext for header</small></h1>
		</div>
		<form class="form-horizontal" id="frmInput" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-2">
					<?php if (count($errors) > 0): ?>
						<ul>
							<?php foreach ($errors as $error): ?>
								<li>
									<?php echo htmlentities($error , ENT_QUOTES,'UTF-8'); ?>
								</li>
							<?php  endforeach; ?>
						</ul>
					<?php endif ?>
          <small><?php  print htmlspecialchars($result['id'], ENT_QUOTES,'UTF-8');?></small>
					<input type="text" rows="5" name="message" class="form-control" id="message" value="<?php printf(htmlspecialchars($result['message'], ENT_QUOTES));?>">
				</div>
			</div>
	  	<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-8">
	      	<input type="submit" value="変更" class="btn btn-primary">
	    	</div>
	  	</div>
		</form>
		<br>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>