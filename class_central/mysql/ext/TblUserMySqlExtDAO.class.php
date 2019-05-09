<?php
/**
 * Class that operate on table 'tbl_user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
class TblUserMySqlExtDAO2 extends TblUserMySqlDAO2{

	public function insertData($tblUser){
		$sql = 'INSERT INTO tbl_user (id, username, password, user_type, subdomain, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblUser->id);
		$sqlQuery->set($tblUser->username);
		$sqlQuery->set($tblUser->password);
		$sqlQuery->set($tblUser->userType);
		$sqlQuery->setNumber($tblUser->subdomain);
		$sqlQuery->setNumber($tblUser->createdBy);
		$sqlQuery->setNumber($tblUser->modifiedBy);
		$sqlQuery->set($tblUser->dateCreated);
		$sqlQuery->set($tblUser->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblUser->id = $id;
		return $id;
	}
}
?>