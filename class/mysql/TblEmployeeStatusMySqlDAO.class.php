<?php
/**
 * Class that operate on table 'tbl_employee_status'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
class TblEmployeeStatusMySqlDAO implements TblEmployeeStatusDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblEmployeeStatusMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_employee_status WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_employee_status';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_employee_status ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblEmployeeStatu primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_employee_status WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblEmployeeStatusMySql tblEmployeeStatu
 	 */
	public function insert($tblEmployeeStatu){
		$sql = 'INSERT INTO tbl_employee_status (empstatus_no, emp_status, status, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblEmployeeStatu->empstatusNo);
		$sqlQuery->set($tblEmployeeStatu->empStatus);
		$sqlQuery->set($tblEmployeeStatu->status);
		$sqlQuery->setNumber($tblEmployeeStatu->createdBy);
		$sqlQuery->setNumber($tblEmployeeStatu->modifiedBy);
		$sqlQuery->set($tblEmployeeStatu->dateCreated);
		$sqlQuery->set($tblEmployeeStatu->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblEmployeeStatu->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblEmployeeStatusMySql tblEmployeeStatu
 	 */
	public function update($tblEmployeeStatu){
		$sql = 'UPDATE tbl_employee_status SET empstatus_no = ?, emp_status = ?, status = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblEmployeeStatu->empstatusNo);
		$sqlQuery->set($tblEmployeeStatu->empStatus);
		$sqlQuery->set($tblEmployeeStatu->status);
		$sqlQuery->setNumber($tblEmployeeStatu->createdBy);
		$sqlQuery->setNumber($tblEmployeeStatu->modifiedBy);
		$sqlQuery->set($tblEmployeeStatu->dateCreated);
		$sqlQuery->set($tblEmployeeStatu->dateModified);

		$sqlQuery->setNumber($tblEmployeeStatu->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_employee_status';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEmpstatusNo($value){
		$sql = 'SELECT * FROM tbl_employee_status WHERE empstatus_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmpStatus($value){
		$sql = 'SELECT * FROM tbl_employee_status WHERE emp_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_employee_status WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_employee_status WHERE created_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_employee_status WHERE modified_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_employee_status WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_employee_status WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEmpstatusNo($value){
		$sql = 'DELETE FROM tbl_employee_status WHERE empstatus_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmpStatus($value){
		$sql = 'DELETE FROM tbl_employee_status WHERE emp_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_employee_status WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_employee_status WHERE created_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_employee_status WHERE modified_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_employee_status WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_employee_status WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblEmployeeStatusMySql 
	 */
	protected function readRow($row){
		$tblEmployeeStatu = new TblEmployeeStatu();
		
		$tblEmployeeStatu->id = $row['id'];
		$tblEmployeeStatu->empstatusNo = $row['empstatus_no'];
		$tblEmployeeStatu->empStatus = $row['emp_status'];
		$tblEmployeeStatu->status = $row['status'];
		$tblEmployeeStatu->createdBy = $row['created_by'];
		$tblEmployeeStatu->modifiedBy = $row['modified_by'];
		$tblEmployeeStatu->dateCreated = $row['date_created'];
		$tblEmployeeStatu->dateModified = $row['date_modified'];

		return $tblEmployeeStatu;
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
	 * @return TblEmployeeStatusMySql 
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