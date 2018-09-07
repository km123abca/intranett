
<head>

<style>
/*
body
	{
		background-image: url('images/office_merged.jpg');
		background-repeat: no-repeat;
		background-size: 100% 150px;
	}
*/
.tablink 
	{
    	background-color: #555;
    	color: white;
    	float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		font-size: 17px;
		width: 16.667%;
		height:15%;
	}

.tablink:hover 
	{
		background-color: #777;
	}

.dropbtn 
	{
		font-size: 16px;
		border: none;
		width:100%;
		background-color: #555;
		color:white;
		vertical-align:middle;
    text-align: center;
	}
.dropdown 
	{
		position: relative;
		display: inline-block;
		float:left;
		background-color:red;/* #b8b894;*/
    	color: white;
    	border: none;
		outline: none;
		cursor: pointer;
		/*padding: 14px 16px;*/
		font-size: 17px;
		width:16.6%;
		height:3%;

	}

.dropdown-content 
	{
		display: none;
		position: absolute;
		background-color: #b8b894;
		min-width: 200px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}

.dropdown-content button 
	{
		color: green;
		font-weight: bold;
		padding: 18px 16px;
		text-decoration: none;
		display: block;
	}


.dropdown-content button:hover 
	{
		background-color: #f5f5f0;
	}


.dropdown:hover .dropdown-content 
	{
		display: block;
	}

.dropdown:hover .dropbtn 
	{
		background-color: #c2c2a3;
	}
.ddbutton
	{
		background-color:#c2c2a3;
		color: white;
		width:100%;
		border: 1px solid black;
		cursor: pointer;
		height:7px;
		padding-bottom:  5px;
	}
.ddbutton:hover
    {
		opacity: 0.5;
		color:red;
    }
    #head_div
    {
    	background-image: url('images/office_merged.jpg'); 
    	background-repeat: no-repeat;
		background-size: 100% 150px;
		width: 100%;
		height: 150px;
		padding: none;
    }

</style>

<script>
			function load_pagez(pgind)
			 {
			 	window.location.href='index.php?pgind='+pgind;
			 }

			 function load_pageznorm(pgind)
			 {
			 	window.location.href=pgind;
			 }


			 function disapp()
			 {
			 	elems=document.getElementsByClassName('dropdown-content');
			 	for (i=0;i<elems.length;i++)
			 		elems[i].style.display='none';
			 }
</script>
</head>

<body>
<div id='head_div'>

<div class="dropdown" >
 <button class="dropbtn" onclick="load_pagez('hom')"> Home</button>
  
    <div class="dropdown-content" style="min-width: 220px;" >


    <button type="button"   class="ddbutton" onclick="load_pagez('offices')">
    The Offices
    </button>   


    <button type="button"   class="ddbutton" onclick="load_pagez('aggssa')">
    Accountant General (GSSA)
    </button>

    <button type="button"   class="ddbutton" onclick="load_pagez('agersa')">
    Accountant General (ERSA)
    </button> 




  </div>

  


</div>

<div class="dropdown">
 <button class="dropbtn" onclick="load_pagez('hom')">Group Officers (GSSA)</button>
  
    <div class="dropdown-content" style="min-width: 220px;">

    <button type="button"   class="ddbutton" onclick="load_pagez('aggssa')">
    Accountant General (GSSA)
    </button>   
 

    <button type="button"   class="ddbutton" onclick="load_pagez('admin_dag')">
    DAG (Admin)
    </button> 

    <button type="button"   class="ddbutton" onclick="load_pagez('SSI_DAG')">
    DAG (LBA)
    </button>   


    <button type="button"   class="ddbutton" onclick="load_pagez('SGSII_DAG')">
    DAG (SGS II)
    </button>

    <button type="button"   class="ddbutton" onclick="load_pagez('SGSIII_DAG')">
    DAG (SGS III)
    </button> 


  </div>

  
</div>

<div class="dropdown">
 <button class="dropbtn" onclick="load_pagez('hom')"> Group Officers (ERSA)</button>
  
    <div class="dropdown-content" style="min-width: 220px;">

    <button type="button"   class="ddbutton"  onclick="load_pagez('agersa')" >
    Accountant General (ERSA)
    </button>

    
    <button type="button"   class="ddbutton" onclick="load_pagez('ars_dag')">
    DAG,Admin and RS 
    </button>   


    <button type="button"   class="ddbutton" onclick="load_pagez('ESI_DAG')">
    DAG, ES I
    </button>

    <button type="button"   class="ddbutton" onclick="load_pagez('ESII_DAG')">
    DAG, ES II
    </button> 


    </div>
  
</div>

