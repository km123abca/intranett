<?php      
include_once('./ag/mailserver_km/phpfuncs.php');
 if((checkloginn()))     RedirectToURL('./ag/mailserver_km/index.php'); ?>
<head>
<?php
$erruser="*";
$errpass="*";

?>
<style>
	*
	{box-sizing: border-box;}
     body
     {
     	background-color: #707175;
     	background-image: url('../scaniia.jpg');
     	background-size: cover;
     }
	.logincontainer
	{
		width:680px;
		height:140px;
		border:2px solid black;
		
		background-color: #5cef1c;

		left:25%;
		top:30%;
		position: relative;
	}
	
	.labl
	{	margin-top:10px;
		width:33%;
		float:left;
		text-align: center;
		color:white;
		font-weight: bold;
		position: relative;
	}
	.inpl
	{	margin-top:10px;
		width:33%;
		float:left;
	}
	.up
	{
		width:80%;
	}
	.warn
	{	border:2px solid #41683d;
		width:33%;
		float:left;
		margin-top:10px;
		font-weight: bold;
		color:red;
		visibility: hidden;
	}
</style>


<marquee scrolldelay='50' scrollamount='10' truespeed  style='background-color:black;font-size: 36;color:white;font-weight: bold;'  >
			Welcome to your Mail Box , Kindly Login using your credentials
			
			</marquee>

</head>


<body>
<div class='logincontainer'>
<form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class='labl'>Username:</span>  <span class='inpl'><input id='user' class='up' name='user' type='text'></span>
<span class='warn' id='uswarn'><?php  echo $erruser; ?></span>
<span class='labl'>Password:</span>   <span class='inpl'><input id='pass' class='up' name='pass' type='password'></span>
<span class='warn' id='paswarn'><?php  echo $errpass; ?></span>

<span class='labl' style='left:-9px;'><input type='submit' value='Login' id='submit' name='submit'></span>
</form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (isset($_POST['submit']))
	{
		if(empty($_POST['user']))
		{
			echo "<script>";
			echo "document.getElementById('uswarn').innerHTML='*username cant be empty';";
			echo "document.getElementById('uswarn').style.visibility='visible';";
			echo "</script>";
			die();
		}
		if(empty($_POST['pass']))
		{
			echo "<script>";
			echo "document.getElementById('paswarn').innerHTML='*password cant be empty';";
			echo "document.getElementById('paswarn').style.visibility='visible';";
			echo "</script>";
			die();
		}
		$user=test_input($_POST['user']);
		$pass=test_input($_POST['pass']);
		$flg=True;
		$loginok=False;
		foreach (readdb('logindets.txt') as $line)
		{$flg=False;
			$detarray=explode('#v#',$line);
			if(isset($detarray[1]))
			{
				if (($user==$detarray[0]) and ($pass==$detarray[1]))
					$loginok=True;
				else
					{
					echo "<script>";
					echo "document.getElementById('paswarn').innerHTML='*Wrong Password or Username';";
					echo "document.getElementById('paswarn').style.visibility='visible';";
					echo "</script>";
					}

			}
			else
				echo '<h1>no cant do</h1>';
		}
		if ($flg) die('no data');
		if ($loginok) 
			{	$localIP =get_client_ip();
				Recordlogin($user.'##v##'.md5($localIP));
				RedirectToURL('index.php');
			}		

	}
}

?>


<?php
function test_input($data) 
{ 
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>