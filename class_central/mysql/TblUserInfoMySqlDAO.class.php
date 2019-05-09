<?php
/**
 * Class that operate on table 'tbl_user_info'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
class TblUserInfoMySqlDAO2 implements TblUserInfoDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblUserInfoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_user_info WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_user_info';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_user_info ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblUserInfo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_user_info WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUserInfoMySql tblUserInfo
 	 */
	public function insert($tblUserInfo){
		$sql = 'INSERT INTO tbl_user_info (user_id, position_id, department_id, shift_id, company_identification, fname, mname, lname, email, user_desc, assigned_location, employment_status, employee_status, date_hired, date_regularization, date_resigned, created_by, modified_by, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblUserInfo->userId);
		$sqlQuery->setNumber($tblUserInfo->positionId);
		$sqlQuery->setNumber($tblUserInfo->departmentId);
		$sqlQuery->setNumber($tblUserInfo->shiftId);
		$sqlQuery->set($tblUserInfo->companyIdentification);
		$sqlQuery->set($tblUserInfo->fname);
		$sqlQuery->set($tblUserInfo->mname);
		$sqlQuery->set($tblUserInfo->lname);
		$sqlQuery->set($tblUserInfo->email);
		$sqlQuery->set($tblUserInfo->userDesc);
		$sqlQuery->setNumber($tblUserInfo->assignedLocation);
		$sqlQuery->setNumber($tblUserInfo->employmentStatus);
		$sqlQuery->setNumber($tblUserInfo->employeeStatus);
		$sqlQuery->set($tblUserInfo->dateHired);
		$sqlQuery->set($tblUserInfo->dateRegularization);
		$sqlQuery->set($tblUserInfo->dateResigned);
		$sqlQuery->setNumber($tblUserInfo->createdBy);
		$sqlQuery->setNumber($tblUserInfo->modifiedBy);
		$sqlQuery->set($tblUserInfo->dateCreated);
		$sqlQuery->set($tblUserInfo->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblUserInfo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUserInfoMySql tblUserInfo
 	 */
	public function update($tblUserInfo){
		$sql = 'UPDATE tbl_user_info SET user_id = ?, position_id = ?, department_id = ?, shift_id = ?, company_identification = ?, fname = ?, mname = ?, lname = ?, email = ?, user_desc = ?, assigned_location = ?, employment_status = ?, employee_status = ?, date_hired = ?, date_regularization = ?, date_resigned = ?, created_by = ?, modified_by = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblUserInfo->userId);
		$sqlQuery->setNumber($tblUserInfo->positionId);
		$sqlQuery->setNumber($tblUserInfo->departmentId);
		$sqlQuery->setNumber($tblUserInfo->shiftId);
		$sqlQuery->set($tblUserInfo->companyIdentification);
		$sqlQuery->set($tblUserInfo->fname);
		$sqlQuery->set($tblUserInfo->mname);
		$sqlQuery->set($tblUserInfo->lname);
		$sqlQuery->set($tblUserInfo->email);
		$sqlQuery->set($tblUserInfo->userDesc);
		$sqlQuery->setNumber($tblUserInfo->assignedLocation);
		$sqlQuery->setNumber($tblUserInfo->employmentStatus);
		$sqlQuery->setNumber($tblUserInfo->employeeStatus);
		$sqlQuery->set($tblUserInfo->dateHired);
		$sqlQuery->set($tblUserInfo->dateRegularization);
		$sqlQuery->set($tblUserInfo->dateResigned);
		$sqlQuery->setNumber($tblUserInfo->createdBy);
		$sqlQuery->setNumber($tblUserInfo->modifiedBy);
		$sqlQuery->set($tblUserInfo->dateCreated);
		$sqlQuery->set($tblUserInfo->dateModified);

		$sqlQuery->setNumber($tblUserInfo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_user_info';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE user_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPositionId($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE position_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDepartmentId($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE department_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByShiftId($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE shift_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCompanyIdentification($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE company_identification = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFname($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE fname = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMname($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE mname = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLname($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE lname = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE email = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserDesc($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE user_desc = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAssignedLocation($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE assigned_location = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmploymentStatus($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE employment_status = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmployeeStatus($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE employee_status = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateHired($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE date_hired = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateRegularization($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE date_regularization = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateResigned($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE date_resigned = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedBy($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModifiedBy($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_user_info WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM tbl_user_info WHERE user_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPositionId($value){
		$sql = 'DELETE FROM tbl_user_info WHERE position_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDepartmentId($value){
		$sql = 'DELETE FROM tbl_user_info WHERE department_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByShiftId($value){
		$sql = 'DELETE FROM tbl_user_info WHERE shift_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCompanyIdentification($value){
		$sql = 'DELETE FROM tbl_user_info WHERE company_identification = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFname($value){
		$sql = 'DELETE FROM tbl_user_info WHERE fname = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMname($value){
		$sql = 'DELETE FROM tbl_user_info WHERE mname = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLname($value){
		$sql = 'DELETE FROM tbl_user_info WHERE lname = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM tbl_user_info WHERE email = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserDesc($value){
		$sql = 'DELETE FROM tbl_user_info WHERE user_desc = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAssignedLocation($value){
		$sql = 'DELETE FROM tbl_user_info WHERE assigned_location = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmploymentStatus($value){
		$sql = 'DELETE FROM tbl_user_info WHERE employment_status = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmployeeStatus($value){
		$sql = 'DELETE FROM tbl_user_info WHERE employee_status = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateHired($value){
		$sql = 'DELETE FROM tbl_user_info WHERE date_hired = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateRegularization($value){
		$sql = 'DELETE FROM tbl_user_info WHERE date_regularization = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateResigned($value){
		$sql = 'DELETE FROM tbl_user_info WHERE date_resigned = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedBy($value){
		$sql = 'DELETE FROM tbl_user_info WHERE created_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModifiedBy($value){
		$sql = 'DELETE FROM tbl_user_info WHERE modified_by = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_user_info WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_user_info WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblUserInfoMySql 
	 */
	protected function readRow($row){
		$tblUserInfo = new TblUserInfo2();
		
		$tblUserInfo->id = $row['id'];
		$tblUserInfo->userId = $row['user_id'];
		$tblUserInfo->positionId = $row['position_id'];
		$tblUserInfo->departmentId = $row['department_id'];
		$tblUserInfo->shiftId = $row['shift_id'];
		$tblUserInfo->companyIdentification = $row['company_identification'];
		$tblUserInfo->fname = $row['fname'];
		$tblUserInfo->mname = $row['mname'];
		$tblUserInfo->lname = $row['lname'];
		$tblUserInfo->email = $row['email'];
		$tblUserInfo->userDesc = $row['user_desc'];
		$tblUserInfo->assignedLocation = $row['assigned_location'];
		$tblUserInfo->employmentStatus = $row['employment_status'];
		$tblUserInfo->employeeStatus = $row['employee_status'];
		$tblUserInfo->dateHired = $row['date_hired'];
		$tblUserInfo->dateRegularization = $row['date_regularization'];
		$tblUserInfo->dateResigned = $row['date_resigned'];
		$tblUserInfo->createdBy = $row['created_by'];
		$tblUserInfo->modifiedBy = $row['modified_by'];
		$tblUserInfo->dateCreated = $row['date_created'];
		$tblUserInfo->dateModified = $row['date_modified'];

		return $tblUserInfo;
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
	 * @return TblUserInfoMySql 
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