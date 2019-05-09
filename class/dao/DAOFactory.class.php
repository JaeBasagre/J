<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return TblCityDAO
	 */
	public static function getTblCityDAO(){
		return new TblCityMySqlExtDAO();
	}

	/**
	 * @return TblCompanyDAO
	 */
	public static function getTblCompanyDAO(){
		return new TblCompanyMySqlExtDAO();
	}

	/**
	 * @return TblCompanyPerDeptDAO
	 */
	public static function getTblCompanyPerDeptDAO(){
		return new TblCompanyPerDeptMySqlExtDAO();
	}

	/**
	 * @return TblDepartmentDAO
	 */
	public static function getTblDepartmentDAO(){
		return new TblDepartmentMySqlExtDAO();
	}

	/**
	 * @return TblDeviceDAO
	 */
	public static function getTblDeviceDAO(){
		return new TblDeviceMySqlExtDAO();
	}

	/**
	 * @return TblEmployeeStatusDAO
	 */
	public static function getTblEmployeeStatusDAO(){
		return new TblEmployeeStatusMySqlExtDAO();
	}

	/**
	 * @return TblEmploymentStatusDAO
	 */
	public static function getTblEmploymentStatusDAO(){
		return new TblEmploymentStatusMySqlExtDAO();
	}

	/**
	 * @return TblPositionDAO
	 */
	public static function getTblPositionDAO(){
		return new TblPositionMySqlExtDAO();
	}

	/**
	 * @return TblProvincesDAO
	 */
	public static function getTblProvincesDAO(){
		return new TblProvincesMySqlExtDAO();
	}

	/**
	 * @return TblShiftDAO
	 */
	public static function getTblShiftDAO(){
		return new TblShiftMySqlExtDAO();
	}

	/**
	 * @return TblSubdomainAccountsDAO
	 */
	public static function getTblSubdomainAccountsDAO(){
		return new TblSubdomainAccountsMySqlExtDAO();
	}

	/**
	 * @return TblTimeAlteredLogsDAO
	 */
	public static function getTblTimeAlteredLogsDAO(){
		return new TblTimeAlteredLogsMySqlExtDAO();
	}

	/**
	 * @return TblTimeEntriesDAO
	 */
	public static function getTblTimeEntriesDAO(){
		return new TblTimeEntriesMySqlExtDAO();
	}

	/**
	 * @return TblUpdateDAO
	 */
	public static function getTblUpdateDAO(){
		return new TblUpdateMySqlExtDAO();
	}

	/**
	 * @return TblUserDAO
	 */
	public static function getTblUserDAO(){
		return new TblUserMySqlExtDAO();
	}

	/**
	 * @return TblUserInfoDAO
	 */
	public static function getTblUserInfoDAO(){
		return new TblUserInfoMySqlExtDAO();
	}

	/**
	 * @return TblUserScheduleDAO
	 */
	public static function getTblUserScheduleDAO(){
		return new TblUserScheduleMySqlExtDAO();
	}


}
?>