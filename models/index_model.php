<?php
class Index_model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function saveTimeEntry(){
		// print_r($_POST); exit;
		$insert = new TblTimeEntrie2;
		$insert->userId = $_SESSION['user']['id'];;
		$insert->client = $_POST['client'];
		$insert->location = $_POST['location'];
		$insert->ipAddress = $this->getIp();
		$insert->locationAddress = '';
		$insert->deviceType = 'web';
		$insert->latitude = 0;
		$insert->longitude = 0;
		$insert->isSynced = 1;
		$insert->time = date('Y-m-d H:i:s', strtotime($_POST['date'].' '.$_POST['time']));
		$insert->type = $_POST['type'];
		$insert->syncedDate = date('Y-m-d H:i:s');
		$insert->dateCreated = date('Y-m-d H:i:s');
		$insert->dateModified = '0000-00-00 00:00:00';
		$id = DAOFactory2::getTblTimeEntriesDAO()->insert($insert);

		$insert = new TblTimeEntrie;
		$insert->id = $id;
		$insert->userId = $_SESSION['user']['id'];
		$insert->client = $_POST['client'];
		$insert->location = $_POST['location'];
		$insert->ipAddress = $this->getIp();
		$insert->locationAddress = '';
		$insert->deviceType = 'web';
		$insert->latitude = 0;
		$insert->longitude = 0;
		$insert->isSynced = 1;
		$insert->time = date('Y-m-d H:i:s', strtotime($_POST['date'].' '.$_POST['time']));
		$insert->type = $_POST['type'];
		$insert->syncedDate = date('Y-m-d H:i:s');
		$insert->dateCreated = date('Y-m-d H:i:s');
		$insert->dateModified = '0000-00-00 00:00:00';
		DAOFactory::getTblTimeEntriesDAO()->insertData($insert);

		$sched = DAOFactory::getTblUserScheduleDAO()->queryByUserId($_SESSION['user']['id']);
		$time = date('H:i:s', strtotime($_POST['date'].' '.$_POST['time']));
		if($sched[0]->timeIn <= $time){
			echo 'notextraordinary';
		} else {
			echo 'extraordinary';
		}

		$data = array();

		$data['userId'] = $_SESSION['user']['id'];
		$data['time'] = date('Y-m-d H:i:s', strtotime($_POST['date'].' '.$_POST['time']));
		$data['type'] = $_POST['type'];
		$data['location'] = $_POST['location'];
		$data['client'] = $_POST['client'];
		$data['syncedDate'] = date('Y-m-d H:i:s');
		if(SERVERTYPE == 'local'){
			Controller::send("http://".DOMAIN."/api/saveTimeEntries", $data);
		} else {
			Controller::send("http://".SUBDOMAIN.".".DOMAIN."/api/saveTimeEntries", $data);
		}

		// sync Entry to Mobile //
		$submitToMobile = array();
		$submitToMobile['user_id'] = $_SESSION['user']['id'];
		$submitToMobile['id'] = $id;
		$submitToMobile['domain'] = $_SERVER['HTTP_HOST'];
		Controller::send(MOBILESYNCLINK, $data);


	}
	public function checkTimeIn(){
		return DAOFactory::getTblTimeEntriesDAO()->checkTimeEntryPerDate(isset($_REQUEST['date']) ? $_REQUEST['date'] : date('Y-m-d'), 'in', $_SESSION['user']['id']);
	}
	public function checkTimeOut(){
		return DAOFactory::getTblTimeEntriesDAO()->checkTimeEntryPerDate(isset($_REQUEST['date']) ? $_REQUEST['date'] : date('Y-m-d'), 'out', $_SESSION['user']['id']);
	}

	function getIp()
	{
	    $ip = $_SERVER['REMOTE_ADDR'];

	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }

	    return $ip;
	}

	function checkNBT(){

		$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
		$user = $_SESSION['user']['id'];

		$post_data = array();
		$post_data['date'] = $date;
		$post_data['userId'] = $user;

		if(SERVERTYPE == 'local'){
			$data = Controller::send("http://".DOMAIN."/api/getNbtTransPerUser", $post_data);
		} else {
			$data = Controller::send("http://".SUBDOMAIN.".".DOMAIN."/api/getNbtTransPerUser", $post_data);
		}
		return $data;


	}

	function checkForecast(){

		$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
		$user = $_SESSION['user']['id'];

		$post_data = array();
		$post_data['date'] = $date;
		$post_data['userId'] = $user;

		if(SERVERTYPE == 'local'){
			$data = Controller::send("http://".DOMAIN."/api/checkForecastPerDate", $post_data);
		} else {
			$data = Controller::send("http://".SUBDOMAIN.".".DOMAIN."/api/checkForecastPerDate", $post_data);
		}
		return $data;

	}


}
?>
