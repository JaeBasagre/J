<?php
/**
 * Class that operate on table 'tbl_time_altered_logs'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
class TblTimeAlteredLogsMySqlDAO2 implements TblTimeAlteredLogsDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblTimeAlteredLogsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_time_altered_logs WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_time_altered_logs';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_time_altered_logs ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblTimeAlteredLog primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_time_altered_logs WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTimeAlteredLogsMySql tblTimeAlteredLog
 	 */
	public function insert($tblTimeAlteredLog){
		$sql = 'INSERT INTO tbl_time_altered_logs (user_id, domain, prev_date, new_date, date_created, date_updated) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblTimeAlteredLog->userId);
		$sqlQuery->set($tblTimeAlteredLog->domain);
		$sqlQuery->set($tblTimeAlteredLog->prevDate);
		$sqlQuery->set($tblTimeAlteredLog->newDate);
		$sqlQuery->set($tblTimeAlteredLog->dateCreated);
		$sqlQuery->set($tblTimeAlteredLog->dateUpdated);

		$id = $this->executeInsert($sqlQuery);	
		$tblTimeAlteredLog->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTimeAlteredLogsMySql tblTimeAlteredLog
 	 */
	public function update($tblTimeAlteredLog){
		$sql = 'UPDATE tbl_time_altered_logs SET user_id = ?, domain = ?, prev_date = ?, new_date = ?, date_created = ?, date_updated = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblTimeAlteredLog->userId);
		$sqlQuery->set($tblTimeAlteredLog->domain);
		$sqlQuery->set($tblTimeAlteredLog->prevDate);
		$sqlQuery->set($tblTimeAlteredLog->newDate);
		$sqlQuery->set($tblTimeAlteredLog->dateCreated);
		$sqlQuery->set($tblTimeAlteredLog->dateUpdated);

		$sqlQuery->setNumber($tblTimeAlteredLog->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_time_altered_logs';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM tbl_time_altered_logs WHERE user_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDomain($value){
		$sql = 'SELECT * FROM tbl_time_altered_logs WHERE domain = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrevDate($value){
		$sql = 'SELECT * FROM tbl_time_altered_logs WHERE prev_date = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNewDate($value){
		$sql = 'SELECT * FROM tbl_time_altered_logs WHERE new_date = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_time_altered_logs WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateUpdated($value){
		$sql = 'SELECT * FROM tbl_time_altered_logs WHERE date_updated = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM tbl_time_altered_logs WHERE user_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDomain($value){
		$sql = 'DELETE FROM tbl_time_altered_logs WHERE domain = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrevDate($value){
		$sql = 'DELETE FROM tbl_time_altered_logs WHERE prev_date = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNewDate($value){
		$sql = 'DELETE FROM tbl_time_altered_logs WHERE new_date = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_time_altered_logs WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateUpdated($value){
		$sql = 'DELETE FROM tbl_time_altered_logs WHERE date_updated = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblTimeAlteredLogsMySql 
	 */
	protected function readRow($row){
		$tblTimeAlteredLog = new TblTimeAlteredLog2();
		
		$tblTimeAlteredLog->id = $row['id'];
		$tblTimeAlteredLog->userId = $row['user_id'];
		$tblTimeAlteredLog->domain = $row['domain'];
		$tblTimeAlteredLog->prevDate = $row['prev_date'];
		$tblTimeAlteredLog->newDate = $row['new_date'];
		$tblTimeAlteredLog->dateCreated = $row['date_created'];
		$tblTimeAlteredLog->dateUpdated = $row['date_updated'];

		return $tblTimeAlteredLog;
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
	 * @return TblTimeAlteredLogsMySql 
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