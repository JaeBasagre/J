<?php

class Model{

	function __construct(){
		Session::init();
		require 'include_dao.php';
		require 'include_dao_central.php';
	}
	
}