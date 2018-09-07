<head>
<script src='rogue.js'></script>

<script>

</script>
<style>
.bdchild
	{
		width:75%;
		height: 88%;
	}
.lab_local
	{
		font-weight: bold;
		color:white;
		width: 37%;
	}
.cont_local
	{
		color:white;
		width:37%;
	}
.hre
	{
		width:25%;
		color:white;
		font-weight: bold;
	}
</style>
</head>
<?php
include_once('phpfuncs.php');
$senter='Xerxes';
$subject='Persia';
$conto='When are we invading Rome Bruv';
if (isset($_REQUEST['senter']))
{
$senter=$_REQUEST['senter'];
$subject=$_REQUEST['subject'];
$reccount=0;
if (isset($_REQUEST['reccount']))
	$reccount=$_REQUEST['reccount'];
$typ='ibox';
if(isset($_REQUEST['typ'])) $typ=$_REQUEST['typ'];
if  ($senter!=current_user()) changesta($typ,$reccount);
switch($typ)
	{
		case 'ibox':
			$recsen='Senter:';
			$comm='reply';
			$fil2rd='inbox';
			break;
		case 'senti':
			$recsen='Recepient:';
			$comm='Sent another';
			$fil2rd='inbox';
			break;
		case 'draf':
			$recsen='Recepient:';
			$comm='Resend';
			$fil2rd='drafts';
			break;
	}

}
		
$reccount_local=0;
$filseries=getstat($fil2rd);

$bflg=True;
$checcker=-1;
while($bflg)
{   
	$checcker+=1;
	if($checcker>100) $bflg=False;
	$loc_filseries=$fil2rd.$checcker.'.txt';
	if ($loc_filseries=='inbox0.txt') $loc_filseries='inbox.txt';
	if ($loc_filseries=='drafts0.txt') $loc_filseries='drafts.txt';
	if ($filseries==$loc_filseries) $bflg=False;
	

foreach(readdb($loc_filseries) as $lin)
	{
$elems=explode('#v#',$lin);

if($typ=='ibox') if($elems[0]!=current_user()) continue;

if($typ=='senti') if($elems[1]!=current_user()) continue;

if($typ=='draf') if($elems[1]!=current_user()) continue;

$reccount_local+=1;
if ($reccount_local==$reccount)
			{
			$conto=$elems[3];
			$recc=$elems[0];
			$senter=$elems[1];
			$subject=$elems[2];
			$atta='no attachment';
			if (isset($elems[4])) if ($elems[4]!='') $atta="<a class='hre' href='$elems[4]' target=blank>attchment</a>";

		    }
	}

}

?>

<body>
	<div class='bdchild'>
	<b1 class='lab_local'> <?php  echo $recsen;?></b1> <b1 class='cont_local'> <?php  if ($recsen=='Senter:') echo $senter;else echo $recc;?> </b1> <br>
	<b1 class='lab_local'>Subject:</b1> <b1 class='cont_local'> <?php   echo $subject;?> </b1> <br>
	<textarea rows="32" cols="80"><?php   
									foreach (explode('zhinyat',$conto) as $elem)
	    							echo $elem."\n"; 
	    						  ?></textarea><br>
	
	
	<?php    echo $atta;?> <br>
	<?php $recc=($typ=='ibox')?$senter:$recc; ?>
<a href="javascript:reply_ready('<?php echo $recc;?>','<?php echo $subject;?>')"><b1 class='lab_local'> <?php  echo $comm;?></b1></a>

	</div>
</body>