<?php

class Reports extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->render('views/reports/index.php');
	}
	public function saveTimeEntry()
	{
		$this->model->saveTimeEntry();
	}

	public function checkTimeIn()
	{
		$this->model->checkTimeIn();
	}
    public function getAttendance()
	{
		$this->model->getAttendance();
	}
    public function getAttendanceBetween()
	{
		$this->model->getAttendanceBetween();
	}
}

?>
