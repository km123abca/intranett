<?php       
include_once('phpfuncs.php');
if(!(checkloginn()))     RedirectToURL('login.php');
$senter_us=current_user(); 
//sanitizedb('debugind.txt');
//store2db($senter_us,'debugind.txt');

?>
<head>
  <title>Mail Server</title>
	<style>
	*
	{
	box-sizing:border-box;
	}
	.sample
	{
	width:100%;
	background-color: black;
	color: white;
	border:2px solid red;
	margin-bottom: : -30px;
	}
	.painted
	{
	background-color: #3a3b3d;
	}
	.composebox
	{
	 width:335px;
	 height: 544px;
	 background-color: white;
	 position: absolute;
	 right:3px;
	 bottom: 3px;
	 border:3px solid black;
	 display:none;
	 padding: none;
	 background-color:#97dbbd;
	}

	.tabinp
	{
	 width:100%;
	}
	tr
	{
		width:100%;
	}
	.labtd
	{
	 width:25%;
	}
	.labtdx
	{
	 width:100%;
	}
	.textd
	{
	 width:75%;
	}
	.bl
	{
		font-weight: bold;
	}
	</style>

<?php   include_once('headerr.php');?>

<script src='rogue.js'>var lp=0;	</script>

</head>


<body class='painted' >
<?php require_once('../iwfheader.php'); ?>
<?php    
   echo "<sidebox style='position:relative;float:left;height:700px'>";
	include_once('sidebar.php');
	 echo "</sidebox>";
	include_once('phpfuncs.php');

	$sid='inbox';
	if (  isset( $_REQUEST['sid'] )  )   
	$sid=$_REQUEST['sid'] ;
	if (isset($_REQUEST['senter']))
    {
    $typ='ibox';
    $senta=$_REQUEST['senter'];
    $subja=$_REQUEST['subject'];
    if(isset($_REQUEST['typ'])) $typ=$_REQUEST['typ'];
    include_once("individual_message.php");
    }
	else
    include_once($sid.".php");

?>

<div class='composebox' id='composebox'>
<form action="upload.php?sid=<?php echo $sid;?>" method="post" enctype="multipart/form-data">
<table id='he'>
    <tr>
    <td colspan="2" style="text-align: right;"> <a href="javascript:changevisb('composebox')">close</a></td>
    </tr>
	<tr>
		<td class='labtd'> Recepient: </td>
		<td class='textd'><input type='text' id='rp' name='rp' class='tabinp' value='<?php echo gpv('rp');?>' >  </td>
	</tr>

	<tr>
		<td class='labtd'> Subject: </td>
        <td class='textd'>
        <input type='text' id='sub' name='sub' class='tabinp' value='<?php echo gpv('sub');?>' style="width:100%;">  
        </td>
	</tr>

	<!--

	<tr>
		<td class='labtd'> Subject: </td>
		<td class='textd'><input type='text' id='sub' name='sub'  class='tabinp'>  </td>
	</tr>
  -->

	<tr>
		<td class='textd' colspan="2">
			<textarea rows="22" cols="37" id='textar' name='textar' ><?php echo readtex('tempconto.txt');?></textarea>
		</td>
	</tr>
     <?php special_clean('tempconto.txt');?>

    <!-- NEWLY ADDED ROWS FOR FILE UPLOADING    -->
	<tr>
		
		<td class='textd' colspan="2">
		    <?php
		    $linn='';$linna='';
		    if (isset($_REQUEST['linn'])) 
		    	{
		    		$linn=$_REQUEST['linn'];
		    		$linna="<a href='$linn' target='blank'>attachment</a>";
				}

		    ?>
		    <input type='text' id='atta_inv' style='position: absolute;display: none' value='<?php echo $linn;?>'>
			<div type='text' style="width:100%;border:1px solid black;" id='atta' name='atta' >
				<?php echo $linna;?>
			</div>

		</td>
	</tr>

	<tr>
	   <td class='textd' colspan="2">     
	     <!-- form loco -->
	   		
    		
    		<input type="file" name="fileToUpload" id="fileToUpload" class='labtdx' >
    		<input type="submit" value="Upload" name="submit" class='labtdx'>
			                         <!-- form loco -->
	   </td>
	</tr>
	<tr>
	    <td colspan="2">  

	    <button type='button' onclick="sentcont('<?php echo $senter_us;?>')">send</button> 
	    <button type='button' onclick="saveAsDraft('<?php echo $senter_us;?>')">save to drafts</button> 
	    </td>

	</tr> 
<!-- NEWLY ADDED ROWS FOR FILE UPLOADING    -->
</table>
</form> 
</div>
<script>
	document.getElementById('composebox').style.display=<?php  echo "'".find_staz()."'"; ?>;
</script>
</body>