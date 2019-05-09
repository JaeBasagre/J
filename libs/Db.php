<?php

class DB{

	public static function getHost(){
		return defined("DATABASE_HOST") ? DATABASE_HOST : 'dt0014';
	}

	public static function getUser(){
		return defined("DATABASE_USER") ? DATABASE_USER : 'root';
	}

	public static function getPassword(){
		return defined("DATABASE_PASS") ? DATABASE_PASS : '';
	}

	public static function conn(){

		$conn = new mysqli(self::getHost(), self::getUser(), self::getPassword());
		return $conn;
	}

	public static function getDatabase(){

		$database = array();

		$res = mysqli_query(self::conn(),"SHOW DATABASES;");
		while($row = mysqli_fetch_array($res))
		{
			array_push($database,$row[0]);
		}

		return $database;
	}

	public static function getTables($db){
		$table = array();
		self::conn()->select_db($db);
		$res = mysqli_query(self::conn(),"SHOW TABLES;");
		while($row = mysqli_fetch_array($res))
		{
			array_push($table,$row[0]);
		}

		return $table;

	}	
	public static function getTableStatus($db){
		$table = array();
		// self::conn()->select_db($db);
		$res = mysqli_query(self::conn(),"SHOW TABLE STATUS FROM $db;");
		// $row = mysqli_fetch_array($res);
	
		while($row = mysqli_fetch_array($res))
		{
			array_push($table,$row);
		}

		return $table;

	}
	public static function load($db,$table,$id){
		self::conn()->select_db($db);

		$sql = "SELECT * FROM $table WHERE id = $id";

		$result = self::conn()->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	
	}
	public static function selectByColumnI($db,$table,$column,$value){		
		$conn = self::conn();
		$conn->select_db($db);
		$type = self::typeColumns($table,$conn);
		
		$sql = "SELECT * FROM $table WHERE $column = $value;";
		$result = $conn->query($sql);
		
		$array = array();
		while($row = $result->fetch_assoc()){
			$array[] = $row;
		}
		return $array;
	
	}
	public static function selectByColumnS($db,$table,$column,$value){		
		$conn = self::conn();
		$conn->select_db($db);

		$sql = "SELECT * FROM $table WHERE $column = '$value';";
		$result = $conn->query($sql);
		
		$array = array();
		while($row = $result->fetch_assoc()){
			$array[] = $row;
		}
		return $array;
	
	}	
	public static function querySelect($db,$sql){		
		$conn = self::conn();
		$conn->select_db($db);
		$result = $conn->query($sql) or die($conn->error);
		
		$array = array();
		while($row = $result->fetch_assoc()){
			$array[] = $row;
		}
		return $array;
	
	}
	public static function query($db,$sql){		
		$conn = self::conn();
		$conn->select_db($db);

		if($conn->multi_query($sql) === TRUE){
			// echo 'Success';
		} else {
			echo $conn->error;
		}
	
	}
	public static function loadAll($db,$table){

		$conn = self::conn();
		$conn->select_db($db);

		$sql = "SELECT * FROM $table";

		$result = $conn->query($sql);

		$array = array();
		while($row = $result->fetch_assoc()){
			$array[] = $row;
		}
		return $array;
	
	}
	public static function insert($db,$table,$data){

		$conn = self::conn();
		$conn->select_db($db);

		$columns = self::getColumns($table,$db);
		$paramColumns = implode(', ',$columns);
		$paramQ = self::fieldsQuestionMark($columns);
		$type = self::typeColumns($table,$conn);
		// print_r($type);

		$stmt = $conn->prepare("INSERT INTO $table VALUES ($paramQ);");

		self::execute($columns,$stmt,$type,$data);
		return mysqli_insert_id($conn);

	}
	public static function update($db,$table,$data){
		$conn = self::conn();
		$conn->select_db($db);

		$columns = self::getColumns($table,$db);
		array_shift($columns);
		$columns[] = 'id';

		$col = $columns;
		$colpop = array_pop($col);

		$paramColumns = implode('` = ?, `',$col)."` = ? ";
		// echo "UPDATE tbl_message SET $paramColumns WHERE id = ?;";
		$type = self::typeColumns($table,$conn);
		// print_r($type);
		$split = str_split($type);
		// print_r(array_slice($split, 0));
		$type = implode('',array_slice($split, 1)).'i';
	
		$stmt = $conn->prepare("UPDATE $table SET `$paramColumns WHERE id = ?;");

		self::execute($columns,$stmt,$type,$data);

	}
	public static function delete($db,$table,$data){
		$conn = self::conn();
		$conn->select_db($db);

		$columns = array();
		$columns[] = 'id';

		$type = 'i';
		$stmt = $conn->prepare("DELETE FROM $table WHERE id = ?;");

		self::execute($columns,$stmt,$type,$data);

	}
	public static function delete2($db,$table,$data){
		$conn = self::conn();
		$conn->select_db($db);

		$sql = "DELETE FROM $table WHERE id = $data;";

		if ($conn->query($sql) === TRUE) {
		    // echo "Record deleted successfully";
		} else {
		    // echo "Error deleting record: " . $conn->error;
		}

	}
	public static function getColumns($table,$db){	

		$columns = array();

		$res = mysqli_query(self::conn(), "SHOW COLUMNS FROM ".$db.".".$table.";");
		while($row = mysqli_fetch_array($res))
		{
			array_push($columns,$row[0]);
		}

		return $columns;
	}
	public static function getColumnsStatus($table,$db){	

		$columns = array();

		$res = mysqli_query(self::conn(), "SHOW COLUMNS FROM ".$db.".".$table.";");
		while($row = mysqli_fetch_array($res))
		{
			array_push($columns,$row);
		}

		return $columns;
	}

