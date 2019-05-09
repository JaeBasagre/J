<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
interface TblSubdomainAccountsDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblSubdomainAccounts 
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
 	 * @param tblSubdomainAccount primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblSubdomainAccounts tblSubdomainAccount
 	 */
	public function insert($tblSubdomainAccount);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblSubdomainAccounts tblSubdomainAccount
 	 */
	public function update($tblSubdomainAccount);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsername($value);

	public function queryBySubdomain($value);

	public function queryByDatabase($value);

	public function queryByCreatedBy($value);

	public function queryByModifiedBy($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByUsername($value);

	public function deleteBySubdomain($value);

	public function deleteByDatabase($value);

	public function deleteByCreatedBy($value);

	public function deleteByModifiedBy($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>