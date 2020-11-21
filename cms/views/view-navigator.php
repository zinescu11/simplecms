<?php
	$qrFolder = cms::get($queryId);
	$qrItems = cms::scan($queryId);
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
	<header class="back-dark1 h55">
	
		<article class="container py10 row alcn">
		
			<div class="row">
			
				<form method="post" action="./appendFolder">
					<input type="hidden" name="id" value="<?=$queryId?>"/>
					<button class="btn btn-sm btn-dark px10"> + Добавить раздел </button>
				</form>
				
				&emsp;
				
				<form method="post" action="./appendField">
					<input type="hidden" name="id" value="<?=$queryId?>"/>
					<button class="btn btn-sm btn-dark px10"> + Добавить поле </button>
				</form>
				
			</div>
			
			<i class="fluid"></i>
				
			<div class="row alcn">
			
				<a class="btn btn-sm btn-dark underline" href=".."> Сайт </a>
				
				&emsp;
				
				<form method="post" action="./authExit">
					<button class="btn btn-sm btn-dark"> Выход </button>
				</form>
				
			</div>
			
		</article>
		
	</header>
	
	<main class="container py20">
	
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
		
	</main>
</body>
</html>