<?php
/**
 * Class that operate on table 'tbl_subdomain_accounts'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
class TblSubdomainAccountsMySqlDAO2 implements TblSubdomainAccountsDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblSubdomainAccountsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_subdomain_accounts WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_subdomain_accounts';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_subdomain_accounts ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblSubdomainAccount primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_subdomain_accounts WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblSubdomainAccountsMySql tblSubdomainAccount
 	 */
	public function insert($tblSubdomainAccount){
		$sql = 'INSERT INTO tbl_subdomain_accounts (username, subdomain, `database`, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
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
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblSubdomainAccountsMySql tblSubdomainAccount
 	 */
	public function update($tblSubdomainAccount){
		$sql = 'UPDATE tbl_subdomain_accounts SET username = ?, subdomain = ?, `database` = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->set($tblSubdomainAccount->username);
		$sqlQuery->set($tblSubdomainAccount->subdomain);
		$sqlQuery->set($tblSubdomainAccount->database);
		$sqlQuery->setNumber($tblSubdomainAccount->createdBy);
		$sqlQuery->setNumber($tblSubdomainAccount->modifiedBy);
		$sqlQuery->set($tblSubdomainAccount->dateCreated);
		$sqlQuery->set($tblSubdomainAccount->dateModified);

		$sqlQuery->setNumber($tblSubdomainAccount->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_subdomain_accounts';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM tbl_subdomain_accounts WHERE username = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubdomain($value){
		$sql = 'SELECT * FROM tbl_subdomain_accounts WHERE subdomain = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatabase($value){
		$sql = 'SELECT * FROM tbl_subdomain_accounts WHERE database = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_subdomain_accounts WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_subdomain_accounts WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_subdomain_accounts WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_subdomain_accounts WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsername($value){
		$sql = 'DELETE FROM tbl_subdomain_accounts WHERE username = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubdomain($value){
		$sql = 'DELETE FROM tbl_subdomain_accounts WHERE subdomain = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatabase($value){
		$sql = 'DELETE FROM tbl_subdomain_accounts WHERE database = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_subdomain_accounts WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_subdomain_accounts WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_subdomain_accounts WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_subdomain_accounts WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblSubdomainAccountsMySql 
	 */
	protected function readRow($row){
		$tblSubdomainAccount = new TblSubdomainAccount2();
		
		$tblSubdomainAccount->id = $row['id'];
		$tblSubdomainAccount->username = $row['username'];
		$tblSubdomainAccount->subdomain = $row['subdomain'];
		$tblSubdomainAccount->database = $row['database'];
		$tblSubdomainAccount->createdBy = $row['created_by'];
		$tblSubdomainAccount->modifiedBy = $row['modified_by'];
		$tblSubdomainAccount->dateCreated = $row['date_created'];
		$tblSubdomainAccount->dateModified = $row['date_modified'];

		return $tblSubdomainAccount;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor2::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TblSubdomainAccountsMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor2::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor2::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor2::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor2::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor2::executeInsert($sqlQuery);
	}
}
?>