<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<head>
<script>

function proc()
	{
	document.getElementById("sp").innerHTML=document.getElementById("wing").value;
	}
	
function adop()
	{
		document.getElementById("wing").innerHTML= document.getElementById("wing").innerHTML +"<option value='W31'>GSSA TRICHUR</option>";
	}
	
function wingchanged(str)
	{
		//document.getElementById("wing").value=document.getElementById("wing1").value;
		
		if (str.length!=0)
			{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
				{
		if (this.readyState == 4 && this.status == 200)
					{    //console.log('The resposeText received is this '+this.responseText);
		document.getElementById("branch").innerHTML=this.responseText;
					}
				};
				
		xmlhttp.open("GET", "interfere.php?q=" + str+'&n=03', true);
		//console.log(str);
        xmlhttp.send();
			}
	}
	
function branchchanged(str)
	{
		//document.getElementById("wing").value=document.getElementById("wing1").value;
		
		if (str.length!=0)
			{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
				{
		if (this.readyState == 4 && this.status == 200)
					{   // console.log('The resposeText received is this '+this.responseText);
		document.getElementById("section").innerHTML=this.responseText;
					}
				};
		xmlhttp.open("GET", "interfere.php?q=" + str+'&n=%', true);
		//console.log(str);
        xmlhttp.send();
			}
	}
	
function finalexec()
	{
		var wing=document.getElementById("wing1").value;
		var branch=document.getElementById("branch").value;
		var section=document.getElementById("section").value;
		var location=document.getElementById("loc").value;
		var str=wing+','+branch+','+section+','+location;
		console.log(str);
		if (!((wing=="")||(branch=="")||(section=="")||(location=="")))
			{
		window.location.href="findis.php?q="+str;
			}
		else
			{
		alert('Some boxes are empty');
			}
		
	}


</script>

<style>
	body
		{
		background-image:url('09Novforest.jpg');
		text-align:center;
		}
	f
			{
			background-color: coral;
			font-weight:bold;
			}
	h1
			{
			font-size:200%;
			background-color:yellow;
			text-align:center;
			}
</style>
<h1>  Office of the Accountant General, Thiruvananthapuram</h1>
</head>
 

<body>


<fieldset>
<pre>

  <f>Wing</f>   :<select id="wing1" name="wing1" onchange="wingchanged(this.value)"  >
          <option value='%' selected>-------------</option>
	      <option value='W01'>GSSA</option>
	      <option value='W11'>ERSA</option>
	      <option value='W21'>PD Central</option>
	      </select>
                                               <!--          unnecessary          <input type="text" id="wing" name="wing" style="visibility:hidden;">   -->
     <f>Branch</f> :<select id="branch" name="branch" onchange="branchchanged(this.value)" >
          <option value='%' selected>--------------------</option>
	      </select>
		  
      <f>Section</f>:<select id="section" name="section"  >
          <option value='%' selected>--------------------</option>
		  </select>
		  
           <f>Location</f>:<select id="loc" name="loc">
           <option value='%' selected>--------------------</option>
           <option value='KDE'>Kozhikode</option>
		   <option value='EKM'>Ernakulam</option>
		   <option value='KTM'>Kottayam</option>
		   <option value='TCR'>Thrissur</option>
		   <option value='TVM'>Thiruvananthapuram</option>
		   </select>
		   
 <button type="button" onClick="finalexec()">Generate report</button>
 </pre>
 </fieldset>

 <fieldset>
 	<pre>
 	<h1> Other Reports </h1>
 	<a href=#>HQ field Analysis</a>
 	<a href="staff_position.php">Staff Position Status in GSSA</a>
 	<a href="staff_position_ersa.php">Staff Position Status in ERSA</a>
 	<a href="staff_position_pdc.php">Staff Position Status in PDC</a>
 	</pre>
 </fieldset>
</body>