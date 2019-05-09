<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
interface TblDeviceDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblDevice 
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
 	 * @param tblDevice primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblDevice tblDevice
 	 */
	public function insert($tblDevice);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblDevice tblDevice
 	 */
	public function update($tblDevice);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByToken($value);

	public function queryByDomain($value);

	public function queryByDateCreated($value);

	public function queryByDateUpdated($value);


	public function deleteByUserId($value);

	public function deleteByToken($value);

	public function deleteByDomain($value);

	public function deleteByDateCreated($value);

	public function deleteByDateUpdated($value);


}
?>