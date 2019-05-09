<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
interface TblUpdateDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblUpdate 
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
 	 * @param tblUpdate primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUpdate tblUpdate
 	 */
	public function insert($tblUpdate);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUpdate tblUpdate
 	 */
	public function update($tblUpdate);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLink($value);

	public function queryByVersionCode($value);

	public function queryByVersionName($value);

	public function queryByType($value);

	public function queryByPosted($value);

	public function queryByDateUploaded($value);

	public function queryByDatePosted($value);


	public function deleteByLink($value);

	public function deleteByVersionCode($value);

	public function deleteByVersionName($value);

	public function deleteByType($value);

	public function deleteByPosted($value);

	public function deleteByDateUploaded($value);

	public function deleteByDatePosted($value);


}
?>