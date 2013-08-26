<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(

'default' => array(
		'type'			=> 'mysql',
		'connection'	=> array(
			'hostname'		=> $_SERVER['DB1_HOST'],
			'username'		=> $_SERVER['DB1_USER'],
			'password'		=> $_SERVER['DB1_PASS'],
			'database'		=> $_SERVER['DB1_NAME'],
			'persistent'	=> false,
			'port'			=> $_SERVER['DB1_PORT']
		),
		'identifier'	=> '`',
		'table_prefix'	=> '',
		'charset'		=> 'utf8',
		'enable_cache'	=> true,
		'profiling'		=> false,
	
	),
);
