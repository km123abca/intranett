<head>
<link rel="stylesheet" type="text/css" href="kmstyles.css">
<script src='rogue.js'></script>

<h1 class='titlez'>Your Drafts Folder</h1>

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

				$filseries=getstat('drafts');
				$loc_filseries='drafts0.txt';
				$bflg=True;
				$checcker=-1;
				$reccount=0;
		
				while ($bflg)
					{
				$checcker+=1;
				if($checcker>100) $bflg=False;
				$loc_filseries='drafts'.$checcker.'.txt';

				if ($loc_filseries=='drafts0.txt') $loc_filseries='drafts.txt';
				if ($filseries==$loc_filseries) $bflg=False;
		        $rawdat=readdb($loc_filseries);
				foreach($rawdat as $line)
					{		
				$detailsArray=explode('#v#',$line);
				if($detailsArray[1]!=current_user()) continue;
				$reccount+=1;
		
					echo "<tr>";
					echo "<td>".$detailsArray[0]."</td>";
					echo "<td><a href='index.php?senter=$detailsArray[1]&subject=$detailsArray[2]&typ=draf&reccount=$reccount'>".$detailsArray[2]."</a>
		      			  <input type='checkbox' class='cb'>
		      			  </td>";
					echo "</tr>";
		
				
					}
        			}
		?>
		</table>
		<button type='button' onclick="delsel('dra')" >Delete Selected</button>
		</div>


</body>