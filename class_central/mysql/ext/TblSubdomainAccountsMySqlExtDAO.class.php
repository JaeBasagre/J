<?php
/**
 * Class that operate on table 'tbl_subdomain_accounts'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
class TblSubdomainAccountsMySqlExtDAO2 extends TblSubdomainAccountsMySqlDAO2{

	public function insertData($tblSubdomainAccount){
		$sql = 'INSERT INTO tbl_subdomain_accounts (id, username, subdomain, `database`, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblSubdomainAccount->id);
		$sqlQuery->set($tblSubdomainAccount->username);
		$sqlQuery->set($tblSubdomainAccount->subdomain);
		$sqlQuery->set($tblSubdomainAccount->database);
		$sqlQuery->setNumber($tblSubdomainAccount->createdBy);
		$sqlQuery->setNumber($tblSubdomainAccount->modifiedBy);
		$sqlQuery->set($tblSubdomainAccount->dateCreated);
		$sqlQuery->set($tblSubdomainAccount->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblSubdomainAccount->id = $id;
		return $id;
	}
}
?>