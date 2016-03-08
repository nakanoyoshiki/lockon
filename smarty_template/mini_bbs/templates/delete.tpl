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
		<form class="form-horizontal" id="frmInput" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-2">
					{if count($errors) > 0}
			      <ul>
							{foreach $errors as $error}
								<p>{$error}</p>
							{/foreach}
			      </ul>
			    {/if}
					{$message.message}
				</div>
			</div>
	  	<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-8">
	      	<input type="submit" value="削除" class="btn btn-primary">
	    	</div>
	  	</div>
		</form>
		<br>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>