<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$active_group = 'default';
$active_record = TRUE;

if (ENVIRINMENT == 'production') {
	$db['default']['hostname'] = 'us-iron-auto-dca-03-a.cleardb.net';
	$db['default']['username'] = 'b67b516a046d5a';
	$db['default']['password'] = 'b00fff02';
	$db['default']['database'] = 'heroku_c07fbb50ee446c6';
} else {
	$db['default']['hostname'] = 'us-iron-auto-dca-03-a.cleardb.net';
	$db['default']['username'] = 'b67b516a046d5a';
	$db['default']['password'] = 'b00fff02';
	$db['default']['database'] = 'heroku_c07fbb50ee446c6';
}

$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */