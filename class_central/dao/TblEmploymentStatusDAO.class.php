<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
interface TblEmploymentStatusDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblEmploymentStatus 
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
 	 * @param tblEmploymentStatu primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblEmploymentStatus tblEmploymentStatu
 	 */
	public function insert($tblEmploymentStatu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblEmploymentStatus tblEmploymentStatu
 	 */
	public function update($tblEmploymentStatu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEmploymenNo($value);

	public function queryByEmployment($value);

	public function queryByStatus($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByEmploymenNo($value);

	public function deleteByEmployment($value);

	public function deleteByStatus($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>