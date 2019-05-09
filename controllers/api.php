<?php

class Api extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function changePassword()
	{
		$this->model->changePassword();
	}



}

?>