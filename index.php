<?php 
include_once 'php/newsroute.php';

/*echo '<pre>';
echo "\n".'$GLOBALS'."\n"; var_dump($GLOBALS);
echo "----------------------------------------------";
echo "\n".'$_SERVER'."\n"; var_dump($_SERVER);
echo "----------------------------------------------";
echo "\n".'$_GET'."\n"; var_dump($_GET);
echo "----------------------------------------------";
echo "\n".'$_POST'."\n"; var_dump($_POST);
echo "----------------------------------------------";
echo "\n".'$_FILES'."\n"; var_dump($_FILES);
echo "----------------------------------------------";
echo "\n".'$_REQUEST'."\n"; var_dump($_REQUEST);
echo "----------------------------------------------";
echo "\n".'$_SESSION'."\n"; var_dump($_SESSION);
echo "----------------------------------------------";
echo "\n".'$_ENV'."\n"; var_dump($_ENV);
echo "----------------------------------------------";
echo "\n".'$_COOKIE'."\n"; var_dump($_COOKIE);
echo "----------------------------------------------";
echo "\n".'$php_errormsg'."\n"; var_dump($php_errormsg);
echo "----------------------------------------------";
echo "\n".'$HTTP_RAW_POST_DATA'."\n"; var_dump($HTTP_RAW_POST_DATA);
echo "----------------------------------------------";
echo "\n".'$http_response_header'."\n"; var_dump($http_response_header);
echo "----------------------------------------------";
echo "\n".'$argc'."\n"; var_dump($argc);
echo "----------------------------------------------";
echo "\n".'$argv'."\n"; var_dump($argv);
echo "=============================================="."\n";
$s=$_SERVER['REQUEST_URI'];
echo $s."\n";
echo preg_replace('#\?.*$#', '',$s)."\n";
echo $_REQUEST['id'];
if (array_key_exists('id',$_REQUEST)) echo "y";
echo '</pre>';
*/
$r=new newsroute();
$r->work();