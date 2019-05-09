<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
interface TblEmployeeStatusDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblEmployeeStatus 
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
 	 * @param tblEmployeeStatu primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblEmployeeStatus tblEmployeeStatu
 	 */
	public function insert($tblEmployeeStatu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblEmployeeStatus tblEmployeeStatu
 	 */
	public function update($tblEmployeeStatu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEmpstatusNo($value);

	public function queryByEmpStatus($value);

	public function queryByStatus($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByEmpstatusNo($value);

	public function deleteByEmpStatus($value);

	public function deleteByStatus($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>