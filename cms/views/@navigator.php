<?
	$qrFolder = cms::get($queryId);
	$qrItems = cms::scan($queryId);
?>
<!doctype html>
<html>
<head>
	<title>SimpleCMS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/theme.css.php">
</head>
<body>
	<main class="container py40">
	
		<a class="item" href='./<?=$qrFolder->up?>'> <b>&#128194; ..</b> </a>
		
		<? foreach ($qrItems as $v): ?>
		
			<a class="item" href="./<?=$v->id?>">
			
				<b class="fluid"> &#128194; <?=$v->name ?: $v->id?> </b>
				
				&nbsp;
				
				<div class="row alcn">
					<span class="btn btn-dark" onclick="location = '?id=<?=$v->id?>&rename=1'; return false;"> &#9998; </span>
				</div>
				
				&nbsp;
				
				<form method="post" action="?action=removeFolder">
					<input type="hidden" name="id" value="<?=$queryId?>"/>
					<input type="hidden" name="removeId" value="<?=$v->id?>"/>
					<button class="btn btn-dark"> X </button>
				</form>
			</a>
			
		<? endforeach ?>
	
		<? if ($qrFolder) foreach ($qrFolder as $field => $value): ?>
		
			<? if ($field != "id" && $field != "up" && $field != "index" && $field != "name"): ?>
			
				<a class="item" href="edit-<?=$qrFolder->id?>-<?=$field?>">
				
					<span style="min-width:40%"> &#128196;&nbsp; <?=$field?> </span>
					
					<small class="fluid" style="opacity:0.5"><?=$value?></small>
					
					<? if (cms::valueIsImageUrl($value)): ?>
						<span> <img src="<?=$value?>" style="display:inline-block; margin:0 10px; height:1em"/> </span>
					<? endif ?>
					
					&emsp;
					
					<!--span class="rename" onclick="location = '?id=<?=$parent->id?>&renfield=<?=$field?>'; return false;">ren.</span-->
					
					&emsp;
					<form method="post" action="?action=removeField">
						<input type="hidden" name="id" value="<?=$queryId?>"/>
						<input type="hidden" name="field" value="<?=$field?>"/>
						<button class="btn btn-dark"> <!--&#10006;--> X </button>
					</form>
					
				</a>
				
			<? endif ?>
			
		<? endforeach ?>
		
		<footer class="row">
		
			<form method="post" action="?action=appendFolder">
				<input type="hidden" name="id" value="<?=$queryId?>"/>
				<button class="btn btn-dark"> Добавить раздел </button>
			</form>
			
			&emsp;
			
			<form method="post" action="?action=appendField">
				<input type="hidden" name="id" value="<?=$queryId?>"/>
				<button class="btn btn-dark"> Добавить поле </button>
			</form>
			
		</footer>
		
	</main>
</body>
</html>