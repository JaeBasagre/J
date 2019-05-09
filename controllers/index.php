<?php

class Index extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function jae(){
		echo 1;
	}
	public function index()
	{
		$this->view->checkTimeIn = $this->model->checkTimeIn();
		$this->view->checkNBT = $this->model->checkNBT();
		$this->view->checkForecast = $this->model->checkForecast();
		$this->view->checkTimeOut = $this->model->checkTimeOut();
		$this->view->render('views/index/index.php');
	}
	public function saveTimeEntry()
	{
		$this->model->saveTimeEntry();
	}

	public function checkTimeIn()
	{
		$this->model->checkTimeIn();
	}
	public function theme()
	{
		$color['color'] = $_POST['color'];
		Session::setSession('theme', $color);
	}

}

?>
