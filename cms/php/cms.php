<?php
	ini_set('display_errors', 'on');
	error_reporting(E_ALL & ~E_NOTICE);
	
	class Cms
	{
		// configuration
		//==========================================================================================
		
		static $uploadDir = __DIR__ . "/../uploads";
		
		static $database = __DIR__ . "/database.json";
		
		// template methods
		//==========================================================================================

		// value
		static function value($name)
		{
			list ($name, $field) = explode("/.", $name, 2);
			$item = self::item($name);
			$field or $field = "val";
			if ($item) return $item->$field;
		}
		// items	
		static function items($name)
		{
			$item = is_object($name) ? $name : self::item($name);
			return self::scan($item->id);
		}
		
		// item
		static function item($name, $dir = 0)
		{
			if (!$dir && $name[0] == "/") {
				$dir = self::get(1);
				$name = trim($name, "/");
			}
			// split
			list ($first, $tail) = explode("/", $name, 2);
			// find
			if ($dir)
				$found = self::findone(["up" => intval($dir->id), "name" => $first]);
			else
				$found = self::findone(["name" => $first]);
			// return
			if ($found)
				return $tail ? self::item($tail, $found) : $found;
		}
		
		// changing methods
		//==========================================================================================
		
		// 1 remove
		static function remove($id, $field = 0)
		{
			if ($field)
			{
				$row = self::get($id);
				unset($row->$field);
			}
			else {
				if (!$id) return;
				foreach (self::scan($id) as $inner)
					self::remove($inner->id);
				$pos = self::index($id);
				array_splice(self::$content, $pos, 1);
			}
			self::save();
		}
		// append
		static function append($id, $name)
		{
			$maxid = 0;
			foreach (self::$content as $row)
				$maxid = max($maxid, $row->id);
			$newid = $maxid + 1;
			
			self::$content[]= (object)[
				"up" => intval($id) ?: 1, "id" => $newid, "index" => "", "name" => $name];
			self::save();
			return $newid;
		}
		// update
		static function update($id, $field, $value)
		{
			$row = self::get($id);
			$row->$field = $value;
			self::save();
		}
		// unset
		static function unset($id, $field)
		{
			$row = self::get($id);
			unset($row->$field);
			self::save();
		}
		// rename
		static function rename($id, $field, $name)
		{
			if ($name) {
				$row = self::get($id);
				foreach ($row as $key => $value)
					$tmp[$key == $field ? $name : $key] = $value;
				foreach ($row as $key => $value) unset($row->$key);
				foreach ($tmp as $key => $value) $row->$key = $value;
				self::save();
			}
		}
		// upload
		static function upload($id, $field, $path, $name)
		{
			copy($path, self::$uploadDir . "/$name");
			$fileUrl = "@/$name";
			self::update($id, $field, $fileUrl);
			return $fileUrl;
		}
		
		// reading methods
		//==========================================================================================
		
		// get
		static function get($id)
		{
			$pos = self::index($id);
			return self::$content[$pos];
		}
		// index		
		static function index($id)
		{
			foreach (self::$content as $i => $row)
				if ($row->id == $id) return $i;
			return -1;
		}
		// scan
		static function scan($id)
		{
			$id or $id = 0;
			$result = [];
			foreach (self::$content as $row)
				if ($row->up == $id) $result[]= $row;
			usort($result, function($a, $b) {
				return strcmp($a->index ?: $a->name, $b->index ?: $b->name);
			});
			return $result;
		}
		// find one
		static function findOne($values)
		{
			foreach (self::$content as $i => $row)
			{
				foreach ($values as $field => $value)
					if ($row->$field != $value)
						continue 2;
				return $row;
			}
		}
		// image
		static function valueIsImageUrl($value) {
			$isImage = preg_match("#\.(png|jpeg|jpg|svg|gif)$#", $value);
			return $isImage;
		}
		
		// serializing methods
		//==========================================================================================
		
		// init
		static function run($datafile = 0)
		{
			self::$file = $datafile ?: self::$database;
			self::$content = (array)json_decode(file_get_contents(self::$file));
		}
		// save
		static function save()
		{
			$code = jsenc(self::$content);
			file_put_contents(self::$file, $code);
		}
		
		static $file;
		static $content;
	}
	
	// utils
	//==============================================================================================
	
	function clog() { foreach (func_get_args() as $arg) { print_r($arg); print(" "); } print("\n"); }

	function strcon($str, $part) { return strpos($str, $part) !== false; }
		
	function strsw($str, $part) { return strpos($str, $part) === 0; }
	
	function strpadleft($str, $size, $char) { return str_pad($str, $size, $char, STR_PAD_LEFT); }
	
	function strpadright($str, $size, $char) { return str_pad($str, $size, $char, STR_PAD_RIGHT); }
	
	function jsenc($mixed) { return json_encode($mixed, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); }
	
	// autoload
	//==============================================================================================

 	spl_autoload_register(function($name)
 	{
 		$file1 = __DIR__ . "/$name.php";
 		if (is_file($file1)) return require_once($file1);
	});

	// run
	//==============================================================================================
	cms::run();
	
	