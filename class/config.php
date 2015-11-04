<?php
	namespace App;

	class Config{
		private $settings;
		private static $_instance;

		public static function getInstance(){
			if(is_null(self::$_instance)){
				self::$_instance = new Config();
			}
			return self::$_instance;
		}

		private function __construct(){
			// $rep = dirname(__DIR__) . '/config/config.php';
			// var_dump(str_replace('\\', '/',$rep));
			$settings = require dirname(__DIR__) . '/config/config.php';
		}

		public function get($key){
			if(!isset($settings[$key])){
				return null;
			}
			return settings($key);
		}
	}


?>