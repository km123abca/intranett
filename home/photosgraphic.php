<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
td
{
	border:2px solid black;
}

.imgcont
	{
		width:100%;
		position: relative;
	}
.ptex
	{
		position: absolute;
		top:0%;
		width:100%;
		color:white;
		background-color: black;
		text-align: center;
		font-weight: bold;
	}
	img
	{
		width: 100%;
		height: 248px;
	}
body
	{
		background-color: #6886b7;
	}
tr
   {
   	width: 100%
   }
  td
  {
  	width: 33%;
  }

  .headz
  {
  	width:100%;
  	text-align: center;
  	background-color: black;
  	color:white;
  	font-weight: bold;
  	font-size: 25px;
  }

  .marq
  {
  	width:100%;
  	color: white;
  	background-color: black;
  	font-weight:bold;
  }
</style>
<script>

function afterText(st) {
	//var descarr=array("Hindi fortnight celebrations","recreation");
	//console.log(st);
    var txt=document.createElement('marquee');
   // $('marquee').attr('scrollamount','25');
    txt.innerHTML='Photos of various events';
    if (st=='a1')
    txt.innerHTML='Recreation club function held during Novembor 2017';
	else if(st=='a2')
		txt.innerHTML='Hindi Fortnight celebrations during January 2017';
	else if(st=='a3')
		txt.innerHTML='Independence day function during 2017';
	else if(st=='a4')
		txt.innerHTML='Free Medical Camp conducted by doctors from Kerala Institute of medical sciences';
	else if(st=='a5')
		txt.innerHTML='Publication of Hindi Magazine 2018';
	else if(st=='a6')
		txt.innerHTML='Visit of ADyCAG during April 2018';
    $(txt).css({'color':'white','background-color':'black','font-weight':'bold','position':'absolute','top':'35%'});

    $('table').after(txt);          // Insert new elements after <img>
					  }


function destText()
		{

			$('marquee').remove();
		}

$(document).ready(
	function()
			{
$('.imgcl').mouseover(
	function()
	 {
	 	afterText(this.id);
	 }
	            );
$('.imgcl').mouseout(
	function()
	 {
	 	destText();
	 }
	            );
            }
				);
</script>
</head>


<body>
<div class='headz'>PHOTOS OF VARIOUS EVENTS IN THE OFFICE</div>
<table>
	<tr>

	<td >   <a href="../ag/autoslidew3.php?m=1&r=0" target="blank" >
					<div class='imgcont'>
					<img src='../ag/images/rec/fil3.jpg' id='a1' class='imgcl'>
					<b1 class='ptex'>Recreation Club Function 2017</b1>
					</div>
			</a>  
	</td>
	
	<td>   <a href="../ag/autoslidew3.php?m=1&r=1" target='blank'>
					<div class='imgcont'>
					<img src='../ag/images/hin/fil3.jpg' id='a2' class='imgcl'>
					<b1 class='ptex'>Hindi Fortnight Celebration 2017</b1>
					</div>
			</a>  
	</td>

	<td>   <a href="../ag/autoslidew3.php?m=1&r=2" target='blank'>
					<div class='imgcont'>
					<img src='../ag/images/ind/fil3.jpg' id='a3' class='imgcl'>
					<b1 class='ptex'>Independence Day 2017</b1>
					</div>
			</a>  
	</td>

	</tr>

	<tr>

	<td>   <a href="../ag/autoslidew3.php?m=1&r=4" target="blank">
					<div class='imgcont'>
					<img src='../ag/images/kims/fil3.jpg' id='a4' class='imgcl'>
					<b1 class='ptex'>Kims Medical camp 2017</b1>
					</div>
			</a>  
	</td>
	
	<td>   <a href="../ag/autoslidew3.php?m=1&r=3" target='blank'>
					<div class='imgcont'>
					<img src='../ag/images/hin2/fil3.jpg' id='a5' class='imgcl'>
					<b1 class='ptex'>Hindi Magazine 2018</b1>
					</div>
			</a>  
	</td>

	<td>   <a href="../ag/autoslidew3.php?m=1&r=5" target='blank'>
					<div class='imgcont'>
					<img src='../ag/images/adai/fil3.jpg' id='a6' class='imgcl'>
					<b1 class='ptex'>ADy Visit 2018</b1>
					</div>
			</a>  
	</td>

	</tr>

	
</table>
<!--
<marquee class='marq' scrollamount='10' id='marq1'>Hello</marquee>
-->
</body>