<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
interface TblCompanyDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblCompany 
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
 	 * @param tblCompany primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblCompany tblCompany
 	 */
	public function insert($tblCompany);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblCompany tblCompany
 	 */
	public function update($tblCompany);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCompanyNo($value);

	public function queryByCompany($value);

	public function queryByStatus($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByCompanyNo($value);

	public function deleteByCompany($value);

	public function deleteByStatus($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>