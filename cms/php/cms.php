<?php
	ini_set('display_errors', 'on');
	error_reporting(E_ALL & ~E_NOTICE);
	
	class Cms
	{
		// configuration
		//==========================================================================================
		
		static $uploadDir = __DIR__ . "/../../uploads";
		
		static $database = __DIR__ . "/database.json";
		
		// template methods
		//==========================================================================================

		// value
		static function value($name)
		{
			$parts = explode("/", $name);
			$field = array_pop($parts);
			$item = self::item(implode("/", $parts));
			if ($item && $field) return $item->$field;
		}
		// items	
		static function items($name)
		{
			$item = is_object($name) ? $name : self::item($name);
			return self::scan($item->id);
		}
		
		// item
		static function item($name, $dirId = 0)
		{
			$dirId = is_object($dirId) ? $dirId->id : intval($dirId);
			
			// split
			list($first, $tail) = explode("/", $name, 2);
			
			// find
			$found = self::findOne(["up" => intval($dirId), "name" => $first]);
			
			// return
			if ($found)
				return $tail ? self::item($tail, $found) : $found;
		}
		
		// changing methods
		//==========================================================================================
		
		// remove
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
		static function append($id, $name, $values = null)
		{
			$maxid = 0;
			foreach (self::$content as $row)
				$maxid = max($maxid, $row->id);
			$newid = $maxid + 1;
			$newObject = (object)[
				"up" => intval($id) ?: 0, "id" => $newid, "index" => "", "name" => $name];
			if ($values) {
				foreach ($values as $f => $v)
					isset($newObject->$f) or $newObject->$f = "";
			}
			self::$content[]= $newObject;
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
		// is image
		static function valueIsImageUrl($value) {
			return preg_match("#\.(png|jpeg|jpg|svg|gif)$#", $value);
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
			$code = json_encode(self::$content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			file_put_contents(self::$file, $code);
		}
		
		static $file;
		static $content;
	}
	
	// autoload
	//==============================================================================================

 	spl_autoload_register(function($name)
 	{
 		$name = strtolower($name);
 		$file1 = __DIR__ . "/$name.php";
 		if (is_file($file1)) return require_once($file1);
	});

	// run
	//==============================================================================================
	cms::run();
	
	