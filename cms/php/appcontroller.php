<?php
	class AppController
	{
		static function doAppendFolder()
		{
			$id = $_POST["id"];
			$newId = cms::append($id, "");
			header("Location: ?id=$id#f$newId");
		}
		static function doAppendField()
		{
			$id = $_POST["id"];
			$field = "f" . time();
			cms::update($id, $field, "");
			header("Location: ?id=$id#v$field");
		}
		static function doRemoveFolder()
		{
			$id = $_POST["id"];
			$removeId = $_POST["removeId"];
			cms::remove($removeId);
			header("Location: ?id=$id");
		}
		static function doRemoveField()
		{
			$id = $_POST["id"];
			$field = $_POST["field"];
			cms::unset($id, $field);
			header("Location: ?id=$id");
		}
		static function doRenameFolder()
		{
			$id = $_POST["id"];
			$name = $_POST["name"];
			$folder = cms::get($id);
			cms::update($id, "name", $name);
			header("Location: ?id={$folder->up}#f$id");
		}
		static function doRenameField()
		{
			$id = $_POST["id"];
			$field = $_POST["field"];
			$name = $_POST["name"];
			if ($field != $name && $name != "name")
				cms::rename($id, $field, $name);
			header("Location: ?id=$id#v$name");
		}
		static function doSaveField()
		{
			$id = $_POST["id"];
			$field = $_POST["field"];
			$name = $_POST["name"];
			$content = $_POST["content"];
			cms::update($id, $field, $content);
			if ($_FILES["files"]["name"])
				self::doUploadFiles();
			if ($field != $name && $name != "name")
				cms::rename($id, $field, $name);
			header("Location: ?id=$id#v$name");
		}
		static function doUploadFiles()
		{
			$id = $_POST["id"];
			$field = $_POST["field"];
			if ($_FILES["files"]["name"]) {
				$fileName = $_FILES["files"]["name"];
				$fileType = $_FILES["files"]["type"];
				$fileTmp = $_FILES["files"]["tmp_name"];
				$fileSize = $_FILES["files"]["size"];
				cms::upload($id, $field, $fileTmp, $fileName);
			}
		}
	}