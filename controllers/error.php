<?php

class Error extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{

		$this->view->render('views/error/index.php', true);
	}



}

?>