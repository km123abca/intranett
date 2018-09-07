<?php 
include_once('phpfuncs.php');
if (!(checkloginn()))
{
	RedirectToURL('login.php');
}
?>