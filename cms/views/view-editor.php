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
			
			<input class="input rds7 px15" name="name" value="<?=$queryField?>" style="width:100%"/>
			
			<p></p>
			
			<textarea class="input rds7 px15 lh25 py10" id="content" name="content" autofocus rows=20 style="width:100%"><?=htmlspecialchars($value)?></textarea>
			
			<p></p>
			
			<footer class="row">
			
				<button class="btn btn-dark px15"> Сохранить </button>
				
				&nbsp;
				
				<button class="btn btn-dark px15" type="button" onclick="javascript:history.back()"> Отмена </button>
			
				<i class="fluid"></i>
				
				<button class="btn btn-dark px15" onclick="this.nextElementSibling.click(); return false;"> Загрузить Изображение </button>
				<input hidden type="file" name="files" onchange="previewUploadingImage()"/>
				
			</footer>		
		</form>
		
		<? if (cms::valueIsImageUrl($value)): ?>
			<img src="<?=$value?>" style="display:inline-block; max-width:100%; margin:30px 0;"/>
		<? else: ?>
			<img src="" style="display:inline-block; max-width:100%; margin:30px 0;"/>
		<? endif ?>
	
	</main>
	
	<script>
		function previewUploadingImage()
		{
			var input = document.querySelector("input[type=file]");
			var img = document.querySelector("img");
			var content = document.querySelector('#content');
			content.value = "";
			
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(ev) {
					img.src = ev.target.result;
				}
				reader.readAsDataURL(input.files[0]);
			}
  		}
	</script>
</body>
</html>