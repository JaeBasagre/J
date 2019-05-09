<?php
/**
 * Class that operate on table 'tbl_update'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-12 03:49
 */
class TblUpdateMySqlDAO2 implements TblUpdateDAO2{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblUpdateMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_update WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_update';
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_update ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery2($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblUpdate primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_update WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblUpdateMySql tblUpdate
 	 */
	public function insert($tblUpdate){
		$sql = 'INSERT INTO tbl_update (link, version_code, version_name, type, posted, date_uploaded, date_posted) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->set($tblUpdate->link);
		$sqlQuery->setNumber($tblUpdate->versionCode);
		$sqlQuery->set($tblUpdate->versionName);
		$sqlQuery->set($tblUpdate->type);
		$sqlQuery->set($tblUpdate->posted);
		$sqlQuery->set($tblUpdate->dateUploaded);
		$sqlQuery->set($tblUpdate->datePosted);

		$id = $this->executeInsert($sqlQuery);	
		$tblUpdate->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblUpdateMySql tblUpdate
 	 */
	public function update($tblUpdate){
		$sql = 'UPDATE tbl_update SET link = ?, version_code = ?, version_name = ?, type = ?, posted = ?, date_uploaded = ?, date_posted = ? WHERE id = ?';
		$sqlQuery = new SqlQuery2($sql);
		
		$sqlQuery->set($tblUpdate->link);
		$sqlQuery->setNumber($tblUpdate->versionCode);
		$sqlQuery->set($tblUpdate->versionName);
		$sqlQuery->set($tblUpdate->type);
		$sqlQuery->set($tblUpdate->posted);
		$sqlQuery->set($tblUpdate->dateUploaded);
		$sqlQuery->set($tblUpdate->datePosted);

		$sqlQuery->setNumber($tblUpdate->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_update';
		$sqlQuery = new SqlQuery2($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM tbl_update WHERE link = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVersionCode($value){
		$sql = 'SELECT * FROM tbl_update WHERE version_code = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVersionName($value){
		$sql = 'SELECT * FROM tbl_update WHERE version_name = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM tbl_update WHERE type = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPosted($value){
		$sql = 'SELECT * FROM tbl_update WHERE posted = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateUploaded($value){
		$sql = 'SELECT * FROM tbl_update WHERE date_uploaded = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatePosted($value){
		$sql = 'SELECT * FROM tbl_update WHERE date_posted = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLink($value){
		$sql = 'DELETE FROM tbl_update WHERE link = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVersionCode($value){
		$sql = 'DELETE FROM tbl_update WHERE version_code = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVersionName($value){
		$sql = 'DELETE FROM tbl_update WHERE version_name = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM tbl_update WHERE type = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPosted($value){
		$sql = 'DELETE FROM tbl_update WHERE posted = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateUploaded($value){
		$sql = 'DELETE FROM tbl_update WHERE date_uploaded = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatePosted($value){
		$sql = 'DELETE FROM tbl_update WHERE date_posted = ?';
		$sqlQuery = new SqlQuery2($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblUpdateMySql 
	 */
	protected function readRow($row){
		$tblUpdate = new TblUpdate2();
		
		$tblUpdate->id = $row['id'];
		$tblUpdate->link = $row['link'];
		$tblUpdate->versionCode = $row['version_code'];
		$tblUpdate->versionName = $row['version_name'];
		$tblUpdate->type = $row['type'];
		$tblUpdate->posted = $row['posted'];
		$tblUpdate->dateUploaded = $row['date_uploaded'];
		$tblUpdate->datePosted = $row['date_posted'];

		return $tblUpdate;
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
	 * @return TblUpdateMySql 
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