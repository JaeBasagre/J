<?php

class Reports_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

    public function getAttendance(){

        echo json_encode(DAOFactory::getTblTimeEntriesDAO()->getAttendance($_SESSION['user']['id'], date("Y-m-d", strtotime($_REQUEST['from'])), date("Y-m-d", strtotime($_REQUEST['to']))));
    }
    public function getAttendanceBetween(){
        echo json_encode(DAOFactory::getTblTimeEntriesDAO()->getAttendanceBetween($_SESSION['user']['id'], date("Y-m-d", strtotime($_REQUEST['from'])), date("Y-m-d", strtotime($_REQUEST['to']))));
    }


}

?>
