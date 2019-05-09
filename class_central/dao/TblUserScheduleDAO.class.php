<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 13:43
 */
interface TblUserScheduleDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblUserSchedule 
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
 	 * @param tblUserSchedule primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUserSchedule tblUserSchedule
 	 */
	public function insert($tblUserSchedule);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUserSchedule tblUserSchedule
 	 */
	public function update($tblUserSchedule);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByTimeIn($value);

	public function queryByTimeOut($value);

	public function queryBySchedType($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByUserId($value);

	public function deleteByTimeIn($value);

	public function deleteByTimeOut($value);

	public function deleteBySchedType($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>