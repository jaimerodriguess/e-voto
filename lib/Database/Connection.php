<?php
    include_once 'config.php';

	abstract class Connection
	{
		private static $conn;

		public static function getConn()
		{
			if (self::$conn == null) {
				self::$conn = new PDO('mysql:host='. DB_HOST.';port='.DB_PORT.'; dbname='.DB_NAME, DB_USER, DB_PASSWORD, array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_PERSISTENT => false
				));
			}			
            return self::$conn;
            var_dump(self::$conn);
		}
	}