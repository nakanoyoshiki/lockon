<?php
  //値を取得

  if(isset($_POST['txtA'])){
    $a = ($_POST['txtA']);
  }
  if(isset($_POST['txtB'])){
    $b = ($_POST['txtB']);
  }
  if(($_POST['selOpe']) == '+' || '-' || '×' || '÷'){
    $ope =($_POST['selOpe']);
  }
  $error_conut =0;
  //セレクトボックスによって処理を変える
  if((is_numeric($a)) && (is_numeric($b))){
    switch ($ope) {
      case "＋": $answer = $a + $b; break;
      case "－": $answer = $a - $b; break;
      case "×":  $answer = $a * $b; break;
      case "÷": if($b == '0'){
        print 'このような計算はできません';
        $error_conut = 1;
      }else{
        $answer = $a / $b;
      }break;
    default:
      $error_conut =1;
      print '四則演算をしてください';
      break;
    }
  }else{
    $error_conut =1;
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
      <input type = "text" name = "txtA">　
      <select name="selOpe" size=1>
        <option value = "＋">＋</option>
        <option value = "－">－</option>
        <option value = "×">×</option>
        <option value = "÷">÷</option>
      </select>　

      <input type = "text" name = "txtB">
      <br>

      <input type = "submit" value = "計算">
      <input type = "reset" value = "クリア">
    </form>
    <?php
      if($error_conut == 0){
        print htmlspecialchars($a." ".$ope." ".$b."   =".$answer."\n");
      }
    ?>

    <br>
    <a href="#" onclick="history.back(); return false;">前の画面へ戻る</a>
  </body>
</html>