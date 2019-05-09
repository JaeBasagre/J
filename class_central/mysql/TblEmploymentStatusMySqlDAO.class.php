<?php
/**
 * Class that operate on table 'tbl_employment_status'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
class TblEmploymentStatusMySqlDAO2 implements TblEmploymentStatusDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblEmploymentStatusMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_employment_status WHERE id = ?';
		$sqlQuery = new Sql2Query($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_employment_status';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_employment_status ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblEmploymentStatu primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_employment_status WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblEmploymentStatusMySql tblEmploymentStatu
 	 */
	public function insert($tblEmploymentStatu){
		$sql = 'INSERT INTO tbl_employment_status (employmen_no, employment, status, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->set($tblEmploymentStatu->employmenNo);
		$sqlQuery->set($tblEmploymentStatu->employment);
		$sqlQuery->set($tblEmploymentStatu->status);
		$sqlQuery->setNumber($tblEmploymentStatu->createdBy);
		$sqlQuery->setNumber($tblEmploymentStatu->modifiedBy);
		$sqlQuery->set($tblEmploymentStatu->dateCreated);
		$sqlQuery->set($tblEmploymentStatu->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblEmploymentStatu->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblEmploymentStatusMySql tblEmploymentStatu
 	 */
	public function update($tblEmploymentStatu){
		$sql = 'UPDATE tbl_employment_status SET employmen_no = ?, employment = ?, status = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->set($tblEmploymentStatu->employmenNo);
		$sqlQuery->set($tblEmploymentStatu->employment);
		$sqlQuery->set($tblEmploymentStatu->status);
		$sqlQuery->setNumber($tblEmploymentStatu->createdBy);
		$sqlQuery->setNumber($tblEmploymentStatu->modifiedBy);
		$sqlQuery->set($tblEmploymentStatu->dateCreated);
		$sqlQuery->set($tblEmploymentStatu->dateModified);

		$sqlQuery->setNumber($tblEmploymentStatu->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_employment_status';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEmploymenNo($value){
		$sql = 'SELECT * FROM tbl_employment_status WHERE employmen_no = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmployment($value){
		$sql = 'SELECT * FROM tbl_employment_status WHERE employment = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM tbl_employment_status WHERE status = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_employment_status WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_employment_status WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_employment_status WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_employment_status WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEmploymenNo($value){
		$sql = 'DELETE FROM tbl_employment_status WHERE employmen_no = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmployment($value){
		$sql = 'DELETE FROM tbl_employment_status WHERE employment = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM tbl_employment_status WHERE status = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_employment_status WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_employment_status WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_employment_status WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_employment_status WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblEmploymentStatusMySql 
	 */
	protected function readRow($row){
		$tblEmploymentStatu = new TblEmploymentStatu2();
		
		$tblEmploymentStatu->id = $row['id'];
		$tblEmploymentStatu->employmenNo = $row['employmen_no'];
		$tblEmploymentStatu->employment = $row['employment'];
		$tblEmploymentStatu->status = $row['status'];
		$tblEmploymentStatu->createdBy = $row['created_by'];
		$tblEmploymentStatu->modifiedBy = $row['modified_by'];
		$tblEmploymentStatu->dateCreated = $row['date_created'];
		$tblEmploymentStatu->dateModified = $row['date_modified'];

		return $tblEmploymentStatu;
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
	 * @return TblEmploymentStatusMySql 
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