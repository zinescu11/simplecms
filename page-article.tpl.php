<!DOCTYPE html>
<html class="page" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no, viewport-fit=cover">
	<meta name="keywords" content="">
	<meta name="description" content="Temporal Games">
	<meta name="title" content="Temporal Games — C++ Core Engineer">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="assets/images/favicon/site.webmanifest">
	<link rel="mask-icon" href="assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="assets/images/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="assets/images/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<title><?=$v->title?> - Temporal Games</title>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="wrapper">
		<header class="inner_header" id="header">
			<div class="content">
				<a href="javascript:history.back()"><span class="arrow">&larr;</span> Go back</a>
			</div>
		</header>
		
		<div class="content">
		
			<div class="text_right">
				<img src="assets/images/logo_main_1.svg" alt="Temporal Games">
			</div>
			
			<div class="text_left">
			
				<h1> <?=$v->title?> </h1>
				
				<p class="date"> <?=$v->tags?> </p>
				
				<?=$v->page?>
				
			</div>
		</div>
	</div>
	<script src="assets/js/main.js"></script>
</body>
</html>