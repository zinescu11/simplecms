<?php
	class App
	{
		static function run()
		{
			session_start();
			app::handleActionRoutes();
			app::handleViewRoutes();
		}
		
		static function handleActionRoutes()
		{
			$view = $_GET["view"];
			if ($view == "appendFolder") { AppController::doAppendFolder(); exit(0); }
			if ($view == "appendField") { AppController::doAppendField(); exit(0); }
			if ($view == "removeFolder") { AppController::doRemoveFolder(); exit(0); }
			if ($view == "removeField") { AppController::doRemoveField(); exit(0); }
			if ($view == "saveField") { AppController::doSaveField(); exit(0); }
			if ($view == "renameFolder") { AppController::doRenameFolder(); exit(0); }
			if ($view == "renameField") { AppController::doRenameField(); exit(0); }
			if ($view == "authEnter") { AuthController::doAuthEnter(); exit(0); }
			if ($view == "authExit") { AuthController::doAuthExit(); exit(0); }
		}
		
		static function handleViewRoutes()
		{
			$view = $_GET["view"];
			
			if (!Auth::isLogged())
				return include(__DIR__."/../views/view-enter.php");
				
			route::handle($view, "edit-(\d+)-(.+)", function($queryId, $queryField) {
				include(__DIR__."/../views/view-editor.php");
			});
			
			route::handle($view, "rename-(\d+)-(.+)", function($queryId, $queryField) {
				include(__DIR__."/../views/view-renamer.php");
			});
			
			route::handle($view, "(\d+)|()", function($queryId) {
				include(__DIR__."/../views/view-navigator.php");
			});
		}
	}