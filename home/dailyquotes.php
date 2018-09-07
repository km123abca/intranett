<head>

<style>
.tx
	{
		font-size:2em;
		font-style: italic;
		font-weight:bold;
	}

.qbox
	{
		border:2px solid black;
		width:60%;
		margin: auto;
		margin-top:10%;
		
	}

body
	{
		vertical-align: middle;

	}
	body
	{
		background-color: #6886b7;
	}

	.hqu
	{
	 width: 100%;
	 text-align: center;
	 font-weight: bold;
	 font-size: 36px;
	 background-color: black;
	 color:white;
	}
</style>
<h1 class='hqu'>Quote for the Day</h1>
</head>







<body>
<div class='qbox'>
<?php
$events_file=file("quotes.txt",FILE_IGNORE_NEW_LINES);
$countt=0;
foreach ($events_file as $line) $countt+=1;
$r=rand(1,$countt);
$count=1;
foreach ($events_file as $line)
	{
 	if($count==$r)
 		{
 	echo  "<center> <b2 class='tx'>".explode('-',$line)[0]."</b2>  </center>";
 	//echo "<br>";
 	echo  "<center> <b1 class='tx'>-".explode('-',$line)[1]."</b1>  </center>";
		}
    $count+=1;
	}
//fclose($events_file);
?>
</div>

</body>