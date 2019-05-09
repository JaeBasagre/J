<?php
/**
 * Class that operate on table 'tbl_department'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
class TblDepartmentMySqlDAO implements TblDepartmentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblDepartmentMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_department WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_department';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_department ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblDepartment primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_department WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblDepartmentMySql tblDepartment
 	 */
	public function insert($tblDepartment){
		$sql = 'INSERT INTO tbl_department (dept_no, department, status, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblDepartment->deptNo);
		$sqlQuery->set($tblDepartment->department);
		$sqlQuery->set($tblDepartment->status);
		$sqlQuery->setNumber($tblDepartment->createdBy);
		$sqlQuery->setNumber($tblDepartment->modifiedBy);
		$sqlQuery->set($tblDepartment->dateCreated);
		$sqlQuery->set($tblDepartment->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblDepartment->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblDepartmentMySql tblDepartment
 	 */
	public function update($tblDepartment){
		$sql = 'UPDATE tbl_department SET dept_no = ?, department = ?, status = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblDepartment->deptNo);
		$sqlQuery->set($tblDepartment->department);
		$sqlQuery->set($tblDepartment->status);
		$sqlQuery->setNumber($tblDepartment->createdBy);
		$sqlQuery->setNumber($tblDepartment->modifiedBy);
		$sqlQuery->set($tblDepartment->dateCreated);
		$sqlQuery->set($tblDepartment->dateModified);

		$sqlQuery->setNumber($tblDepartment->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_department';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDeptNo($value){
		$sql = 'SELECT * FROM tbl_department WHERE dept_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDepartment($value){
		$sql = 'SELECT * FROM tbl_department WHERE department = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_department WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_department WHERE created_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_department WHERE modified_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_department WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_department WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDeptNo($value){
		$sql = 'DELETE FROM tbl_department WHERE dept_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDepartment($value){
		$sql = 'DELETE FROM tbl_department WHERE department = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_department WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_department WHERE created_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_department WHERE modified_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_department WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_department WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblDepartmentMySql 
	 */
	protected function readRow($row){
		$tblDepartment = new TblDepartment();
		
		$tblDepartment->id = $row['id'];
		$tblDepartment->deptNo = $row['dept_no'];
		$tblDepartment->department = $row['department'];
		$tblDepartment->status = $row['status'];
		$tblDepartment->createdBy = $row['created_by'];
		$tblDepartment->modifiedBy = $row['modified_by'];
		$tblDepartment->dateCreated = $row['date_created'];
		$tblDepartment->dateModified = $row['date_modified'];

		return $tblDepartment;
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
	 * @return TblDepartmentMySql 
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