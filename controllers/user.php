<?php
class User extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$this->model->login();
	}
	public function logout()
	{
		$this->model->logout();
	}
	public function checkUser()
	{
		$this->model->checkUser();
	}
	public function apiDashboard(){
		$this->model->apiDashboard();
	}
	public function register(){
		$this->model->register();
	}	
	public function autoLogin(){
		$this->model->autoLogin();
	}
}
?>