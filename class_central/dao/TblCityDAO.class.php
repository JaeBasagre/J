<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
interface TblCityDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblCity 
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
 	 * @param tblCity primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblCity tblCity
 	 */
	public function insert($tblCity);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblCity tblCity
 	 */
	public function update($tblCity);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByProvinceId($value);

	public function queryByCity($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByProvinceId($value);

	public function deleteByCity($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>