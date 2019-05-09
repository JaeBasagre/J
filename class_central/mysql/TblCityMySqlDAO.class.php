<?php
/**
 * Class that operate on table 'tbl_city'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
class TblCityMySqlDAO2 implements TblCityDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblCityMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_city WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_city';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_city ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblCity primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_city WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblCityMySql tblCity
 	 */
	public function insert($tblCity){
		$sql = 'INSERT INTO tbl_city (province_id, city, date_created, date_modified) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblCity->provinceId);
		$sqlQuery->set($tblCity->city);
		$sqlQuery->set($tblCity->dateCreated);
		$sqlQuery->set($tblCity->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblCity->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblCityMySql tblCity
 	 */
	public function update($tblCity){
		$sql = 'UPDATE tbl_city SET province_id = ?, city = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->setNumber($tblCity->provinceId);
		$sqlQuery->set($tblCity->city);
		$sqlQuery->set($tblCity->dateCreated);
		$sqlQuery->set($tblCity->dateModified);

		$sqlQuery->setNumber($tblCity->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_city';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProvinceId($value){
		$sql = 'SELECT * FROM tbl_city WHERE province_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCity($value){
		$sql = 'SELECT * FROM tbl_city WHERE city = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_city WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_city WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProvinceId($value){
		$sql = 'DELETE FROM tbl_city WHERE province_id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCity($value){
		$sql = 'DELETE FROM tbl_city WHERE city = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_city WHERE date_created = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_city WHERE date_modified = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblCityMySql 
	 */
	protected function readRow($row){
		$tblCity = new TblCity2();
		
		$tblCity->id = $row['id'];
		$tblCity->provinceId = $row['province_id'];
		$tblCity->city = $row['city'];
		$tblCity->dateCreated = $row['date_created'];
		$tblCity->dateModified = $row['date_modified'];

		return $tblCity;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor2::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TblCityMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor2::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor2::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor2::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor2::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor2::executeInsert($sqlQuery);
	}
}
?>