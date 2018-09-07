<?php
/*
function store2db($contentt,$fil="statstore.txt")
  {
    $fil='boxes/'.$fil;
  $file_save=fopen($fil,"w+");
  flock($file_save,LOCK_EX);
  fputs($file_save,$contentt."\n");
  
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }


function readdb($fil="statstore.txt")
	{
    $fil='boxes/'.$fil;
		$entire_file=file($fil,FILE_IGNORE_NEW_LINES);
		return $entire_file;
	}
  */
include_once('phpfuncs.php');
$stat='none';
if ( isset($_REQUEST['stat']) ) 
	$stat=$_REQUEST['stat'];
update_staz($stat);
echo 'store is successful';


?>