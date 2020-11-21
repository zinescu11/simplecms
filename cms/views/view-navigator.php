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
	<main class="container py40">
	
		<? if ($queryId): ?>
			<a class="item" href='./<?=$qrFolder->up?>'> <b>&#128194; ..</b> </a>
		<? endif ?>
		
		<? foreach ($qrItems as $v): ?>
		
			<a class="item" href="./<?=$v->id?>">
			
				<b class="fluid" style="min-width:40%"> &#128194; <?=$v->name ?: $v->id?> </b>
				
				&nbsp;
				
				<? if ($v->title): ?>
					<div class="fluid op5 fcrop fnw"><?=$v->title?></div>
				<? endif ?>
				
				&nbsp;
				
				<div class="row alcn">
					<span class="btn btn-sm btn-dark" onclick="location = 'rename-<?=$v->id?>-name'; return false;"> &#9998; </span>
				</div>
				
				&nbsp;
				
				<form method="post" action="./removeFolder">
					<input type="hidden" name="id" value="<?=$queryId?>"/>
					<input type="hidden" name="removeId" value="<?=$v->id?>"/>
					<button class="btn btn-sm btn-dark" tabindex=-1> X </button>
				</form>
			</a>
			
		<? endforeach ?>
	
		<? if ($qrFolder) foreach ($qrFolder as $field => $value): ?>
		
			<? if ($field != "id" && $field != "up" && $field != "index" && $field != "name"): ?>
			
				<a class="item" href="edit-<?=$qrFolder->id?>-<?=$field?>">
				
					<span style="min-width:40%"> &#128196;&nbsp; <?=$field?> </span>
					
					<span class="fluid op5 fcrop fnw"><?=htmlspecialchars($value)?></span>
					
					<? if (cms::valueIsImageUrl($value)): ?>
						<img src="<?=$value?>" class="rds7" style="height:25px; align-self:center;"/>
					<? endif ?>
					
					&emsp;
					
					<!--span class="rename" onclick="location = '?id=<?=$parent->id?>&renfield=<?=$field?>'; return false;">ren.</span-->
					
					&emsp;
					<form method="post" action="./removeField">
						<input type="hidden" name="id" value="<?=$queryId?>"/>
						<input type="hidden" name="field" value="<?=$field?>"/>
						<button class="btn btn-sm btn-dark" tabindex=-1> <!--&#10006;--> X </button>
					</form>
					
				</a>
				
			<? endif ?>
			
		<? endforeach ?>
		
		<br><hr>
		
		<footer class="row jucn">
		
			<form method="post" action="./appendFolder">
				<input type="hidden" name="id" value="<?=$queryId?>"/>
				<button class="btn btn-sm btn-dark px15"> Добавить раздел </button>
			</form>
			
			&emsp;
			
			<form method="post" action="./appendField">
				<input type="hidden" name="id" value="<?=$queryId?>"/>
				<button class="btn btn-sm btn-dark px15"> Добавить поле </button>
			</form>
			
		</footer>
		
		<footer class="fcn">
			<a class="underline" href=".."> Сайт </a>
			
			<form class="blki" method="post" action="./authExit">
				<input type="hidden" name="id" value="<?=$queryId?>"/>
				<button class="underline"> Выход </button>
			</form>
		</footer>
		
	</main>
</body>
</html>