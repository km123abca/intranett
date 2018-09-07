<?php include_once('chklog.php');  ?>
<head>
<script>
	function store()
		{
			var u=document.getElementById('u').value;
			var p=document.getElementById('p').value;
			window.location.href='populatelogin.php?sto=yes&u='+u+'&p='+p;
		}
	function re()
		{
			
			window.location.href='populatelogin.php';
		}
</script>
<style>
.fin
{
	color:red;
	font-weight: bold;
	font-family: Tahoma;
	font-size: 36px;
	float: left;
	clear:both;

}
</style>
</head>


<body>
<legend>Enter Username and Password</legend>
<fieldset>
	Username:<input type='text' id='u'> 
	Password:<input type='text' id='p'>
	<button type='button' onclick='store()'>store</button>
</fieldset>

<?php
include_once('phpfuncs.php');
if (isset($_REQUEST['u']))
	{
$u=$_REQUEST['u'];
$p=$_REQUEST['p'];
if(empty($u)) die("<b class='fin'>Username cant be empty</b>");
if(empty($p)) die("<b class='fin'>Password cant be empty</b>");
store2db($u.'#v#'.$p,'logindets.txt');
echo "<b class='fin'>Stored Successfully</b><button type='button' onclick='re()'>ok</button>";
	}

?>
</body>