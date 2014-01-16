<?php
//exit("test");
$f3=require('framework/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

$f3->config('api/configs/config.ini');
$f3->config('api/configs/routes.ini');

$f3->route('GET /',
	function($f3) {
		$data = array('Nom' => 'Erbin');
		Api::response(200, $data);
	}
);

$f3->run();
