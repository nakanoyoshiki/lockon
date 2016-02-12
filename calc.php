<?php
  //値を取得

  if(isset($_POST['leftbox'])){
    $left = $_POST['leftbox'];
  }
  if(isset($_POST['rightbox'])){
    $right = $_POST['rightbox'];
  }
  if(($_POST['selOpe']) == '+' || '-' || '×' || '÷'){
    $ope =($_POST['selOpe']);
  }
  $error_conut =0;
  //セレクトボックスによって処理を変える
  if((is_numeric($left)) && (is_numeric($right))){
    switch ($ope) {
      case "＋":
        $answer = $left + $right;
        break;

      case "－":
        $answer = $left - $right;
        break;

      case "×":
        $answer = $left * $right;
        break;

      case "÷": if($right == '0'){
        print 'このような計算はできません';
        $error_conut = 1;
      }else{
        $answer = $left / $right;
      }break;
    default:
      $error_conut = 1;
      print '四則演算をしてください';
      break;
    }
  }else{
    $error_conut = 1;
    print 'このような計算はできません';
  }

?>
<html>
  <head>
    <meta charset="utf-8">
    <title>電卓</title>
    <style type="text/css">
    .p{
      font-size: 18px;
    }
    </style>
  </head>
  <body>
    <form name="form1" action="" method="post">
      <input type = "text" name = "leftbox">　
      <select name="selOpe" size=1>
        <option value = "＋">＋</option>
        <option value = "－">－</option>
        <option value = "×">×</option>
        <option value = "÷">÷</option>
      </select>　

      <input type = "text" name = "rightbox">
      <br>

      <input type = "submit" value = "計算">
      <input type = "reset" value = "クリア">
    </form>
    <?php
      if($error_conut == 0){
        print htmlspecialchars($left." ".$ope." ".$right."   =".$answer);
      }
    ?>
    <br>
    <a href="#" onclick="history.back(); return false;">前の画面へ戻る</a>
  </body>
</html>