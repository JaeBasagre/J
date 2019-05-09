<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
interface TblDepartmentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblDepartment 
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
 	 * @param tblDepartment primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblDepartment tblDepartment
 	 */
	public function insert($tblDepartment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblDepartment tblDepartment
 	 */
	public function update($tblDepartment);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDeptNo($value);

	public function queryByDepartment($value);

	public function queryByStatus($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByDeptNo($value);

	public function deleteByDepartment($value);

	public function deleteByStatus($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>