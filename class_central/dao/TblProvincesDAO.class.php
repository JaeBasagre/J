<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
interface TblProvincesDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblProvinces 
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
 	 * @param tblProvince primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblProvinces tblProvince
 	 */
	public function insert($tblProvince);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblProvinces tblProvince
 	 */
	public function update($tblProvince);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByProvince($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByProvince($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>