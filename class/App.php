<?php
namespace App;
class App{

	const DB_USER = 'nerissiren';
	const DB_PASS = 'Adm33Neris';
	const DB_NAME = 'nerissiren';
	const DB_HOST = 'nerissiren.mysql.db';

	private static $database;

	public static function getDb(){
		if(self::$database === null ){
			self::$database =  new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
		}
		
		return self::$database;
	}

}


?>