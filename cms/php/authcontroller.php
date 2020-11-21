<?php
	class AuthController
	{
		static function doAuthEnter()
		{
			Auth::enter($_POST["email"], $_POST["password"]);
			if (!Auth::isLogged()) {
				ErrorMessage::set("Неправильный пароль");
				header("Location: enter");
			} else
				header("Location: .");
		}
		static function doAuthExit()
		{
			Auth::exit();
			header("Location: .");
		}
	}