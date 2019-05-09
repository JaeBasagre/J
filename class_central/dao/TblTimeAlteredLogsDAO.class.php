<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
interface TblTimeAlteredLogsDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblTimeAlteredLogs 
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
 	 * @param tblTimeAlteredLog primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTimeAlteredLogs tblTimeAlteredLog
 	 */
	public function insert($tblTimeAlteredLog);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTimeAlteredLogs tblTimeAlteredLog
 	 */
	public function update($tblTimeAlteredLog);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByDomain($value);

	public function queryByPrevDate($value);

	public function queryByNewDate($value);

	public function queryByDateCreated($value);

	public function queryByDateUpdated($value);


	public function deleteByUserId($value);

	public function deleteByDomain($value);

	public function deleteByPrevDate($value);

	public function deleteByNewDate($value);

	public function deleteByDateCreated($value);

	public function deleteByDateUpdated($value);


}
?>