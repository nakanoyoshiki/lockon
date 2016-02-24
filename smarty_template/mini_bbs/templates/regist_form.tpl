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
    {if count($errors) > 0}
      <ul>
				{foreach $errors as $error}
					<p>{$error}</p>
				{/foreach}
      </ul>
    {/if}
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">名前</label>
					<div class="col-sm-8">
						<input type="text" name="name" class="form-control"  placeholder="name" value="{$name}" >
					</div>
			</div>
			<div class="form-group">
    		<label class="col-sm-2 control-label">メールアドレス</label>
    		<div class="col-sm-8">
      		<input type="email" name="email" class="form-control"  placeholder="Email" value="{$email}">
    		</div>
  		</div>
  		 <div class="form-group">
    		<label class="col-sm-2 control-label">パスワード</label>
    			<div class="col-sm-8">
      			<input type="password" name="password" class="form-control"  placeholder="Password" value="{$password}">
    			</div>
  		</div>
  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-8">
      		<button type="submit" value="入力内容を確認する" class="btn btn-default">確認</button>
    		</div>
  		</div>
		</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>