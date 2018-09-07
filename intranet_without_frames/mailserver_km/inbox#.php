<head>
<link rel="stylesheet" type="text/css" href="kmstyles.css">
<script src='rogue.js'></script>

<h1 class='titlez'>This is your Inbox</h1>

<style>
							table#t01 
							{
    						width:100%; 
    						background-color: #f1f1c1;
							}
							table #sen
							{
							width:25%;
							}
							table #sub
							{
							width:75%;
							}
							th
							{
							text-align: left;
							}
							table#t01 tr:nth-child(even) 
							{
    						background-color: #eee;
							}
							table#t01 tr:nth-child(odd) 
							{
    						background-color: #fff;
							}
							table#t01 th 
							{
    						color: white;
    						background-color: black;
							}


							/*

							.bdjune29
							{
							background-color:#8e8e6c;
							width:75%;
							height:82%;
							position:relative;
							float:left;
							}*/

</style>
</head>



<body >

		<div class='bdjune29'>
		<table id='t01'>
			<tr>
				<th id='sen'>Sender</th>
				<th>Subject</th>
			</tr>
		<?php
		include_once('phpfuncs.php');
		$rawdat=readdb();
		foreach ($rawdat as $elem)
			{
	   // store2db()
		//store2db($elem.'          ','debugg.txt');
			}
		$eind=0;
		$reccount=0;
		foreach($rawdat as $line)
			{
	    $s_eind='senter'.$eind;
	    $su_eind='subject'.$eind;
		$detailsArray=explode('#v#',$line);
		if (readdb('debugind.txt')[0]!=$detailsArray[0]) continue;
		$reccount+=1;
		//store2db($detailsArray[0].' '.$detailsArray[1].' '.$detailsArray[2].' '.$detailsArray[3].' ');
		//store2db('\n');
		echo "<tr>";
		echo "<td id='$s_eind'>".$detailsArray[1]."</td>";
		echo "<td>
		      <a href='index.php?senter=$detailsArray[1]&subject=$detailsArray[2]&reccount=$reccount' id='$su_eind'>".$detailsArray[2]."</a>
		      <input type='checkbox' class='cb'>
		      </td>";
		echo "</tr>";
		//store2db('received '.$detailsArray[1].' and '.$detailsArray[2].'\n','debugg.txt');
		$eind+=1;
				
			}

		?>
		</table>
		<button type='button' onclick='delsel()' >Delete Selected</button>

		</div>


</body>