	public static function fieldsQuestionMark($columns){
		$array = array();
		foreach ($columns as $key => $value) {
			$array[$key] = '?';
		}
		return implode(', ', $array);

	}

	public static function typeColumns($table,$conn){

		$array = array();
		$strings = array(254,253,254,252,10,12,7,11,13);
		$ints = array(16,1,2,9,3,8);
		$floats = array(4,5,246);

		$query = "SELECT * from " . $table;

		if($result = $conn->query($query)){
		    while ($columnType = $result->fetch_field()){
		        if(in_array($columnType->type, $strings)){
		        	$array[] = 's';
		        } elseif(in_array($columnType->type, $ints)){
		        	$array[] = 'i';
		        } elseif(in_array($columnType->type, $floats)){
		        	$array[] = 'd';
		        }
		    }
		}
		return implode("",$array);
	}	
	// public static function typeColumns($table,$conn){

	// 	$array = array();
	// 	$strings = array(254,253,254,252,10,12,7,11,13);
	// 	$ints = array(16,1,2,9,3,8);
	// 	$floats = array(4,5,246);

	// 	$query = "SELECT * from " . $table;

	// 	if($result = $conn->query($query)){
	// 		$finfo = $result->fetch_fields();
	// 		foreach ($finfo as $columnType) {
	// 	    // while ($columnType = $result->fetch_fields()){
	// 	        if(in_array($columnType->type, $strings)){
	// 	        	$array[] = 's';
	// 	        } elseif(in_array($columnType->type, $ints)){
	// 	        	$array[] = 'i';
	// 	        } elseif(in_array($columnType->type, $floats)){
	// 	        	$array[] = 'd';
	// 	        }
	// 	    }
	// 	}
	// 	return implode("",$array);
	// }

	private static function execute($columns,$stmt,$type,$data){
		$array = array();

		foreach ($columns as $key => $value) {
			// $num = $key;
			// echo $key;
			$array[$value] = &${$value};
		}
		call_user_func_array(array($stmt, 'bind_param'), array_merge(array($type), $array));
		// print_r($array);
		// exit;
		// print_r($data);
		foreach ($array as $key => $value) {
			$array[$key]= $data[$key];
		}


		$stmt->execute();
		
	}


}


?>