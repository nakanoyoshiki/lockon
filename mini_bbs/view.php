<?php
session_start();
require('dbconnect.php');
$recortlist = mysqli_query("SELECT * FROM 'posts' ORDER BY 'id' DESC");
$result = mysql_query($recortlist , $db_selected);
// $data = mysqli_fetch_assoc($recortlist);
// echo $data['message'];
?>
<!DOCTYPE html>
<html lang="en">
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
    <h1>Hello, world!</h1>
    <?php $sql = "SELECT * FROM 'posts' ORDER BY 'created' DESC";
    $result = mysql_query($sql, $db_selected);
    ?>
    <?php if($result !== false && mysql_num_rows($result)) :?>
      <ul>
        <?php while($post = mysql_fetch_assoc($result)): ?>
          <li>
            <?php echo htmlspecialchars($post['name'], ENT_QUOTES,'UTF-8');?>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif;?>

  <!-- <?php if ($result !== false && mysql_num_rows($result)): ?>
    <ul>
      <?php while($post = mysqli_fetch_assoc($rresult)): ?>
        <li>
          <?php echo htmlspecialchars($post['name'], ENT_QUOTES,'UTF-8'); ?>
        </li>
      <?php endwhile;?>
    </ul>
  <?php endif?> -->


<?php

    print htmlspecialchars($_POST["name"]);


    print htmlspecialchars($_POST["message"]);
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>