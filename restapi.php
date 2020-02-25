<?php
require_once('classes/dbutil.php');
require_once('classes/loader.php');
require_once('classes/config.php');
require_once('services/model.php');
$ret=array();
$db=new dbUtil(DBHOST,DBUSER,DBPASS,DBNAME);
	
$loader=null;
if(isset($_REQUEST['service']) && isset($_REQUEST['proc'])){
	$loader=new loader();
	$loader->load($_REQUEST['service'],$_REQUEST['proc']);
	echo json_encode($ret);
	die();
}
echo 'variables https not defined';
?>
