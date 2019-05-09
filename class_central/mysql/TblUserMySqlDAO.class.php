<?php
/**
 * Class that operate on table 'tbl_user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
class TblUserMySqlDAO2 implements TblUserDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblUserMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_user WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_user';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_user ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblUser primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_user WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUserMySql tblUser
 	 */
	public function insert($tblUser){
		$sql = 'INSERT INTO tbl_user (username, password, user_type, subdomain, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
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
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUserMySql tblUser
 	 */
	public function update($tblUser){
		$sql = 'UPDATE tbl_user SET username = ?, password = ?, user_type = ?, subdomain = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->set($tblUser->username);
		$sqlQuery->set($tblUser->password);
		$sqlQuery->set($tblUser->userType);
		$sqlQuery->setNumber($tblUser->subdomain);
		$sqlQuery->setNumber($tblUser->createdBy);
		$sqlQuery->setNumber($tblUser->modifiedBy);
		$sqlQuery->set($tblUser->dateCreated);
		$sqlQuery->set($tblUser->dateModified);

		$sqlQuery->setNumber($tblUser->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_user';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM tbl_user WHERE username = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM tbl_user WHERE password = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserType($value){
		$sql = 'SELECT * FROM tbl_user WHERE user_type = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubdomain($value){
		$sql = 'SELECT * FROM tbl_user WHERE subdomain = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_user WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_user WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_user WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_user WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsername($value){
		$sql = 'DELETE FROM tbl_user WHERE username = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM tbl_user WHERE password = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserType($value){
		$sql = 'DELETE FROM tbl_user WHERE user_type = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubdomain($value){
		$sql = 'DELETE FROM tbl_user WHERE subdomain = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_user WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_user WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_user WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_user WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblUserMySql 
	 */
	protected function readRow($row){
		$tblUser = new TblUser2();
		
		$tblUser->id = $row['id'];
		$tblUser->username = $row['username'];
		$tblUser->password = $row['password'];
		$tblUser->userType = $row['user_type'];
		$tblUser->subdomain = $row['subdomain'];
		$tblUser->createdBy = $row['created_by'];
		$tblUser->modifiedBy = $row['modified_by'];
		$tblUser->dateCreated = $row['date_created'];
		$tblUser->dateModified = $row['date_modified'];

		return $tblUser;
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
	 * @return TblUserMySql 
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