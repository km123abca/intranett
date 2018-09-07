<?php 
include_once('phpfuncs.php');

if (  isset(  $_REQUEST['sto']  )  )
	{
$texToStore=$_REQUEST['sto'];
sanitizedb('debugJavascript.txt');
store2db($texToStore,'debugJavascript.txt');
	}



?>