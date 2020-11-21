<?php
	class ErrorMessage
	{
		static function set($content, $name = 0)
		{
			$_SESSION["error-message-$name"] = $content;
		}
		
		static function clear($name = 0)
		{
			$value = $_SESSION["error-message-$name"];
			unset($_SESSION["error-message-$name"]);
			return $value;
		}
		
		static function exist($name = 0)
		{
			return $_SESSION["error-message-$name"] != null;
		}
	}