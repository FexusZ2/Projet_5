<?php
	namespace APP;
	use Core\Database\Database;
	include 'Private/config.php';
	class AppFactory
	{

		private static $db;
		private static $response;

		/**
		* Créer un instance de la classe Database
		* @return Database
		*/
		private static function getDb()
		{
			if (is_null(self::$db)) 
			{
				self::$db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST);
			}
			return self::$db;
		}

		/**
		* Retourne une requete SQL query ou execute de la classe Database
		* @param string $statement
		* @param bool $fetch
		* @param array $array
		* @return mixed
		*/
		public static function query($statement, $fetch = false, $array = array())
		{
			if (empty($array))
			{
				self::$response = self::getDb()->query($statement, $fetch);
			}else{
				self::$response = self::getDb()->execute($statement, $array, $fetch);
			}
			return self::$response;
		}
	}