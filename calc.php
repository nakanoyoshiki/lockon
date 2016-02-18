<?php
  //値を取得
$left =null;
$right=null;
$ope=null;
$answer=null;
$errors = array();
if($_SERVER['REQUEST_METHOD']== 'POST'){
  if(isset($_POST['leftbox'])){
    $left = $_POST['leftbox'];
  }
  if(isset($_POST['rightbox'])){
    $right = $_POST['rightbox'];
  }
  if(($_POST['selOpe']) == '+' || '-' || '×' || '÷'){
    $ope =$_POST['selOpe'];
  }

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

      case "÷":
        if($right == '0'){
          $errors['no_division']= 'このような割り算はできません';

        }else{
          $answer = $left / $right;
        }
        break;
      default:

        $errors['no_four_arithmetic'] = '四則演算してください';
        break;
    }
  }else{
    $errors['no_calculation'] ='このような計算はできません';
  }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>電卓</title>
    <style type="text/css"></style>
  </head>
  <body>

    <form name="form1" action="" method="post">
      <input type = "text" name = "leftbox" value="<?PHP print htmlspecialchars($left);?>">　
      <select name="selOpe" size=1>
        <option value = "＋" <?php if($ope =="+"){echo 'selected';} ?>>+</option>
        <option value = "－" <?php if($ope =="-"){echo 'selected';} ?>>－</option>
        <option value = "×" <?php if($ope =="×"){echo 'selected';} ?>>×</option>
        <option value = "÷" <?php if($ope =="÷"){echo 'selected';} ?>>÷</option>
      </select>　
      <input type = "text" name = "rightbox" value="<?PHP print htmlspecialchars($right);?>">
      <br>
      <input type = "submit" value = "計算">
      <input type = "reset" value = "クリア">
    </form>
    <?php
      if($_SERVER['REQUEST_METHOD']== 'POST'){
        if(count($errors)){
          print htmlspecialchars($left . " " . $ope . " " . $right."   = " . $answer);
        }
      }
    ?>
    <?php if (count($errors) > 0): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li>
            <?php echo htmlentities($error , ENT_QUOTES,'UTF-8'); ?>
          </li>
        <?php  endforeach; ?>
      </ul>
    <?php endif ?>
    <br>
  </body>
</html>