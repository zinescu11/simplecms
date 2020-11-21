<?php
	require_once(__DIR__."/cms/php/cms.php");
	
	$view = $_GET["view"];
	
	route::handle($view, "(.+)", function($articleUrl) {
		$v = cms::findOne(["url" => $articleUrl]);
		include("page-article.tpl.php");
	});
	
	route::handle($view, "()", function() {
		include("page-index.tpl.php");
	});
	