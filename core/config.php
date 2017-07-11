<?php
	
	if(isset($_REQUEST['v']) && $_REQUEST['v'] == 'true') {
		define('TEMPLATE', 'main');	

	} else if(isset($_REQUEST['v']) && $_REQUEST['v'] == 'fnz') {
		define('TEMPLATE', 'examples/finanzas.template');	

	} else {
		header('Location: http://me.noehdez.info');
	}

	$app_base = strstr($_SERVER['HTTP_HOST'], 'localhost') ? 

	'http://localhost/uag/fnz-project' :    # DEVELOPMENT
	'https://noehdez.info/site';            # PRODUCTION

	define('APP_BASE', $app_base);
	define('JS_PATH', APP_BASE . '/js');
	define('CSS_PATH', APP_BASE . '/css');

	$global['app_base'] = APP_BASE;
	$global['template'] = TEMPLATE;