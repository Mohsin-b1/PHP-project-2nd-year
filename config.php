<?PHP
error_reporting(0);
if(!isset($_SESSION))
session_start();
if(!defined('BASE_PATH'))
//define('BASE_PATH' , 'http://ish793.poseidon.salford.ac.uk/webdev/cmvc_social/');
define('BASE_PATH' , 'http://localhost/cmvc_social/');

if(!defined('SERVER_PATH'))
//define('SERVER_PATH' , $_SERVER['DOCUMENT_ROOT'].'/webdev/cmvc_social/');
define('SERVER_PATH' , $_SERVER['DOCUMENT_ROOT'].'/cmvc_social/');