<div class="dropdown">
  <button class="dropbtn" onclick="load_pagez('login_frames')"> Admin Wizard</button>
    <div class="dropdown-content">
    <button type="button"   class="ddbutton" onclick="load_pageznorm('ag/empdb.php')">
    Employee Information
    </button>
    <button type="button"  class="ddbutton" onclick="load_pageznorm('ag/empreports.php')">
    Administrative Reports
    </button>
    <button type="button"  class="ddbutton" onclick="load_pageznorm('ag/payslipgen.php')">
    View Payslip
    </button>
    <button type="button"  class="ddbutton" onclick="load_pageznorm('ag/leave_applying.php')">
    Apply for leave
    </button>

    <button type="button"  class="ddbutton" onclick="load_pageznorm('ag/itcomplaint.php')">
    Register IT Complaint
    </button>

    <button type="button"  class="ddbutton" onclick="load_pageznorm('ag/resetpass.php')">
    Reset Password
    </button>
    
  </div>
</div>


<div class="dropdown">
  <button class="dropbtn"  > IT Admin</button>
  <div class="dropdown-content">
    <button type="button"  class="ddbutton"  onclick="load_pageznorm('ag/itcomplaintad.php')">
    Address IT Complaints
    </button>

     <button type="button"  class="ddbutton" onclick="load_pageznorm('ag/leave_approving.php')">
    Approve leave
    </button>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn"> Misc</button>
  <div class="dropdown-content">

    <button type="button"  class="ddbutton" onclick="load_pagez('chat')">
    Chat with colleagues
    </button>

    <button type="button"  class="ddbutton" onclick="load_pagez('ret')">
    Retiring Employees 
    </button>
    <button type="button"  class="ddbutton" onclick="load_pagez('phot')">
    Photos 
    </button>

    <button type="button"  class="ddbutton" onclick="load_pagez('linag')">
    Important Links 
    </button>

    <button type="button"  class="ddbutton" onclick="load_pagez('dq')">
    Daily Quote 
    </button>

    <button type="button"  class="ddbutton" onclick="load_pageznorm('./mailserver_km/index.php')">
    Mail Box 
    </button>

  </div>
</div>
</div>


<div id='subdiv'>
<?php
function dispchan($ind)
	{
		echo "<script>";
        echo "document.getElementsByClassName('dropdown-content')[0].style.display='block'";
		echo "</script>";
	}

function load_pagezphp($ind)
	{
		echo "<script>";
        echo "load_pageznorm('".$ind."')";
		echo "</script>";
	}
$pgind='nothin';
if (isset($_REQUEST['pgind']))    $pgind=$_REQUEST['pgind'];
if ($pgind=='hom')
					{include_once('testpage.html');//dispchan(0);
					}
else if ($pgind=='offices')
					{include_once('officedetails.html');//dispchan(0);
					}
else if ($pgind=='aggssa')
					{include_once('AG_Sunil_Raj.html');//dispchan(0);
					}
else if ($pgind=='agersa')
					{include_once('AG_Anand.html');//dispchan(0);
					}
else if ($pgind=='admin_dag')
					{include_once('admin_dag.html');//dispchan(0);
					}
else if ($pgind=='SSI_DAG')
					{include_once('SSI_DAG.html');//dispchan(0);SGSII_DAG.html
					}
else if ($pgind=='SGSII_DAG')
					{include_once('SGSII_DAG.html');//dispchan(0);SGSII_DAG.html
					}
else if ($pgind=='SGSIII_DAG')
					{include_once('SGSIII_DAG.html');//ars_dag.html
					}
else if ($pgind=='ars_dag')
					{include_once('ars_dag.html');//ESI_DAG
					}
else if ($pgind=='ESI_DAG')
					{include_once('ESI_DAG.html');//ESI_DAG
					}
else if ($pgind=='ESII_DAG')
					{include_once('ESII_DAG.html');//ESI_DAG ag/login_frames.php
					}

else if ($pgind=='login_frames')
					{load_pagezphp('ag/login_frames.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='chat')
					{include_once('./ag/chatgyc/index.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='ret')
					{include_once('retirement.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='phot')
					{include_once('photosgraphic.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='linag')
					{include_once('linksag.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='dq')
					{include_once('dailyquotes.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='ms')
					{include_once('../../mailserver_km/index.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='neweng')
					{include_once('newseng.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='newmal')
					{include_once('newsmal.php');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='newhin')
					{include_once('daily_H.html');//ESI_DAG ag/login_frames.php
					}
else if ($pgind=='newtam')
					{include_once('daily_T.html');//ESI_DAG ag/login_frames.php
					}
else
					{
					include_once('testpage.html');
					}
?>
</div>








</body>

