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
			{if (!isset({$smarty.session.id})) }
				<div class="pull-right"><a href ="login.php">ログイン</a></div>
			{/if}
			<div class="pull-right"><button type="button" class="btn pull-right">
				<a href ="logout.php">ログアウト</a></button></div>
			</div>
			<form class="form-horizontal" id="frmInput" action="index.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
						{if count($errors) > 0}
			      <ul>
							{foreach $errors as $error}
								{$error}
							{/foreach}
			      </ul>
			    	{/if}
						{if (!empty($member.name))}
							<h3>{$member.name}さん、今どうしてる？</h3>
						{/if}
						<textarea type="text" rows="5" name="message" class="form-control" id="message" ></textarea>
					</div>
				</div>
	  		<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-8">
	      		<input type="submit" value="投稿" class="btn btn-primary">
	    		</div>
	  		</div>
			</form>
			<div class="col-sm-offset-2 col-sm-8">
				{foreach item=post from=$posts}
			 	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							<p> {$post.name} </p>
							<small class="pull-right"><p> {$post.created} </p></small>
						</h3>
					</div>
					<div class="panel-body">
						{if $member.id == {$post.member_id} }
							<button type="button" class="btn btn-danger btn-xs pull-right">
									<a href="delete.php?id={$post.id}">削除</a>
							</button>
							<button type="button" class="btn btn-warning btn-xs pull-right">
								<a href="update.php?id={$post.id}">編集</a>
							</button>
						{/if}
						<p> {$post.message} </p>
					</div>
				</div>
				{/foreach}
				</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>