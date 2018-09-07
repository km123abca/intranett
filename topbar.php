<head>

<style>
body
	{
		background-image: url('images/forest.jpg');
	}

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
		width: 12.5%;
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
		background-color: #b8b894;
    	color: white;
    	border: none;
		outline: none;
		cursor: pointer;
		/*padding: 14px 16px;*/
		font-size: 17px;
		width: 12.5%;
		height:8%;
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
		color: white;
		font-weight: bold;
		padding: 12px 16px;
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
		border: none;
		cursor: pointer;
		height:7px;
	}
.ddbutton:hover
    {
		opacity: 0.5;
		color:red;
    }
</style>
</head>

<body>


<div class="dropdown">
 <button class="dropbtn"> <a href='home/testpage.html' target="contentt" style="color:white;">Home</a></button>
  
    <div class="dropdown-content" style="min-width: 220px;">


    <button type="button"   class="ddbutton" >
    <a href='home/officedetails.html' target="contentt" >The Offices</a>
    </button>   


    <button type="button"   class="ddbutton" >
    <a href='home/AG_Sunil_Raj.html' target="contentt" >Accountant General (GSSA)</a>
    </button>

    <button type="button"   class="ddbutton" >
    <a href='home/AG_Anand.html' target="contentt" >Accountant General (ERSA)</a>
    </button> 




  </div>

  


</div>

<div class="dropdown">
 <button class="dropbtn"> <a href='home/testpage.html' target="contentt" style="color:white;">Group Officers (GSSA)</a></button>
  
    <div class="dropdown-content" style="min-width: 220px;">

    <button type="button"   class="ddbutton" >
    <a href='home/AG_Sunil_Raj.html' target="contentt" >Accountant General (GSSA)</a>
    </button>   
 

    <button type="button"   class="ddbutton" >
    <a href='home/Admin_DAG.html' target="contentt" >DAG (Admin)</a>
    </button> 

    <button type="button"   class="ddbutton" >
    <a href='home/SSI_DAG.html' target="contentt" >DAG (LBA)</a>
    </button>   


    <button type="button"   class="ddbutton" >
    <a href='home/SGSII_DAG.html' target="contentt" >DAG (SGS II)</a>
    </button>

    <button type="button"   class="ddbutton" >
    <a href='home/SGSIII_DAG.html' target="contentt" >DAG (SGS III)</a>
    </button> 


  </div>

  
</div>

<div class="dropdown">
 <button class="dropbtn"> <a href='home/testpage.html' target="contentt" style="color:white;">Group Officers (ERSA)</a></button>
  
    <div class="dropdown-content" style="min-width: 220px;">

    <button type="button"   class="ddbutton" >
    <a href='home/AG_Anand.html' target="contentt" >Accountant General (ERSA)</a>
    </button>

    
    <button type="button"   class="ddbutton" >
    <a href='home/ars_dag.html' target="contentt" >DAG,Admin and RS </a>
    </button>   


    <button type="button"   class="ddbutton" >
    <a href='home/ESI_DAG.html' target="contentt" >DAG, ES I</a>
    </button>

    <button type="button"   class="ddbutton" >
    <a href='home/ESII_DAG.html' target="contentt" >DAG, ES II</a>
    </button> 


    </div>
  
</div>

<div class="dropdown">
  <button class="dropbtn"> <a href="ag/login_frames.php" target="contentt" style="color:white;">Admin Wizard</a></button>
  <div class="dropdown-content">
    <button type="button"   class="ddbutton" >
    <a href="ag/empdb.php" target="contentt" >Employee Information</a>
    </button>
    <button type="button"  class="ddbutton" >
    <a href="ag/empreports.php" target="contentt">Administrative Reports</a>
    </button>
    <button type="button"  class="ddbutton" >
    <a href="ag/payslipgen.php" target="contentt">View Payslip</a>
    </button>
    <button type="button"  class="ddbutton" >
    <a href="ag/leave_applying.php" target="contentt">Apply for leave</a>
    </button>
   

    <button type="button"  class="ddbutton" >
    <a href="ag/itcomplaint.php" target="contentt">Register IT Complaint</a>
    </button>
    


    


    <button type="button"  class="ddbutton" >
    <a href="ag/resetpass.php" target="contentt">Reset Password</a>
    </button>
    
  </div>
</div>


<div class="dropdown">
  <button class="dropbtn"> IT Admin</button>
  <div class="dropdown-content">
    <button type="button"  class="ddbutton" >
    <a href="ag/itcomplaintad.php" target="contentt">Address IT Complaints</a>
    </button>

     <button type="button"  class="ddbutton" >
    <a href="ag/leave_approving.php" target="contentt">Approve leave</a>
    </button>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn"> Misc</button>
  <div class="dropdown-content">

    <button type="button"  class="ddbutton" >
    <a href="ag/chatgyc/index.php" target="contentt">Chat with colleagues</a>
    </button>

    <button type="button"  class="ddbutton" >
    <a href="home/retirement.php" target="contentt">Retiring Employees </a>
    </button>
    <button type="button"  class="ddbutton" >
    <a href="home/photosgraphic.php" target="contentt">Photos </a>
    </button>

    <button type="button"  class="ddbutton" >
    <a href="home/linksag.php" target="contentt">Important Links </a>
    </button>

    <button type="button"  class="ddbutton" >
    <a href="home/dailyquotes.php" target="contentt">Daily Quote </a>
    </button>

    <button type="button"  class="ddbutton" >
    <a href="../mailserver_km" target="contentt">Mail Box </a>
    </button>

  </div>
</div>



<div class="dropdown">
  <button class="dropbtn"> Menu1</button>
  <div class="dropdown-content">
    <button type="button"  class="ddbutton" >biodata</button>
    <button type="button"  class="ddbutton" >Office details</button>
    <button type="button"  class="ddbutton" >Pay details</button>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn"> Menu1</button>
  <div class="dropdown-content">
    <button type="button"  class="ddbutton" >biodata</button>
    <button type="button"  class="ddbutton" >Office details</button>
    <button type="button"  class="ddbutton" >Pay details</button>
  </div>
</div>









</body>