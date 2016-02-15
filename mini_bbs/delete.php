<?php
session_start();
require('dbconnect.php');

$id = $_REQUEST['id'];
echo $id;

$sql = 'DELETE FROM posts where id = :delete_id';
$stmt = $pdo -> prepare($sql);
$stmt -> bindValue(':delete_id', $value, PDO::PARAM_INT);
$stmt -> execute();

//$id = mysqli_real_escape_string($link, $id);
 $result = mysql_query('DELETE FROM posts WHERE id=238');
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
      <p> 削除しました</p>
      <p><a href ="index.php">一覧に戻る</a></p>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>