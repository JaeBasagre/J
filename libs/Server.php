<?php

	define('SERVERTYPE','local');
	define('URL', SERVERTYPE=='local' ? '/dev_dt.v3/' : '/');

	date_default_timezone_set('Asia/Taipei');

	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);
	
	define('DATABASE_HOST',SERVERTYPE == 'local' ? 'localhost' : 'localhost');
	define('DATABASE_USER',SERVERTYPE == 'local' ? 'root' : 'coroveo_user');
	define('DATABASE_PASS',SERVERTYPE == 'local' ? '' : 'coroveo-123');

	define('DATABASE_NAME_CENTRAL',SERVERTYPE == 'local' ? 'dt_main_09172018' : 'coroveo__test_dt_main_v3');

	define('DB_PREFIX', SERVERTYPE == 'test' ? '_test_' : 'dashsucc_');
	define('DB_PREFIX_DT', SERVERTYPE == 'test' ? '_test_' : 'dashtito_');

	define('DOMAIN', SERVERTYPE == 'local' ? 'localhost/dev_ds.v3_v2' : (SERVERTYPE == 'test' ? 'test-dashsuccess-main-v3.coroveo.com' : (SERVERTYPE == 'live' ? 'dashsuccess.com' : '')));
	define('DOMAIN_DT', SERVERTYPE == 'local' ? 'localhost/dev_dt.v3' : (SERVERTYPE == 'test' ? 'test-dashtito-main-v3.coroveo.com' : (SERVERTYPE == 'live' ? 'dashtito.com' : '')));
	
	define('MOBILESYNCLINK', SERVERTYPE == 'local' ? 'http://192.168.114/mobile-dashtito.v3/entries/syncEntryToMobile' : (SERVERTYPE == 'test' ? 'http://test-dashtito-mobile-v3.coroveo.com/entries/syncEntryToMobile' : (SERVERTYPE == 'live' ? 'http://dashtito.com/entries/syncEntryToMobile': '')));

	if(SERVERTYPE=='local'){
		define('DATABASE_NAME', 'dashtito_for_agm');
	} else if($_SERVER['HTTP_HOST']!=DOMAIN) {
		$serverhost = explode('.',$_SERVER['HTTP_HOST']);
		$connprefix = SERVERTYPE == 'test' ? 'coroveo_' : '';
	    define('DATABASE_NAME', $connprefix.DB_PREFIX.'dtv3_for_'.$serverhost[0]);
	}

	$domain = explode('.',$_SERVER['HTTP_HOST']);
	define('SUBDOMAIN',SERVERTYPE == 'local' ? 'local' : $domain[0]);

	define('PATH', SERVERTYPE == 'test' ? 'public_html/Test/dashtito/main/v3' : 'public_html/subdomains/mainv2');
