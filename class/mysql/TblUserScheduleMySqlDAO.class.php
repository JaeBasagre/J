<?php
/**
 * Class that operate on table 'tbl_user_schedule'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 13:43
 */
class TblUserScheduleMySqlDAO implements TblUserScheduleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblUserScheduleMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_user_schedule';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_user_schedule ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblUserSchedule primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_user_schedule WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUserScheduleMySql tblUserSchedule
 	 */
	public function insert($tblUserSchedule){
		$sql = 'INSERT INTO tbl_user_schedule (user_id, time_in, time_out, sched_type, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblUserSchedule->userId);
		$sqlQuery->set($tblUserSchedule->timeIn);
		$sqlQuery->set($tblUserSchedule->timeOut);
		$sqlQuery->set($tblUserSchedule->schedType);
		$sqlQuery->setNumber($tblUserSchedule->createdBy);
		$sqlQuery->setNumber($tblUserSchedule->modifiedBy);
		$sqlQuery->set($tblUserSchedule->dateCreated);
		$sqlQuery->set($tblUserSchedule->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblUserSchedule->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUserScheduleMySql tblUserSchedule
 	 */
	public function update($tblUserSchedule){
		$sql = 'UPDATE tbl_user_schedule SET user_id = ?, time_in = ?, time_out = ?, sched_type = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblUserSchedule->userId);
		$sqlQuery->set($tblUserSchedule->timeIn);
		$sqlQuery->set($tblUserSchedule->timeOut);
		$sqlQuery->set($tblUserSchedule->schedType);
		$sqlQuery->setNumber($tblUserSchedule->createdBy);
		$sqlQuery->setNumber($tblUserSchedule->modifiedBy);
		$sqlQuery->set($tblUserSchedule->dateCreated);
		$sqlQuery->set($tblUserSchedule->dateModified);

		$sqlQuery->setNumber($tblUserSchedule->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_user_schedule';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTimeIn($value){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE time_in = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTimeOut($value){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE time_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySchedType($value){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE sched_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE created_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE modified_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_user_schedule WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM tbl_user_schedule WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTimeIn($value){
		$sql = 'DELETE FROM tbl_user_schedule WHERE time_in = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTimeOut($value){
		$sql = 'DELETE FROM tbl_user_schedule WHERE time_out = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySchedType($value){
		$sql = 'DELETE FROM tbl_user_schedule WHERE sched_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_user_schedule WHERE created_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_user_schedule WHERE modified_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_user_schedule WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_user_schedule WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblUserScheduleMySql 
	 */
	protected function readRow($row){
		$tblUserSchedule = new TblUserSchedule();
		
		$tblUserSchedule->id = $row['id'];
		$tblUserSchedule->userId = $row['user_id'];
		$tblUserSchedule->timeIn = $row['time_in'];
		$tblUserSchedule->timeOut = $row['time_out'];
		$tblUserSchedule->schedType = $row['sched_type'];
		$tblUserSchedule->createdBy = $row['created_by'];
		$tblUserSchedule->modifiedBy = $row['modified_by'];
		$tblUserSchedule->dateCreated = $row['date_created'];
		$tblUserSchedule->dateModified = $row['date_modified'];

		return $tblUserSchedule;
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
	 * @return TblUserScheduleMySql 
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