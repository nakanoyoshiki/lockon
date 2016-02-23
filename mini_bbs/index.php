<?php
session_start();
require('dbconnect.php');
if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$stmt = $pdo -> prepare("SELECT name, id  FROM members WHERE id = ?;");
	$stmt->bindValue(1, $id);
	$stmt->execute();
	$member = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
	header('Location: login.php');
	exit();
}
$errors = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$message = null;
	if(!isset($_POST['message']) || !mb_strlen($_POST['message'])){
		$errors['message'] = 'messageを入力して下さい';
	}elseif (strlen($_POST['message']) > 140) {
		$errors['message'] = 'messageは140文字以内で入力してください';
	}else{
		$message = $_POST['message'];
	}
	if(count($errors) === 0){
		try{
		  $stmt = $pdo -> prepare("INSERT INTO posts(member_id,message) VALUES (:member_id, :message)");
			$stmt->bindValue(':member_id', $id, PDO::PARAM_INT);
	 		$stmt->bindValue(':message', $message, PDO::PARAM_STR);
	 		$stmt->execute();
		}catch(PDOException $e) {
			$errors['insert'] =  '申し訳ございませんが、投稿できませんでした';//.$e->getMessage();
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
	  	<h1>掲示板</h1>
			<?php if(!isset($_SESSION['id'])): ?>
				<div class="pull-right"><a href ="login.php">ログイン</a></div>
			<?php endif ?>
			<div class="pull-right"><button type="button" class="btn pull-right">
				<a href ="logout.php">ログアウト</a></button></div>
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
				<?php if(!empty($member['name'])): ?>
			<h3>
			<?php	echo htmlspecialchars($member['name'])?> さん、今どうしてる？
			<?php endif ?>
					<textarea type="text" rows="5" name="message" class="form-control" id="message" ></textarea>
				</div>
			</div>
	  	<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-8">
	      	<input type="submit" value="投稿" class="btn btn-primary">
	    	</div>
	  	</div>
		</form>
<?php
		$stsm=null;
		$stsm = $pdo->query('SELECT posts.member_id ,members.name ,posts.message, posts.created , posts.id
			FROM members,posts WHERE members.id = posts.member_id ORDER BY posts.created DESC');
		$stsm->execute();
		while($post  = $stsm -> fetch(PDO::FETCH_ASSOC)) : ?>
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<?php  print htmlspecialchars($post['name'], ENT_QUOTES,'UTF-8');?>
						<small class="pull-right"><?php  print htmlspecialchars($post['created'], ENT_QUOTES,'UTF-8');?></small>
					</h3>
				</div>
				<div class="panel-body">
					<?php if(($member['id']) == ($post['member_id'])): ?>
						<button type="button" class="btn btn-danger btn-xs pull-right">
							<a href="delete.php?id=<?php print htmlspecialchars($post['id']);?>" onclick="return confirm('削除していいですか？');">削除</a>
						</button>
						<button type="button" class="btn btn-warning btn-xs pull-right">
							<a href="update.php?id=<?php print htmlspecialchars($post['id']);?>">編集</a>
						</button>
					<?php endif ?>
					<?php print htmlspecialchars($post['message'], ENT_QUOTES,'UTF-8');?>
				</div>
			</div>
		</div>
    <?php endwhile; ?>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>