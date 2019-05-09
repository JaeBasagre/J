<?php
/**
 * Class that operate on table 'tbl_device'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
class TblDeviceMySqlDAO implements TblDeviceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblDeviceMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_device WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_device';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_device ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblDevice primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_device WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblDeviceMySql tblDevice
 	 */
	public function insert($tblDevice){
		$sql = 'INSERT INTO tbl_device (user_id, token, domain, date_created, date_updated) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblDevice->userId);
		$sqlQuery->set($tblDevice->token);
		$sqlQuery->set($tblDevice->domain);
		$sqlQuery->set($tblDevice->dateCreated);
		$sqlQuery->set($tblDevice->dateUpdated);

		$id = $this->executeInsert($sqlQuery);	
		$tblDevice->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblDeviceMySql tblDevice
 	 */
	public function update($tblDevice){
		$sql = 'UPDATE tbl_device SET user_id = ?, token = ?, domain = ?, date_created = ?, date_updated = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblDevice->userId);
		$sqlQuery->set($tblDevice->token);
		$sqlQuery->set($tblDevice->domain);
		$sqlQuery->set($tblDevice->dateCreated);
		$sqlQuery->set($tblDevice->dateUpdated);

		$sqlQuery->setNumber($tblDevice->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_device';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM tbl_device WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByToken($value){
		$sql = 'SELECT * FROM tbl_device WHERE token = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDomain($value){
		$sql = 'SELECT * FROM tbl_device WHERE domain = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_device WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateUpdated($value){
		$sql = 'SELECT * FROM tbl_device WHERE date_updated = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM tbl_device WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByToken($value){
		$sql = 'DELETE FROM tbl_device WHERE token = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDomain($value){
		$sql = 'DELETE FROM tbl_device WHERE domain = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_device WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateUpdated($value){
		$sql = 'DELETE FROM tbl_device WHERE date_updated = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblDeviceMySql 
	 */
	protected function readRow($row){
		$tblDevice = new TblDevice();
		
		$tblDevice->id = $row['id'];
		$tblDevice->userId = $row['user_id'];
		$tblDevice->token = $row['token'];
		$tblDevice->domain = $row['domain'];
		$tblDevice->dateCreated = $row['date_created'];
		$tblDevice->dateUpdated = $row['date_updated'];

		return $tblDevice;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TblDeviceMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>