<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Receptkonsol',
	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=receptdb',
			'emulatePrepare' => true,
			'username' => 'recept',
			'password' => 'receptlosen',
			'charset' => 'utf8',
		),
	),
);
