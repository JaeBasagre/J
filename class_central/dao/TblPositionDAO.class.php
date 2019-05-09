<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
interface TblPositionDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblPosition 
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
 	 * @param tblPosition primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblPosition tblPosition
 	 */
	public function insert($tblPosition);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblPosition tblPosition
 	 */
	public function update($tblPosition);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPositionNo($value);

	public function queryByPosition($value);

	public function queryByStatus($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByPositionNo($value);

	public function deleteByPosition($value);

	public function deleteByStatus($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>