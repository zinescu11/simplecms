<?php
	class Auth
	{
		static function isLogged()
		{
			return $_SESSION["user"];
		}
		
		static function enter($userName, $password)
		{
			$user = cms::item("_users/$userName");
			if ($user) {
				if ($user->passwordMd5 != md5($password)) {
				}
				else {
					$_SESSION["user"] = $user;
				}
			}
		}
		
		static function exit()
		{
			unset($_SESSION["user"]);
		}
	}