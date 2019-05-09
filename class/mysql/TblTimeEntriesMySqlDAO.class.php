<?php
/**
 * Class that operate on table 'tbl_time_entries'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-03-01 10:27
 */
class TblTimeEntriesMySqlDAO implements TblTimeEntriesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblTimeEntriesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_time_entries WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_time_entries';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_time_entries ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblTimeEntrie primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_time_entries WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblTimeEntriesMySql tblTimeEntrie
 	 */
	public function insert($tblTimeEntrie){
		$sql = 'INSERT INTO tbl_time_entries (user_id, client, location, ip_address, location_address, device_type, latitude, longitude, is_synced, time, type, synced_date, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTimeEntrie->userId);
		$sqlQuery->set($tblTimeEntrie->client);
		$sqlQuery->set($tblTimeEntrie->location);
		$sqlQuery->set($tblTimeEntrie->ipAddress);
		$sqlQuery->set($tblTimeEntrie->locationAddress);
		$sqlQuery->set($tblTimeEntrie->deviceType);
		$sqlQuery->set($tblTimeEntrie->latitude);
		$sqlQuery->set($tblTimeEntrie->longitude);
		$sqlQuery->set($tblTimeEntrie->isSynced);
		$sqlQuery->set($tblTimeEntrie->time);
		$sqlQuery->set($tblTimeEntrie->type);
		$sqlQuery->set($tblTimeEntrie->syncedDate);
		$sqlQuery->set($tblTimeEntrie->dateCreated);
		$sqlQuery->set($tblTimeEntrie->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblTimeEntrie->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblTimeEntriesMySql tblTimeEntrie
 	 */
	public function update($tblTimeEntrie){
		$sql = 'UPDATE tbl_time_entries SET user_id = ?, client = ?, location = ?, ip_address = ?, location_address = ?, device_type = ?, latitude = ?, longitude = ?, is_synced = ?, time = ?, type = ?, synced_date = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblTimeEntrie->userId);
		$sqlQuery->set($tblTimeEntrie->client);
		$sqlQuery->set($tblTimeEntrie->location);
		$sqlQuery->set($tblTimeEntrie->ipAddress);
		$sqlQuery->set($tblTimeEntrie->locationAddress);
		$sqlQuery->set($tblTimeEntrie->deviceType);
		$sqlQuery->set($tblTimeEntrie->latitude);
		$sqlQuery->set($tblTimeEntrie->longitude);
		$sqlQuery->set($tblTimeEntrie->isSynced);
		$sqlQuery->set($tblTimeEntrie->time);
		$sqlQuery->set($tblTimeEntrie->type);
		$sqlQuery->set($tblTimeEntrie->syncedDate);
		$sqlQuery->set($tblTimeEntrie->dateCreated);
		$sqlQuery->set($tblTimeEntrie->dateModified);

		$sqlQuery->setNumber($tblTimeEntrie->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_time_entries';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClient($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE client = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocation($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE location = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIpAddress($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE ip_address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocationAddress($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE location_address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeviceType($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE device_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatitude($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLongitude($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsSynced($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE is_synced = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTime($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySyncedDate($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE synced_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_time_entries WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClient($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE client = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocation($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE location = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIpAddress($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE ip_address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocationAddress($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE location_address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeviceType($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE device_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatitude($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE latitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLongitude($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE longitude = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsSynced($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE is_synced = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTime($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySyncedDate($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE synced_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_time_entries WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblTimeEntriesMySql 
	 */
	protected function readRow($row){
		$tblTimeEntrie = new TblTimeEntrie();
		
		$tblTimeEntrie->id = $row['id'];
		$tblTimeEntrie->userId = $row['user_id'];
		$tblTimeEntrie->client = $row['client'];
		$tblTimeEntrie->location = $row['location'];
		$tblTimeEntrie->ipAddress = $row['ip_address'];
		$tblTimeEntrie->locationAddress = $row['location_address'];
		$tblTimeEntrie->deviceType = $row['device_type'];
		$tblTimeEntrie->latitude = $row['latitude'];
		$tblTimeEntrie->longitude = $row['longitude'];
		$tblTimeEntrie->isSynced = $row['is_synced'];
		$tblTimeEntrie->time = $row['time'];
		$tblTimeEntrie->type = $row['type'];
		$tblTimeEntrie->syncedDate = $row['synced_date'];
		$tblTimeEntrie->dateCreated = $row['date_created'];
		$tblTimeEntrie->dateModified = $row['date_modified'];

		return $tblTimeEntrie;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TblTimeEntriesMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>