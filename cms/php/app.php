<?php
	class App
	{
		static function run()
		{
			app::handleActionRoutes();
			app::handleViewRoutes();
		}
		
		static function handleViewRoutes()
		{
			$view = $_GET["view"] ?: "navigator";
			
			route::handle($view, "edit-(\d+)-(\w+)", function($queryId, $queryField) {
				include(__DIR__."/../views/@editor.php");
			});
			
			route::handle($view, "(\d+)|()", function($queryId) {
				include(__DIR__."/../views/@navigator.php");
			});
		}
		
		static function handleActionRoutes()
		{
			if ($_GET["action"] == "appendFolder") return AppController::doAppendFolder();
			if ($_GET["action"] == "appendField") return AppController::doAppendField();
			if ($_GET["action"] == "removeFolder") return AppController::doRemoveFolder();
			if ($_GET["action"] == "removeField") return AppController::doRemoveField();
			if ($_GET["action"] == "saveField") return AppController::doSaveField();
			if ($_GET["action"] == "renameFolder") return AppController::doRenameFolder();
			if ($_GET["action"] == "renameField") return AppController::doRenameField();
		}
	}