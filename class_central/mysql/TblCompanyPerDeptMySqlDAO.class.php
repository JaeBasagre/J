<?php
/**
 * Class that operate on table 'tbl_company_per_dept'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
class TblCompanyPerDeptMySqlDAO2 implements TblCompanyPerDeptDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblCompanyPerDeptMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_company_per_dept WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_company_per_dept';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_company_per_dept ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblCompanyPerDept primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_company_per_dept WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblCompanyPerDeptMySql tblCompanyPerDept
 	 */
	public function insert($tblCompanyPerDept){
		$sql = 'INSERT INTO tbl_company_per_dept (company_id, department_id, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblCompanyPerDept->companyId);
		$sqlQuery->setNumber($tblCompanyPerDept->departmentId);
		$sqlQuery->setNumber($tblCompanyPerDept->createdBy);
		$sqlQuery->setNumber($tblCompanyPerDept->modifiedBy);
		$sqlQuery->set($tblCompanyPerDept->dateCreated);
		$sqlQuery->set($tblCompanyPerDept->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblCompanyPerDept->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblCompanyPerDeptMySql tblCompanyPerDept
 	 */
	public function update($tblCompanyPerDept){
		$sql = 'UPDATE tbl_company_per_dept SET company_id = ?, department_id = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblCompanyPerDept->companyId);
		$sqlQuery->setNumber($tblCompanyPerDept->departmentId);
		$sqlQuery->setNumber($tblCompanyPerDept->createdBy);
		$sqlQuery->setNumber($tblCompanyPerDept->modifiedBy);
		$sqlQuery->set($tblCompanyPerDept->dateCreated);
		$sqlQuery->set($tblCompanyPerDept->dateModified);

		$sqlQuery->setNumber($tblCompanyPerDept->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_company_per_dept';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCompanyId($value){
		$sql = 'SELECT * FROM tbl_company_per_dept WHERE company_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDepartmentId($value){
		$sql = 'SELECT * FROM tbl_company_per_dept WHERE department_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_company_per_dept WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_company_per_dept WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_company_per_dept WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_company_per_dept WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCompanyId($value){
		$sql = 'DELETE FROM tbl_company_per_dept WHERE company_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDepartmentId($value){
		$sql = 'DELETE FROM tbl_company_per_dept WHERE department_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_company_per_dept WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_company_per_dept WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_company_per_dept WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_company_per_dept WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblCompanyPerDeptMySql 
	 */
	protected function readRow($row){
		$tblCompanyPerDept = new TblCompanyPerDept2();
		
		$tblCompanyPerDept->id = $row['id'];
		$tblCompanyPerDept->companyId = $row['company_id'];
		$tblCompanyPerDept->departmentId = $row['department_id'];
		$tblCompanyPerDept->createdBy = $row['created_by'];
		$tblCompanyPerDept->modifiedBy = $row['modified_by'];
		$tblCompanyPerDept->dateCreated = $row['date_created'];
		$tblCompanyPerDept->dateModified = $row['date_modified'];

		return $tblCompanyPerDept;
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
	 * @return TblCompanyPerDeptMySql 
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