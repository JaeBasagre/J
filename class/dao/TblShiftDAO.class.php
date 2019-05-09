<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
interface TblShiftDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblShift 
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
 	 * @param tblShift primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblShift tblShift
 	 */
	public function insert($tblShift);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblShift tblShift
 	 */
	public function update($tblShift);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByShiftNo($value);

	public function queryByShift($value);

	public function queryByStatus($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByShiftNo($value);

	public function deleteByShift($value);

	public function deleteByStatus($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>