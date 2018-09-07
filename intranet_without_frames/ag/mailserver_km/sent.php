<head>
<link rel="stylesheet" type="text/css" href="kmstyles.css">
<script src='rogue.js'></script>

<h1 class='titlez'>Mail sent by you</h1>

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

							.bdjune29
							{
							background-color:#8e8e6c;
							width:75%;
							height:82%;
							position:relative;
							float:left;
							}

</style>
</head>



<body >

		<div class='bdjune29'>
		<table id='t01'>
			<tr>
				<th id='sen'>Recepient</th>
				<th>Subject</th>
			</tr>
		<?php
		include_once('phpfuncs.php');


		$filseries=getstat('inbox');
		$loc_filseries='inbox0.txt';
		$bflg=True;
		$checcker=-1;
		$reccount=0;


		while ($bflg)
		{

		$checcker+=1;
		if($checcker>100) $bflg=False;
		$loc_filseries='inbox'.$checcker.'.txt';
		if ($loc_filseries=='inbox0.txt') $loc_filseries='inbox.txt';
		if ($filseries==$loc_filseries) $bflg=False;
		$rawdat=readdb($loc_filseries);

		foreach($rawdat as $line)
			{
		
		$detailsArray=explode('#v#',$line);
		if($detailsArray[1]!=current_user()) continue;
		$reccount+=1;
		//store2db($detailsArray[0].' '.$detailsArray[1].' '.$detailsArray[2].' '.$detailsArray[3].' ');
		//store2db('\n');
		echo "<tr>";
		echo "<td>".$detailsArray[0]."</td>";
		echo "<td><a href='index.php?senter=$detailsArray[1]&subject=$detailsArray[2]&typ=senti&reccount=$reccount'>".$detailsArray[2]."</a>
		    <input type='checkbox' class='cb'>
		      </td>";
		echo "</tr>";
		//store2db('received '.$detailsArray[1].' and '.$detailsArray[2].'\n','debugg.txt');
				
			}
		}

		?>
		</table>
		<button type='button' onclick="delsel('sentii')" >Delete Selected</button>
		</div>


</body>