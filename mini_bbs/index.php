<?php
session_start();
require('dbconnect.php');

$errors = array();
if($_SERVER['REQUEST_METHOD']== 'POST'){
	$name = null;
	if(!isset($_POST['name']) || !strlen($_POST['name'])){
		$errors['name']= '名前を入力して下さい';
	}elseif (strlen($_POST['name']) > 15) {
		$errors['name'] = '名前は15文字以内で入力してください';
	}else {
		$name = $_POST['name'];
	}
	$message = null;
	if(!isset($_POST['message']) || !strlen($_POST['message'])){
		$errors['message']= 'messageを入力して下さい';
	}elseif (strlen($_POST['message']) > 140) {
		$errors['message'] = 'messageは140文字以内で入力してください';
	}else{
		$message = $_POST['message'];
	}
	if(count($errors) ===0){
		$stmt = $pdo -> prepare("INSERT INTO posts(name,message) VALUES (:name, :message)");
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindValue(':message', $message, PDO::PARAM_INT);
		$stmt->execute();
	}
}

//ログインしてるユーザーかの確認
// $logid = $_SESSION['id'];
// if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
// $_SESSION['time'] = time();
// $stmt = $pdo -> prepare('SELECT * FROM members WHERE id= :logid;');
// $stmt -> bindParam(':logid', $logid, PDO::PARAM_STR);
// $stmt -> execute();
// $member = $stmt -> fetch(PDO::FETCH_ASSOC);
// }else{
// header('Location: login.php');
// exit;
// }
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
		<form class="form-horizontal" id="frmInput" action="index.php" method="post" enctype="multipart/form-data">
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
          <input type="text" row="5" name="name" class="form-control" id="name">
          <br>
					<textarea type="text" rows="5" name="message" class="form-control" id="message" placeholder="メッセージをどうぞ"></textarea>
				</div>
			</div>
	  	<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-8">
	      	<input type="submit" value="投稿" class="btn btn-primary">
	    	</div>
	  	</div>
		</form>

		<br>
<?php
		$stsm=null;
    $stsm = $pdo->query('SELECT * FROM posts ORDER BY id DESC');

		 while($post  = $stsm -> fetch(PDO::FETCH_ASSOC)) : ?>
		<div class="col-sm-offset-2 col-sm-8">
			<small><?php  print htmlspecialchars($post['id'], ENT_QUOTES,'UTF-8');?></small>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">

						<?php  print htmlspecialchars($post['name'], ENT_QUOTES,'UTF-8');
					?>
						<small class="pull-right"><?php  print htmlspecialchars($post['created'], ENT_QUOTES,'UTF-8');?></small>




							</h3>
					</div>
					<div class="panel-body">
						<button type="button" class="btn btn-danger btn-xs pull-right">
							<a href="delete.php?id=<?php print htmlspecialchars($post['id']);?>" onclick="return confirm('削除していいですか？');">削除</a></button>
						<button type="button" class="btn btn-warning btn-xs pull-right">
							<a href="update.php?id=<?php print htmlspecialchars($post['id']);?>">編集</a></button>

						<?php print htmlspecialchars($post['message'], ENT_QUOTES,'UTF-8');?>
					</div>
				</div>
			</div>
        <?php endwhile; ?>


	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>