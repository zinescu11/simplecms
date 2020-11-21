<?php
	$folder = cms::get($queryId);
	$value = $folder->$queryField;
?>
<!doctype html>
<html>
<head>
	<title>Cms</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/theme.css.php">
</head>
<body>
	<main class="container py40" onkeydown="if (event.code == 'Escape') { history.back(); return false; }">

		<form method="post" enctype="multipart/form-data" style="width:100%" action="saveField">
		
			<input type="hidden" name="id" value="<?=$queryId?>"/>
			
			<input type="hidden" name="field" value="<?=$queryField?>"/>
			
			<input class="input rds7 px15" name="content" style="width:100%" value="<?=htmlspecialchars($value)?>" autofocus>
			
			<p></p>
			
			<footer class="row">
			
				<button class="btn btn-dark px15"> Сохранить </button>
				
				&nbsp;
				
				<button class="btn btn-dark px15" type="button" onclick="javascript:history.back()"> Отмена </button>
			
			</footer>		
		</form>
		
	</main>
</body>
</html>