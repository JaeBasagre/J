<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-03-01 10:27
 */
interface TblTimeEntriesDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblTimeEntries 
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
 	 * @param tblTimeEntrie primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTimeEntries tblTimeEntrie
 	 */
	public function insert($tblTimeEntrie);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTimeEntries tblTimeEntrie
 	 */
	public function update($tblTimeEntrie);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByClient($value);

	public function queryByLocation($value);

	public function queryByIpAddress($value);

	public function queryByLocationAddress($value);

	public function queryByDeviceType($value);

	public function queryByLatitude($value);

	public function queryByLongitude($value);

	public function queryByIsSynced($value);

	public function queryByTime($value);

	public function queryByType($value);

	public function queryBySyncedDate($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByUserId($value);

	public function deleteByClient($value);

	public function deleteByLocation($value);

	public function deleteByIpAddress($value);

	public function deleteByLocationAddress($value);

	public function deleteByDeviceType($value);

	public function deleteByLatitude($value);

	public function deleteByLongitude($value);

	public function deleteByIsSynced($value);

	public function deleteByTime($value);

	public function deleteByType($value);

	public function deleteBySyncedDate($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>