<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$title}</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
		<div class="page-header">
  		<h1>{$title}</h1>
		</div>
    <div class="col-sm-offset-2">
      {if count($errors) > 0}
        <ul>
  				{foreach $errors as $error}
  					<p>{$error}</p>
  				{/foreach}
        </ul>
      {/if}
      <p>&raquo;<a href="regist_form.php">まだ会員登録をしていない場合</a></p>
      <p>メールアドレスとパスワードを記入してログインしてください。</p>
    </div>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
    		<label  class="col-sm-2 control-label">Email</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control" value="{$email}">
    		</div>
  		</div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">passsword</label>
        <div class="col-sm-8">
          <input type="text" name="password" class="form-control"  value="{$password}">
        </div>
      </div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
      		<button type="submit" value="入力内容を確認する" class="btn btn-default">ログイン</button>
    		</div>
  		</div>
		</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>