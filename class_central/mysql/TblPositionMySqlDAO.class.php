<?php
/**
 * Class that operate on table 'tbl_position'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
class TblPositionMySqlDAO2 implements TblPositionDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblPositionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_position WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_position';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_position ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblPosition primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_position WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblPositionMySql tblPosition
 	 */
	public function insert($tblPosition){
		$sql = 'INSERT INTO tbl_position (position_no, position, status, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->set($tblPosition->positionNo);
		$sqlQuery->set($tblPosition->position);
		$sqlQuery->set($tblPosition->status);
		$sqlQuery->setNumber($tblPosition->createdBy);
		$sqlQuery->setNumber($tblPosition->modifiedBy);
		$sqlQuery->set($tblPosition->dateCreated);
		$sqlQuery->set($tblPosition->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblPosition->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblPositionMySql tblPosition
 	 */
	public function update($tblPosition){
		$sql = 'UPDATE tbl_position SET position_no = ?, position = ?, status = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->set($tblPosition->positionNo);
		$sqlQuery->set($tblPosition->position);
		$sqlQuery->set($tblPosition->status);
		$sqlQuery->setNumber($tblPosition->createdBy);
		$sqlQuery->setNumber($tblPosition->modifiedBy);
		$sqlQuery->set($tblPosition->dateCreated);
		$sqlQuery->set($tblPosition->dateModified);

		$sqlQuery->setNumber($tblPosition->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_position';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPositionNo($value){
		$sql = 'SELECT * FROM tbl_position WHERE position_no = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPosition($value){
		$sql = 'SELECT * FROM tbl_position WHERE position = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_position WHERE status = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_position WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_position WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_position WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_position WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPositionNo($value){
		$sql = 'DELETE FROM tbl_position WHERE position_no = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPosition($value){
		$sql = 'DELETE FROM tbl_position WHERE position = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_position WHERE status = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_position WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_position WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_position WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_position WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblPositionMySql 
	 */
	protected function readRow($row){
		$tblPosition = new TblPosition2();
		
		$tblPosition->id = $row['id'];
		$tblPosition->positionNo = $row['position_no'];
		$tblPosition->position = $row['position'];
		$tblPosition->status = $row['status'];
		$tblPosition->createdBy = $row['created_by'];
		$tblPosition->modifiedBy = $row['modified_by'];
		$tblPosition->dateCreated = $row['date_created'];
		$tblPosition->dateModified = $row['date_modified'];

		return $tblPosition;
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
	 * @return TblPositionMySql 
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