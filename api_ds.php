<?php
	ini_set("display_errors", "1");
error_reporting(E_ALL);
	require 'libs/Server.php';
	require 'include_dao_central.php';
	require 'libs/Db.php';

	if(isset($_REQUEST['req']) && !empty($_REQUEST['req'])){
		
		$action = new DashtitoDB_Api;
		$req = $_REQUEST['req'];
		if($req == 'SUBUSER'){
			$action->register($_POST['subdomain'], $_POST['database'], $_POST['username'], $_POST['password'], $_POST['user'], $_POST['sub']);
		}
	}

	class DashtitoDB_Api {
		
		function register($subdomain, $database, $username, $password, $user, $sub){
			require_once 'libs/cpanel_api.php';
			
			$cpanelApi = new CPanel_Api;

			$db = SERVERTYPE == 'test' ? str_replace('coroveo_', '', $database) : $database;
			$prefixconn = SERVERTYPE == 'test' ? 'coroveo_' : '';

			$database = $prefixconn.$db;

			$return = $cpanelApi->create_subdomain($username, DOMAIN_DT, PATH);
			$return2 = $cpanelApi->create_database($db);

			sleep(10);
			$dbfileloc = 'db/export.sql';
			$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, $database);
			$sql = file_get_contents($dbfileloc);


			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			do{

				$insert = new TblSubdomainAccount2;
				$insert->id = $sub['id'];
				$insert->username = $sub['username'];
				$insert->subdomain = $username.'.'.DOMAIN_DT;
				$insert->database = $database;
				$insert->createdBy = 0;
				$insert->modifiedBy = 0;
				$insert->dateCreated = date('Y-m-d H:i:s');
				$insert->dateModified = '';
				$subid = DAOFactory2::getTblSubdomainAccountsDAO()->insertData($insert);

				$checkUser = DAOFactory2::getTblUserDAO()->queryByUsername($username);
				if(empty($checkUser)){
					$insert = new TblUser2;
					$insert->id = $user['id'];
					$insert->username = $user['username'];
					$insert->password = $user['password'];
					$insert->userType = 'user';
					$insert->subdomain = $sub['id'];
					$insert->createdBy = 0;
					$insert->modifiedBy = 0;
					$insert->dateCreated = date('Y-m-d H:i:s');
					$insert->dateModified = '';
					$userid = DAOFactory2::getTblUserDAO()->insertData($insert);

					$this->userOther($userid, DATABASE_NAME_CENTRAL);
				}
	
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
			$this->createUser($username, $user['id'], $password, $sub['id'], $database);
			$this->syncSetups($username, $database);

		}
		public function	createUser($username, $userid, $password, $subid, $database){

			$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, $database);
			
			$sql = "
					INSERT INTO `tbl_user` 
						(`id`, `username`, `password`, `user_type`, `subdomain`, `created_by`, `modified_by`, `date_created`, `date_modified`) 
					VALUES 
						(".$userid.", '".$username."', '".$password."', 'user', ".$subid.", 1, 1, '".date('Y-m-d H:i:s')."', '0000-00-00 00:00:00');
			";

			if ($conn->query($sql) === TRUE) {
			    // echo "New record created successfully";
			} else {
			    echo "Error: ". $conn->error;
			}
			
			$conn->close();
			
			$this->userOther($userid, $database);

		}
		public function	syncSetups($username, $database){

			$sql1 = "SET FOREIGN_KEY_CHECKS = 0;";
			Db::query($database, $sql1);		

			$arr = array('tbl_company', 'tbl_company_per_dept', 'tbl_department', 'tbl_position', 'tbl_shift', 'tbl_employment_status', 'tbl_employee_status');

			foreach ($arr as $key => $table) {
				$data =	Db::loadAll(DATABASE_NAME_CENTRAL,$table);
				foreach ($data as $key => $each) {
					$insert = array();
					foreach ($each as $key => $value) {
						$insert[$key] = $value;
					}
					Db::insert($database,$table,$insert);
				}
			}

			$sql2 = "SET FOREIGN_KEY_CHECKS = 1;";
			Db::query($database, $sql2);
			
		}

		public function userOther($userid, $db){

			$sql1 = "SET FOREIGN_KEY_CHECKS = 0;";
			Db::query($db, $sql1);

			$checkUserSchedule = DAOFactory2::getTblUserScheduleDAO()->queryByUserId($userid);

			$tblUserSchedule['id'] = (empty($checkUserSchedule)) ? '' : $checkUserSchedule[0]->id;
			$tblUserSchedule['user_id'] = $userid;
			$tblUserSchedule['time_in'] = (empty($checkUserSchedule)) ? '08:00:00' : $checkUserSchedule[0]->timeIn;
			$tblUserSchedule['time_out'] = (empty($checkUserSchedule)) ? '18:00:00' : $checkUserSchedule[0]->timeOut;
			$tblUserSchedule['sched_type'] = (empty($checkUserSchedule)) ? 0 : $checkUserSchedule[0]->timeOut;
			$tblUserSchedule['created_by'] = (empty($checkUserSchedule)) ? 0 : $checkUserSchedule[0]->timeOut;
			$tblUserSchedule['modified_by'] = (empty($checkUserSchedule)) ? 0 : $checkUserSchedule[0]->timeOut;
			$tblUserSchedule['date_created'] = date('Y-m-d H:i:s');
			$tblUserSchedule['date_modified'] = '0000-00-00 00:00:00';
			Db::insert($db,'tbl_user_schedule',$tblUserSchedule);

			$sql2 = "SET FOREIGN_KEY_CHECKS = 1;";
			Db::query($db, $sql2);
		}
		
	}
?>