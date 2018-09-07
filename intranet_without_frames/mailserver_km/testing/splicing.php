<?php
include_once('phpfuncs.php');
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ho=getHostByName(getHostName());

//echo '<h1>current:'.$ho.':'.$_SERVER['SERVER_PORT'].'</h1>';

?>

<head>
<h1>your ip is <?php   echo get_client_ip();?> </h1>
<script>
	function gette()
		{
		var con=document.getElementById('textar').value;
		con=con.replace(/\n/g,'entra');
		alert(con);
		}
</script>
</head>


<body>
area: <textarea id='textar' cols=30 rows=12></textarea> <br> <br>
<button onclick='gette()'>Click Click</button>


</body>