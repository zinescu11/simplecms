<?php
	class Route
	{
		static function handle($route, $pattern, $resolve)
		{
			if (!preg_match("#^$pattern$#", $route, $values)) return;
			array_shift($values); call_user_func_array($resolve, $values); exit(0);
		}
	}