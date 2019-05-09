<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
interface TblCompanyPerDeptDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblCompanyPerDept 
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
 	 * @param tblCompanyPerDept primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblCompanyPerDept tblCompanyPerDept
 	 */
	public function insert($tblCompanyPerDept);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblCompanyPerDept tblCompanyPerDept
 	 */
	public function update($tblCompanyPerDept);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCompanyId($value);

	public function queryByDepartmentId($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByCompanyId($value);

	public function deleteByDepartmentId($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>