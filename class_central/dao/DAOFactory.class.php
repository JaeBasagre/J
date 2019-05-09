<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory2{
	
	/**
	 * @return TblCityDAO
	 */
	public static function getTblCityDAO(){
		return new TblCityMySqlExtDAO2();
	}

	/**
	 * @return TblCompanyDAO
	 */
	public static function getTblCompanyDAO(){
		return new TblCompanyMySqlExtDAO2();
	}

	/**
	 * @return TblCompanyPerDeptDAO
	 */
	public static function getTblCompanyPerDeptDAO(){
		return new TblCompanyPerDeptMySqlExtDAO2();
	}

	/**
	 * @return TblDepartmentDAO
	 */
	public static function getTblDepartmentDAO(){
		return new TblDepartmentMySqlExtDAO2();
	}

	/**
	 * @return TblDeviceDAO
	 */
	public static function getTblDeviceDAO(){
		return new TblDeviceMySqlExtDAO2();
	}

	/**
	 * @return TblEmployeeStatusDAO
	 */
	public static function getTblEmployeeStatusDAO(){
		return new TblEmployeeStatusMySqlExtDAO2();
	}

	/**
	 * @return TblEmploymentStatusDAO
	 */
	public static function getTblEmploymentStatusDAO(){
		return new TblEmploymentStatusMySqlExtDAO2();
	}

	/**
	 * @return TblPositionDAO
	 */
	public static function getTblPositionDAO(){
		return new TblPositionMySqlExtDAO2();
	}

	/**
	 * @return TblProvincesDAO
	 */
	public static function getTblProvincesDAO(){
		return new TblProvincesMySqlExtDAO2();
	}

	/**
	 * @return TblShiftDAO
	 */
	public static function getTblShiftDAO(){
		return new TblShiftMySqlExtDAO2();
	}

	/**
	 * @return TblSubdomainAccountsDAO
	 */
	public static function getTblSubdomainAccountsDAO(){
		return new TblSubdomainAccountsMySqlExtDAO2();
	}

	/**
	 * @return TblTimeAlteredLogsDAO
	 */
	public static function getTblTimeAlteredLogsDAO(){
		return new TblTimeAlteredLogsMySqlExtDAO2();
	}

	/**
	 * @return TblTimeEntriesDAO
	 */
	public static function getTblTimeEntriesDAO(){
		return new TblTimeEntriesMySqlExtDAO2();
	}

	/**
	 * @return TblUpdateDAO
	 */
	public static function getTblUpdateDAO(){
		return new TblUpdateMySqlExtDAO2();
	}

	/**
	 * @return TblUserDAO
	 */
	public static function getTblUserDAO(){
		return new TblUserMySqlExtDAO2();
	}

	/**
	 * @return TblUserInfoDAO
	 */
	public static function getTblUserInfoDAO(){
		return new TblUserInfoMySqlExtDAO2();
	}

	/**
	 * @return TblUserScheduleDAO
	 */
	public static function getTblUserScheduleDAO(){
		return new TblUserScheduleMySqlExtDAO2();
	}


}
?>