<?php
class User_model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$data=DAOFactory::getTblUserDAO()->queryByUsername($username);

		// if(!empty($data)){
			foreach ($data as $each) {
				if($password==$each->password)
				{
				 	$user=Controller::objToArray($each);
				 	Session::setSession('user',$user);
				 	echo 1;
				 	exit;
				} else{
					echo 2;
				 	exit;
				}
			}
		// } else {
		// 	echo 3;
		// }
	
	}
	public function autoLogin(){
		$username = $_REQUEST['u'];
		$user = DAOFactory::getTblUserDAO()->queryByUsername($username);
		$p = $_REQUEST['p'];
		if(!empty($user)){
			if(password_verify($user[0]->password, $p)){
			 	$user=Controller::objToArray($user[0]);
			 	Session::setSession('user',$user);
			}
		}
		header('location: '.URL);
	}
	public function logout()
	{
		Session::destroy();
		header('location:'.URL);
	}
	public function checkUser()
	{
		if(SERVERTYPE=='local'){
			$username = DAOFactory::getTblUserDAO()->queryByUsername($_POST['username']);
			if(!empty($username)){
				echo 'yes';

			} else {
				echo 'no';
			}
		} else {		
			$chkusername = $_POST['username'];
			$userCentral = DAOFactory2::getTblUserDAO()->queryByUsername($chkusername);
			if(!empty($userCentral))
			{	
				$check = DAOFactory2::getTblSubdomainAccountsDAO()->load($userCentral[0]->subdomain);
				if(empty($check)){
					echo 'no';
				} else {
					$chckSubUser = DAOFactory::getTblUserDAO()->queryByUsername($chkusername);
					if(empty($chckSubUser)){
						$user = Db::selectByColumnS(DATABASE_NAME_CENTRAL,'tbl_user','username',$chkusername);
						Db::insert(DATABASE_NAME, 'tbl_user', $user[0]);
						
						$userInfo = Db::selectByColumnI(DATABASE_NAME_CENTRAL,'tbl_user_info','user_id',$user[0]['id']);
						if(!empty($userInfo)){
							Db::insert(DATABASE_NAME, 'tbl_user_info', $userInfo[0]);
						}
						
						$userSched = Db::selectByColumnI(DATABASE_NAME_CENTRAL,'tbl_user_schedule','user_id',$user[0]['id']);
						if(!empty($userSched)){
							Db::insert(DATABASE_NAME, 'tbl_user_schedule', $userSched[0]);
						}
					}
					if(SUBDOMAIN == $check->username){
						echo 'yes';
					} else {
						echo 'no';
					}
				}
			}
			else
			{
				echo 'no';
			}
		}
	}

	
	public function apiDashboard(){
		echo "<pre>";	
		print_r($_REQUEST);
	}
	public function register(){
		$dbname = $_REQUEST['dbname'];
		$this->createDb($dbname);
		$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, 'ds_v3_'.$dbname);
		$dbfileloc = 'db/export.sql';
		$sql = file_get_contents($dbfileloc);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		do{
			try{
				if ($conn->multi_query($sql) === TRUE) {
				}
				else{
					echo "Error Setting up Data Tables: " . $conn->error;
				 	$conn->close();
				 	exit;
				}	
				break;
		  	}
		  	catch (Exception $e){
		  		echo $e;
		  }
		} 
		while(true);
		sleep(10);
		echo 1;
	}	
	public function createDb($dbname){

		$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		do{
			try{
				$conn->query('CREATE DATABASE ds_v3_'.$dbname.';');
				break;
		  	}
		  	catch (Exception $e){
		  		echo $e;
		  }
		} 
		while(true);
	}
}
?>