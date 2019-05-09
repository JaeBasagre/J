<?php
/**
 * Class that operate on table 'tbl_time_entries'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 04:44
 */
class TblTimeEntriesMySqlExtDAO extends TblTimeEntriesMySqlDAO{

	function checkTimeEntryPerDate($date, $type, $id){
		$sql = "SELECT * FROM tbl_time_entries WHERE DATE(`time`) = '$date' AND type = '$type' AND user_id = $id";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	public function insertData($tblTimeEntrie){
		$sql = 'INSERT INTO tbl_time_entries (id, user_id, client, location, ip_address, location_address, device_type, latitude, longitude, `time`, type, synced_date, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);

		$sqlQuery->setNumber($tblTimeEntrie->id);
		$sqlQuery->setNumber($tblTimeEntrie->userId);
		$sqlQuery->set($tblTimeEntrie->client);
		$sqlQuery->set($tblTimeEntrie->location);
		$sqlQuery->set($tblTimeEntrie->ipAddress);
		$sqlQuery->set($tblTimeEntrie->locationAddress);
		$sqlQuery->set($tblTimeEntrie->deviceType);
		$sqlQuery->set($tblTimeEntrie->latitude);
		$sqlQuery->set($tblTimeEntrie->longitude);
		$sqlQuery->set($tblTimeEntrie->time);
		$sqlQuery->set($tblTimeEntrie->type);
		$sqlQuery->set($tblTimeEntrie->syncedDate);
		$sqlQuery->set($tblTimeEntrie->dateCreated);
		$sqlQuery->set($tblTimeEntrie->dateModified);

		$id = $this->executeInsert($sqlQuery);
		$tblTimeEntrie->id = $id;
		return $id;
	}
	public function getAttendance($userid, $from, $to){
		$sql = "
					SELECT
						tu.id user_id,
						timein.location time_in_loc,
						timein.client time_in_client,
						TIME(timein.time) time_in,
						DATE(timein.time) time_in_date,
						timein.synced_date time_in_sync,
						timeout.location time_out_loc,
						timeout.client time_out_client,
						TIME(timeout.time) time_out,
						DATE(timeout.time) time_out_date,
						timeout.synced_date time_put_sync
					FROM
						tbl_user tu
					INNER JOIN(
						SELECT
							user_id,
							DATE(time) date
						FROM
							tbl_time_entries
						WHERE
							user_id = $userid
						AND
							DATE(time) >= '$from' && DATE(time) <= '$to'
						GROUP BY
							DATE(time)
					) dateTrans
					ON dateTrans.user_id = tu.id 
					INNER JOIN
					(
						SELECT
							*
						FROM
							tbl_time_entries
						WHERE
							type = 'in'
					) timein
					ON dateTrans.date = DATE(timein.time) AND timein.user_id = dateTrans.user_id
					LEFT JOIN
					(
						SELECT
							*
						FROM
							tbl_time_entries
						WHERE
							type = 'out'
					) timeout
					ON dateTrans.date = DATE(timeout.time) AND timeout.user_id = dateTrans.user_id
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
	public function getAttendanceBetween($userid, $from, $to){
		$sql = "
			SELECT
				DATE(time) date,
				TIME(time) time,
				client,
				location
			FROM
				tbl_time_entries
			WHERE
				user_id = $userid
			AND
				type = 'between'
			AND
				DATE(time) >= '$from' && DATE(time) <= '$to'
		";
		$sqlQuery = new SqlQuery($sql);
		return QueryExecutor::execute($sqlQuery);
	}
}
?>
