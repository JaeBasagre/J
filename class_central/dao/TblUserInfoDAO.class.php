<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
interface TblUserInfoDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblUserInfo 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param tblUserInfo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUserInfo tblUserInfo
 	 */
	public function insert($tblUserInfo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUserInfo tblUserInfo
 	 */
	public function update($tblUserInfo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByPositionId($value);

	public function queryByDepartmentId($value);

	public function queryByShiftId($value);

	public function queryByCompanyIdentification($value);

	public function queryByFname($value);

	public function queryByMname($value);

	public function queryByLname($value);

	public function queryByEmail($value);

	public function queryByUserDesc($value);

	public function queryByAssignedLocation($value);

	public function queryByEmploymentStatus($value);

	public function queryByEmployeeStatus($value);

	public function queryByDateHired($value);

	public function queryByDateRegularization($value);

	public function queryByDateResigned($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByUserId($value);

	public function deleteByPositionId($value);

	public function deleteByDepartmentId($value);

	public function deleteByShiftId($value);

	public function deleteByCompanyIdentification($value);

	public function deleteByFname($value);

	public function deleteByMname($value);

	public function deleteByLname($value);

	public function deleteByEmail($value);

	public function deleteByUserDesc($value);

	public function deleteByAssignedLocation($value);

	public function deleteByEmploymentStatus($value);

	public function deleteByEmployeeStatus($value);

	public function deleteByDateHired($value);

	public function deleteByDateRegularization($value);

	public function deleteByDateResigned($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>