<?php
/**
 * Connection properties
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class ConnectionProperty2{

	private static $host = 'dt0014';
	private static $user = 'root';
	private static $password = '';
	static $database = 'dashsucc_v3';
	
	public static function getHost(){
		return defined("DATABASE_HOST") ? DATABASE_HOST : ConnectionProperty2::$host;
	}

	public static function getUser(){
		return defined("DATABASE_USER") ? DATABASE_USER : ConnectionProperty2::$user;
	}

	public static function getPassword(){
		return defined("DATABASE_PASS") ? DATABASE_PASS : ConnectionProperty2::$password;
	}

	public static function getDatabase(){
		return defined("DATABASE_NAME_CENTRAL") ? DATABASE_NAME_CENTRAL : ConnectionProperty2::$database;
	}
	
	public static function getConnection(){
		return mysqli_connect(
			defined("DATABASE_HOST") ? DATABASE_HOST : ConnectionProperty2::$host,
			defined("DATABASE_USER") ? DATABASE_USER : ConnectionProperty2::$user,
			defined("DATABASE_PASS") ? DATABASE_PASS : ConnectionProperty2::$password,
			defined("DATABASE_NAME_CENTRAL") ? DATABASE_NAME_CENTRAL : ConnectionProperty2::$database
		);
	}
}
?>