<?php
	$qrFolder = cms::get($queryId);
	$qrItems = cms::scan($queryId);
?>
<!doctype html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/theme.css.php">
</head>
<body>
	<main class="container py40 row alcn jucn">
	
	
		<form class="fcn" method="post" action="authEnter">
		
			<? if (ErrorMessage::exist()): ?>
				<p class="fcn fw7 fls">
					<?=ErrorMessage::clear()?>
				</p>
			<? endif ?>
			
			<div class="pb15">
				<input class="input rds7 px15" name="email" value="admin"/>
			</div>
			<div class="pb15">
				<input class="input rds7 px15" name="password" type="password" value="123"/>
			</div>
			<button class="btn btn-dark px25 lh35"> Вход </button>
		</form>
		
	</main>
</body>
</html>