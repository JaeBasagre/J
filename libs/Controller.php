<?php
class Controller{
	function __construct(){
		$this->view = new Views();
	}

	public function loadModel($name){
		$path = 'models/' . $name . '_model.php';

		if(file_exists($path)){
			require $path;

			$modelName = $name . '_model';

			$this->model = new $modelName();

		}
	}

	static function objToArray($obj){
		$array = array();
		foreach($obj as $var=>$val){
			$array[$var] = $val;
		}
		return $array;
	}

	static function removeComma($string){
		$pattern = '/^\(/';
		// echo $string;
		$matches = array();
		preg_match($pattern,$string,$matches);

		if(substr($string,0,1) == '('){
			// preg_replace('/\(|\)/','',$string);
			$string = strtr($string, array('(' => '', ')' => ''));
			// str_replace(')', '', $string);
			// preg_replace( "(", "", $path );
			// $pattern = '/^\)/';

			// str_replace($pattern, '', $string);
			$string = '-'.$string;
		}

		$string = str_replace(',', '', $string);
		// exit;
		return $string;

	}

	static function setComma($string){
		 $a = str_replace(',', '', $string);

		 return $a;
	}


	static function getFloat($int){
		if($int == ''){
			return '0.00';
		}
		if($int < 0){
			$int *= (-1);
			return '('.number_format($int,2).')';
		} else {
			return number_format($int,2);
		}
	}
	static function send($url, $post_data)
	{

		$curl_connection = curl_init($url);
		curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

		$post_data = http_build_query($post_data);

		curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($curl_connection);
		// print_r($result);

		curl_close($curl_connection);

		return $result != "" ? (Controller::isJson($result) ? json_decode($result) : $result) : false;
	}
	static function isJson($str)
	{
		json_decode($str);
		return (json_last_error() == JSON_ERROR_NONE);
	}

}
