<?php
session_start();
$link = mysql_connect('localhost', 'root', 'root');
if(!$link){
	die('データベースに接続できません');
}
$db =mysql_select_db('mini_bbs' ,$link);

//require('dbconnect.php');
// $id = $_REQUEST['id'];
// $sql = mysql_query("SELECT * FROM posts WHERE id=%d",
//   mysql_real_escape_string($db,$id)
// );
// $post = mysql_fetch_assoc($sql);

$id = $_REQUEST['id'];
echo $id;
//$id = mysqli_real_escape_string($link, $id);
$result = sprintf("SELECT * FROM posts WHERE id='%d'",
  mysql_real_escape_string($id)
);
//  $result = mysql_query('SELECT * FROM posts WHERE id=231'
// );
 $post = mysql_fetch_assoc($result);


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
		$sql = sprintf("INSERT INTO posts SET name='%s' , message='%s'",
			mysql_real_escape_string($name),
		  mysql_real_escape_string($message)
		);
	}
	mysql_query($sql, $link);

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
          <small><?php  print htmlspecialchars($post['id'], ENT_QUOTES,'UTF-8');?></small>
          <input type="text" row="5" name="name" class="form-control" id="name" value="<?php printf(htmlspecialchars($post['name'], ENT_QUOTES));?>">
          <br>
					<input type="text" rows="5" name="message" class="form-control" id="message" value="<?php printf(htmlspecialchars($post['message'], ENT_QUOTES));?>">
				</div>
			</div>
	  	<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-8">
	      	<input type="submit" value="変更" class="btn btn-primary">
          <input type="hidden" name='id' value="<?php printf(htmlspecialchars['id'], ENT_QUOTES);?>"/>
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