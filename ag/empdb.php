<?php
require_once("./empdbfunctions.php");
require_once("./include/membersite_config.php");
	if(!$fgmembersite->CheckLogin())
		{
    $fgmembersite->RedirectToURL("login_frames.php");
    exit;
		}
$privarray=array('ag'=>'9023','dag_admin'=>'9022','dag_sgs2'=>'9025','dag_sgs3'=>'9020','dag_lba'=>'9019');
$conn=oci_connect($fgmembersite->orauser(),$fgmembersite->orap(),$fgmembersite->oraho() );
  	if (!$conn)
				{echo 'Failed to connect to Oracle';
			     die("Connection failed: " . $conn->connect_error);
				}
	$current_user=$fgmembersite->Userid();
	$usertype=$fgmembersite->Userrole();
?>
<head>
<script src="empdbscriptss.js"></script>
<style>


 		*
		{
			word-wrap:break-word;
		 	box-sizing:border-box;

		}
		.showswitch
		{
			position: absolute;
			float:left;
			visibility: hidden;
		}
		legend
		{
			font-weight: bold;
			font-size: 24px;
		}
		.pcl
		{
			clear:left;
			float:left;
		}
		.fll
		{
			width:100%;
		}
		.fl
		{
			width:100%;
			float:left;
			font-weight: bold;
		}
		.lg,.md,.sm
		{
		
			float:left;
			font-weight: bold;
		}
		.plg,.pmd,.psm
		{
			
			float:left;
			font-weight: bold;
		}
							@media(min-width: 992px)
 								{ 
 								.lg
 									{
 									width: 16.66%;		    
 								    
 									}
 								.plg
 									{
 									width:25%;
 									}
 								.pplg
 								   {
 								   	width:9%;
 								   }
       							}
 							@media(min-width:768px) and (max-width:992px)
 								{ 
 									.md
 									{
 									width: 25%;
 									
 									}
 									.pmd
 									{
 									width:100%;
 									}
 								}
 							@media(max-width: 767px)
 								{ 
 									.sm
 									{
 										width: 50%;
 										
 									}
 									.psm
 									{
 									width:100%;
 									}
 								}

 							#error 
								{
								color: #FF0000;
								}
							#namett
								{
								visibility:hidden;
								}
							#bl
		  						{
			   					font-size:15;
		   						}
		   					#bio
								{
								background-color: #ccffcc;

								}
							fieldset
							    {
							    	clear:left;
							    }
							#pay
								{
								background-color: #66ff99;
								}
/*
							f,#f
								{
								background-color: gray;
								font-size:18px;
								font-weight:bold;
								}
*/
							#ima
								{
								float:right;
								width:152px;
								height:195px;
								}
							warn
            					{
                				color:red;
                				/*font-size: 48px;*/
            					}
            				#bioo
            					{           	
            					position:centered;
            					}
            				#offheading
								{
								font-size:200%;
								background-color:yellow;
								text-align:center;
								}





								#titlle
					{
						text-align: center;
						width: 100%;
						left:30%;
					}
					#formslip
					{
						position: relative;
    				border: 3px solid green;
    				width:30%;
    				left:30%;
    				top:20%;
    				background-color: white;
					}

					/* Full-width inputs */
					.boxes {
    				width: 100%;
    				padding: 12px 20px;
    				margin: 8px 0;
    				display: inline-block;
    				border: 1px solid #ccc;
    				box-sizing: border-box;
    				font-style:  italic;
    				font-size: 20px;
							}

					/* Set a style for all buttons */
					#subut {
    				background-color: #4CAF50;
    				color: white;
    				padding: 14px 20px;
    				margin: 8px 0;
    				border: none;
    				cursor: pointer;
    				width: 100%;
							}

					/* Add a hover effect for buttons */
					#subut:hover {
    				opacity: 0.8;
								}

/* Extra style for the cancel button (red) */
				.cancelbtn {
    					width: auto;
    					padding: 10px 18px;
   						background-color: #f44336;
							}

/* Center the avatar image inside this container */
				.imgcontainer {
   						 text-align: center;
    					 margin: 24px 0 12px 0;
								}
				.purple
				{
					background-color: #e6e6fa;
				}



				/* Add padding to containers */
				.container {
    				padding: 16px;
							}

					/* The "Forgot password" text */
				#month {
    					float: right;
   	 					padding-top: 16px;
					   }

/* Change styles for span and cancel button on extra small screens */
			@media screen and (max-width: 300px) {
    		#month {
        			display: block;
        			float: none;
    				}
   
													}









				* {box-sizing: border-box}

				/* Set height of body and the document to 100% */
				body, html {
    				height: 100%;
    				margin: 0;
    				font-family: Tahoma;
							}

					/* Style tab links */
				.tablink {
    			background-color: #555;
    			color: white;
    			float: left;
    			border: none;
   				outline: none;
    			cursor: pointer;
    			padding: 14px 16px;
    			font-size: 17px;
    			width: 10%;
    			height:10%;
						}

				.tablink:hover {
    			background-color: #777;
								}

				/* Style the tab content (and add height:100% for full page content) */
				.tabcontent {
    						color: black;
    						display: none;
   							/* padding: 100px 20px;*/
    						height: 100%;
							}

							#Home1 {background-color: #ffffcc;}
							#Home2 {background-color: #ffffcc;}
							#Home3 {background-color: #ffffcc;}
							#Home4 {background-color: #ffffcc;}
							#Home5 {background-color: #ffffcc;}
							#Home6 {background-color: #ffffcc;}
							#Home6a {background-color: #ffffcc;}
							#Home6b {background-color: #ffffcc;}
							#Home6c {background-color: #ffffcc;}
							#Home7 {background-color: #ffffcc;}
							#usersOnLine{background-color: white;}
							#chatBox{background-color: white;}

							.dropbtn {
    						/*background-color: #555;
    						color: white;
    						padding: 16px;*/
    						font-size: 16px;
    						border: none;
									}

							
							.dropdown {
    						position: relative;
    						display: inline-block;
    						float:left;
    						width:20%;
									  }

							.dropdown-content {
    						display: none;
    						position: absolute;
    						background-color: #f9f9f9;
    						min-width: 160px;
    						box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    						z-index: 1;
												}

							.dropdown-content button {
    						color: white;
    						font-weight: bold;
    						padding: 12px 16px;
    						text-decoration: none;
    						display: block;
												}


							.dropdown-content button:hover {background-color: #f1f1f1}


							.dropdown:hover .dropdown-content {
    						display: block;
															   }


							.dropdown:hover .dropbtn {
    						background-color: #3e8e41;
													 }

						    .maindbbutton
						    	{
						    background-color: #4CAF50;
    				        color: white;
    				        padding: 14px 20px;
    				        margin-top: none;
    				        border: none;
    				        cursor: pointer;
    				        border:2px solid black;
						    	}
						    .maindbbutton:hover
						        {
						    opacity: 0.5;
						        }
						     .hovop:hover
						        {
						        cursor:pointer;
						        opacity: 0.5;
						        }

						    .ddbutton
						    	{
						    background-color: #4CAF50;
    				        color: white;
    				        width:100%;
    				        border: none;
    				        cursor: pointer;
    				        
						    	}
						    .ddbutton:hover
						        {
						    opacity: 0.5;
						    color:red;
						        }



						    /*Table styles leave*/

						    #ack
				    			{
				    		color:green;
				    		font-size: 1em;
				    		text-align: center;

				    			}
							#hea
								{
							text-align: center;
							font-size: 2.5em;
								}

				.bl
					{
					font-weight: bold;
					}
				table#t01 
					{
    				width: 100%; 
    				background-color: #f1f1c1;
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
					.novis
					{
				    visibility: hidden;
				    width:2px;
					}
    

    			/*leave approver*/

    			.llg
				{
				float:left;
				width:25%;
				}
				.cllg
				{
				float:left;
				width:70%;
				}
				lab
				{
					clear: left;
				}

				#hea2
					{
					text-align: center;
					font-size: 1.5em;
					float:left;
					width:100%;
                    font-weight: bold;
					}




					/*  resetting password*/


					.rlg
						{
						float:left;
						width:50%;
						margin-bottom: 30px;

						}
					.bl
						{
						font-weight: bold;
						}
					.cl
					    {
					     clear:both;
					    }
					.f50
					    {
					    	width:50%;
					    }
					.f100
					    {
					    	width:98%;
					    }
					 .marglef
					 	{
					 		margin-left: 15%;
					 		/*margin-top: 10%;*/

					 	}
					 er
					    {
					 color:red;
					 font-size: 15px;
					 width:100%;
					 text-align: center;
					 float:left;
					    }
					 cor
					    {
					 color:green;
					 font-size: 15px;
					 width:100%;
					 text-align: center;
					 float:left;
					    }

					 .toolmas .tooltex
					 	{
					 visibility: hidden;
					 position: absolute;
					 background-color: black;
    				 color: #fff;
    				 text-align: center;
    				 padding: 5px 0;
    				 border-radius: 6px;
    				 z-index: 1;
					 	}
					 .toolmas:hover .tooltex
					    {
					    	visibility:visible;
					    }
					 .toolmas
					    {
					    position: relative;
    					display: inline-block;

    					}
    				 .abs
    				    {
    				    position: absolute;
    				    }

    				    .midg
						{
						float:left;
						width:25%;
						}
					  body
						{background-color: #ffffcc;}

</style>


</head>


<body>
<div class="dropdown">
  <button class="dropbtn"> <h3>Employee details</h3></button>
  <div class="dropdown-content">
    <button type="button" id="bx1" class="ddbutton" onclick="showtabz(1)">biodata</button>
    <button type="button" id="bx2" class="ddbutton" onclick="showtabz(2)">Office details</button>
    <button type="button" id="bx3" class="ddbutton" onclick="showtabz(3)">Pay details</button>
  </div>
</div>

  <?php
	    $current_user=$fgmembersite->Userid();

		
		if(!isset($_SESSION["x"]))     //WE ARE SETTING THE SESSION VARIABLE X HERE .FROM NOW ON X WILL LIVE AS LONG AS THE WEB PAGE IS ACTIVE
			{
			$_SESSION["x"]=1;
			//echo "session has been set";
			}
		//$_SESSION["norole"]="";
		if (!(isset($_SESSION["y"])))  $_SESSION["y"]='o';
		if (!(isset($_SESSION["z"])))  $_SESSION["z"]='';
		if (!(isset($_SESSION["per"])))  $_SESSION["per"]='';
		$go_ahead=0;
		$inc_elem=33;
		$err_id="";
		$err_nm="";
		//if (($go_ahead==0)&&(empty($_POST["name"]))) $_SESSION["per"]="";
		if (($_SERVER["REQUEST_METHOD"] == "POST") &&(array_key_exists('name',$_POST)))
			{  //echo 'namebox='.$_POST["name"].'  and quer_res='.$_SESSION["y"];
			if(!($_POST["name"]==$_SESSION["y"]))
					{
			$_SESSION["z"]=test_input($_POST["name"]);
			$_SESSION["id"]=test_input($_POST["id"]);
			$_SESSION["kltva"]=test_input($_POST["kltva"]);
			$_SESSION["mf"]=test_input($_POST["mf"]);
			$_SESSION["wing"]=test_input($_POST["wing"]);
			$_SESSION["branchh"]=test_input($_POST["branchh"]);
            $_SESSION["section"]=test_input($_POST["level"]);
            $_SESSION["cadre"]=test_input($_POST["cadre"]);
            $_SESSION["hq"]=test_input($_POST["hq"]);
            $_SESSION["panno"]=test_input($_POST["panno"]);
            $_SESSION["cat"]=test_input($_POST["cat"]);
            $_SESSION["edqual"]=test_input($_POST["edqual"]);
            $_SESSION["wonw"]=test_input($_POST["wonw"]);

            
					}
					
	 {$go_ahead=1;}	
		
			}
	    else
	    	$go_ahead=1;


	

?>



<form method="post" id="maindbform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
       onsubmit="if (allrfilled()) return confirm('Did you forget to press the clear button before hitting search? if yes probably you wont get the desired results');" > 
<button type="button" class='maindbbutton' onclick="clrdets()">clear</button>
<input type="submit" name="maindbsub" value="Search" id="maindbsub" 
        class='maindbbutton'> 
 <a href='logout.php' class='hovop'> <f><img src='images\logoutt.jpg' alt='logout' style="width:111px;height:48px;float:right;"></f></a>




    

    
    
<fieldset id="nameset">
	<legend>Basic Info</legend>
	<t2 class="pplg pmd psm"><f> Name </f></t2>
    <inp class="plg pmd psm">
    :<input type='text'  name="name" id="name" class="inp" list="namlist">
    <datalist id='namlist'></datalist>
        <!--
    <select  name="name" id="name" class="inp">
    <option value='%'>select all</option>
    </select>
    -->
    </inp>

    <t7 class="pplg pmd psm"><f>Office</f></t7>
    <inp class="plg pmd psm">:<input type="text" name="wing" id="wing" list="winglist" 
                      size="40" 
                      onchange="makelistt('%','03','branlist','wing','0')" class="inp"> </inp>   
                      
 
    <datalist id="winglist"></datalist>
     <script>
//vallist('PS_NM','namlist');
    <?php
    if ($usertype=='basic')
    echo "fixname('$current_user');";
    else
    echo  "vallist('PS_NM','namlist');";
    ?>

   // document.getElementById('maindbform').submit();
    </script>
    <!--
    <l2 style="position: relative;width:100%;float:left;clear:left;">
    <t19 class="pplg pmd psm" ><f>Office ID</f></t19>
    <inp class="plg pmd psm">:<input type="text" name="id" id="id" class="inp"></inp>
    </l2>
    -->
    <img src="cag/iii.jpg" id="ima" alt="No Photo" >
</fieldset>



<button type="button" id="offbutton0" class="showswitch" 
         onclick="altervis('bio','offbutton0')" >show Bio data</button>
         
<fieldset id="bio" >

<legend  id="bioo">Bio Data
<button type="button" id="offbutton02" class="hideswitch" 
        onclick="altervis('offbutton0','bio')">show less</button>
</legend>
     
<t1 class="plg pmd psm lab1"><f>Office ID</f></t1>
<inp class="plg pmd psm">:<input type="text" name="id" id="id" class="inp"></inp>

<!--
<t2 class="plg pmd psm"><f> Name </f></t2>
<inp class="plg pmd psm">:<input type="text" name="name" id="name" class="inp"></inp>
-->

<t3 class="plg pmd psm"><f>KLTVA Number</f></t3>
<inp class="plg pmd psm">:<input type="text" name="kltva" id="kltva" class="inp"></inp>
<t3 class="plg pmd psm"><f>PAN Number</f></t3>
<inp class="plg pmd psm">:<input type="text" name="panno" id="panno" class="inp"></inp>
<t4 class="plg pmd psm"><f>Sex type</f></t4>
<inp class="plg pmd psm">:<input type="text" name="mf" id="mf" class="inp"></inp>

<t4 class="plg pmd psm"><f>Mobile Number</f></t4>
<inp class="plg pmd psm">:<input type="text" name="mobl" id="mobl" size="40" class="inp" ></inp>


<t4 class="plg pmd psm"><f>Category</f></t4>
<inp class="plg pmd psm">:<input type="text" name="cat" id="cat" size="40" class="inp" list="clist"></inp>
<datalist id="clist"></datalist>

<t41 class="plg pmd psm"><f>Date of Birth</f></t41>
<inp class="plg pmd psm">:<input type="text" name="dob" id="dob" class="inp"></inp>
<t5 class="plg pmd psm"><f>Blood group</f></t5>
<inp class="plg pmd psm">:<input type="text" name="bldgrp" id="bldgrp" class="inp"></inp>

<addr class="plg pmd psm"><f>Address line1</f></addr>
<inp class="plg pmd psm">:<input type="text" name="addr1" id="addr1" size="40" class="inp"></inp>

<addr class="plg pmd psm"><f>Address line2</f></addr>
<inp class="plg pmd psm">:<input type="text" name="addr2" id="addr2" size="40" class="inp"></inp>

<addr class="plg pmd psm"><f>Address line3</f></addr>
<inp class="plg pmd psm">:<input type="text" name="addr3" id="addr3" size="40" class="inp"></inp>








<city id="citty" class="plg pmd psm"><f>City </f></city>
<inp class="plg pmd psm">:<input type="text" name="city" id="city"   size="40" class="inp"></inp>
<edqual id="edquall" class="plg pmd psm"><f>Edu. qualification </f></edqual>
<inp class="plg pmd psm">:<input type="text" name="edqual" id="edqual"   
                            list="edlist" size="40" class="inp"></inp>
                            <datalist id="edlist"></datalist>
</fieldset>

<button type="button" id="offbutton" class="showswitch" 
         onclick="altervis('bio2','offbutton')">show Office details</button>
 

<fieldset id='bio2'>
<legend > Office details 
<button type="button" id="offbutton2" class="hideswitch" 
        onclick="altervis('offbutton','bio2')">show less</button>
</legend>
 <script >
 	makelistt('%','02','winglist','0','0');
 	makelistt('%','03','branlist','0','0');
 	makelistt('%','17','sectionlist','0','0');
 	makelistt('%','01','cadrelist','0','0');
 	vallist('ps_floor','paylist');
 	vallist('ps_grp_id','grplist');
 	vallist('sr_sc_st_n','clist','desc');
 	vallist('PS_EDCTNL_QLFCTN1','edlist');
 </script>


  <t71 class="plg pmd psm"><f>Level</f></t71>
 <inp class="plg pmd psm">:<input type="text" name="paylevel" id="paylevel"  list="paylist"
                            size="40"  class="inp"> 
                            <datalist id="paylist"></datalist>
 </inp>

<!--
 <t7 class="plg pmd psm"><f>Wing</f></t7>
 <inp class="plg pmd psm">:<input type="text" name="wing" id="wing" list="winglist" 
                      size="40" 
                      onchange="makelistt('%','03','branlist','wing','0')" class="inp"> </inp>   
                      
 
<datalist id="winglist"></datalist>
-->
<t7 class="plg pmd psm"><f>Branch</f></t7>
<inp class="plg pmd psm">:<input type="text" name="branchh" id="branchh" class="inp"
                     list="branlist" size="40" onchange="makelistt('%','17','sectionlist','branchh','0')"></inp>
 
<datalist id="branlist"></datalist>
<t7 class="plg pmd psm">
<f>Section</f>
</t7>
<inp class="plg pmd psm">:<input type="text" name="level" id="level" list="sectionlist" size="40" class="inp">
</inp>

<datalist id="sectionlist"></datalist>
<t7 class="plg pmd psm">
<f>Cadre</f> 
</t7>
<inp class="plg pmd psm">:<input type="text" name="cadre" id="cadre" size="40" list="cadrelist" class="inp"></inp>

<datalist id="cadrelist"></datalist>

<t7 class="plg pmd psm">
<f>HQ</f>      
 </t7>
<inp class="plg pmd psm">:<input type="text" name="hq" id="hq" size="20" list="hqlist" class="inp" >
</inp>

<datalist id="hqlist">
	<option value='TVM'> <option value='TCR'> <option value='KDE'><option value='KTM'><option value='EKM'>
</datalist>

<t42 class="plg pmd psm"><f>Working/Non Working</f></t42>
<inp class="plg pmd psm">:<input type="text" name="wonw" id="wonw" class="inp" list="estatlist"></inp>


<datalist id="estatlist">
	<option value='Working'> <option value='Not Working'>
</datalist>


<t43 class="plg pmd psm"><f>Group</f></t43>
<inp class="plg pmd psm">:<input type="text" name="grpid" id="grpid" class="inp" list="grplist"></inp>
<datalist id="grplist"></datalist>

<t43 class="plg pmd psm"><f>Date of joining CAG</f></t43>
<inp class="plg pmd psm">:<input type="text" name="doj" id="doj" class="inp" ></inp>

<t43 class="plg pmd psm"><f>Entry Cadre</f></t43>
<inp class="plg pmd psm">:<input type="text" name="eci" id="eci" class="inp" ></inp>

<t43 class="plg pmd psm"><f>Date of Retirement</f></t43>
<inp class="plg pmd psm">:<input type="text" name="dor" id="dor" class="inp" ></inp>

<t43 class="plg pmd psm"><f>Billing Unit</f></t43>
<inp class="plg pmd psm">:<input type="text" name="bunit" id="bunit" class="inp" size="40" ></inp>

<t43 class="plg pmd psm"><f>GPF No</f></t43>
<inp class="plg pmd psm">:<input type="text" name="gpfno" id="gpfno" class="inp" size="20" ></inp>

<t43 class="plg pmd psm"><f>Accommodation</f></t43>
<inp class="plg pmd psm">:<input type="text" name="acomm" id="acomm" class="inp" size="20" ></inp>

<t43 class="plg pmd psm"><f>Deputation Location</f></t43>
<inp class="plg pmd psm">:<input type="text" name="depplace" id="depplace" class="inp" size="40" ></inp>

<t43 class="plg pmd psm"><f>Deputation Designation</f></t43>
<inp class="plg pmd psm">:<input type="text" name="depdes" id="depdes" class="inp" size="40" ></inp>

<t43 class="plg pmd psm"><f>Deputation From</f></t43>
<inp class="plg pmd psm">:<input type="text" name="dfp" id="dfp" class="inp" size="40" ></inp>


</fieldset>

<button type="button" id="offbutton3" class="showswitch" 
         onclick="altervis('pay','offbutton3')">show Pay details</button>

<fieldset id="pay">
<legend>Pay Details
<button type="button" id="offbutton22" class="hideswitch" 
        onclick="altervis('offbutton3','pay')">show less</button>
 </legend>

<bas class="lg md sm">Basic Pay</bas >  
 <bas class="lg md sm">:<input type="text" name="bpay" id ="bpay" size="20" class="inp"></bas>
<DA  class="lg md sm">DA </DA>
<inp  class="lg md sm">:<input type="text" name="da" id="da" size="20" class="inp"></inp>
<TA  class="lg md sm">TA </TA>
<inp  class="lg md sm">:<input type="text" name="ta" id="ta" size="20" class="inp"></inp>
<DAONTA  class="lg md sm">DA on TA </DAONTA>
<inp  class="lg md sm">:<input type="text" name="daonta" id="daonta" size="20" class="inp"></inp>
<HRA  class="lg md sm">HRA</HRA>
<inp  class="lg md sm">:<input type="text" name="hra" id="hra" size="20" class="inp" ></inp>
<GPF  class="lg md sm">GPF</GPF>
<inp  class="lg md sm">:<input type="text" name="gpf" id="gpf" size="20"  class="inp"></inp>



<CGGIS  class="lg md sm">CGGIS</CGGIS>
<inp  class="lg md sm">:<input type="text" name="cggis" id="cggis" size="20"  class="inp"></inp>
<CGHS  class="lg md sm">CGHS  </CGHS>
<inp  class="lg md sm">:<input type="text" name="cghs" id="cghs" size="20"  class="inp"></inp>
<licence  class="lg md sm">License Fee</licence>
<inp  class="lg md sm">:<input type="text" name="licence" id="licence" size="20" class="inp"></inp>
<protax  class="lg md sm">Professional Tax</protax>
<inp  class="lg md sm">:<input type="text" name="pt" id="pt" size="20" class="inp"></inp>
<IT  class="lg md sm">Income Tax </IT>
<inp  class="lg md sm">:<input type="text" name="it" id="it" size="20" class="inp"></inp>


<ITSUR  class="lg md sm">IT Surcharge </ITSUR>
<inp  class="lg md sm">:<input type="text" name="itsur" id="itsur" size="20" class="inp"></inp>
<Trvry  class="lg md sm">Total Recovery</Trvry>
<inp  class="lg md sm">:<input type="text" name="tr" id="tr" size="20" class="inp"></inp>
<netpay  class="lg md sm">Net Pay</netpay>
<inp  class="lg md sm">:<input type="text" name="net" id="net" size="20" class="inp"></inp>
<Tier1  class="lg md sm">TierI</Tier1>
<inp  class="lg md sm">:<input type="text" name="t1" id="t1" size="20" class="inp"></inp>

<bnk  class="lg md sm">Bank Name</bnk>
<inp  class="lg md sm">:<input type="text" name="bnk" id="bnk" size="20" class="inp"></inp>



</fieldset>




</form>



<script>

hidetabz();

</script>



<!--
<form method="post">
     <input type="text" name="name" id="namett">
    <input type="text" name="name" id="namett">
    <input type="submit" name="test" id="test" value="RUN" /><br/>
</form>
-->
<?php
function testfun()
{
	echo "Your test function on button click is working";
    echo  '
						 <script>
					     	document.getElementById("nameinv").value=document.getElementById("name").value;
							 
					     </script>
						       ';
	return 0;
   
   
}

if(array_key_exists('test',$_POST)){
   $inc_elem=testfun();
}

?>

<?php
function restimage(){
echo  '
						 <script>
					     	document.getElementById("ima").src="cag/iiii.jpg";
							 
					     </script>
						       ';
					}
?>








<?php
//$inc_ele1=;

if ($go_ahead==1)
			{$go_ahead=0;
				$conn=oci_connect($fgmembersite->orauser(),$fgmembersite->orap(),$fgmembersite->oraho());
			 if (($_SERVER["REQUEST_METHOD"] == "POST") &&(array_key_exists('name',$_POST)))
		     	$name=$_SESSION["z"];
		     else
		     {
		     	$temp_var=$current_user;
		     	if (array_key_exists($temp_var,$privarray)) $temp_var=$privarray[$temp_var];
		     	$name=getnmx($temp_var,$conn);
		     	
		     }

     		 $servername = "localhost/test2";
			 $username = "km";
			 $password = "rt";
			 $dbname="myDB";
			 //$conn = new mysqli($servername, $username, $password,$dbname);
			 //$conn=oci_connect($username,$password,$servername);
			// $conn=oci_connect($fgmembersite->orauser(),$fgmembersite->orap(),$fgmembersite->oraho());
			 
			 if (!$conn)
				{echo 'Failed to connect to Oracle';
			     die("Connection failed: " . $conn->connect_error);
				}



				//Access analysis: generating the subquery for access control
			$query="select a.* from access_mazter a,role_mazter 
			        where a.idno=role and usr='$current_user'";
			$statemen=oci_parse($conn,$query);
	        oci_execute($statemen);
	        if( $row=oci_fetch_array($statemen))
	        	{
	        //echo "access exists for $current_user <br>";
	        $awings=$row['WING'];
	        $abranches=$row['BRANCH'];
	        $asections=$row['SECTIONN'];
	        $ids=$row['IDS'];
	        //if  ($row["IDNO"]=='basic') $ids=$current_user;
	        $subquery="and ( ";
	        foreach(explode(',',$awings) as $awing)
	        		{
            $subquery.=" ps_wing like '$awing' or";
	        		}
	        $subquery=substr($subquery, 0,-2).") and (";
	        foreach(explode(',',$ids) as $aid)
	        		{
            $subquery.="ps_idn like '$aid' or";
	        		}
	        $subquery=substr($subquery, 0,-2).") and (";
	        foreach(explode(',',$abranches) as $abranch)
	        		{
            $subquery.="ps_brnch_id like '$abranch' or";
	        		}
            $subquery=substr($subquery, 0,-2).") and (";
	        foreach(explode(',',$asections) as $asection)
	        		{
            $subquery.="ps_sctn_id like '$asection' or";
	        		}
	        $subquery=substr($subquery, 0,-2).")";
	        //echo $subquery;
	            }
	        else
	        	{//echo 'no access';
	             
	             //echo '';
	             die('<br><warn> You have no role defined, hence you cant search</warn><br>');
	             }
	         //Access analysis
	        $searchcrt='';
		if (($_SERVER["REQUEST_METHOD"] == "POST") &&(array_key_exists('name',$_POST)))
		{
	        $id2search=$_SESSION["id"];
	        $noval="%";
            $searchcrt=" and ps_idn like nvl('$id2search','$noval') ";	

            $id2search=strtolower($_SESSION["kltva"]);
	        $searchcrt.=" and nvl(lower(ps_frst_nm),'%') like nvl('$id2search','$noval') ";

            $id2search=strtolower($_SESSION["mf"]);
	        $searchcrt.=" and nvl(lower(ps_sx_typ),'%') like nvl('$id2search','$noval') ";

            $id2search=getdesc($_SESSION["wing"],$conn);
            //echo 'hello'.$_SESSION["wing"];
	        $id2search=strtolower($id2search);
	        $searchcrt.=" and nvl(lower(ps_wing),'%') like nvl('$id2search','$noval') ";

	        $id2search=getdesc($_SESSION["branchh"],$conn);
	        $id2search=strtolower($id2search);
	        $searchcrt.=" and nvl(lower(ps_brnch_id),'%') like nvl('$id2search','$noval') ";

	        $id2search=getdesc($_SESSION["section"],$conn);
	        $id2search=strtolower($id2search);
	        $searchcrt.=" and nvl(lower(ps_sctn_id),'%') like nvl('$id2search','$noval') ";

	        $id2search=getdesc($_SESSION["cat"],$conn);
	        $id2search=strtolower($id2search);
	        //echo 'hi'.$id2search;
	        $searchcrt.=" and nvl(lower(sr_sc_st_n),'%') like nvl('$id2search','$noval') ";

	        $id2search=getdesc($_SESSION["cadre"],$conn);
	        $id2search=strtolower($id2search);
	        $searchcrt.=" and nvl(lower(ps_cdr_id),'%') like nvl('$id2search','$noval') ";

	        $id2search=$_SESSION["hq"];
	        $id2search=strtolower($id2search);
	        $searchcrt.=" and nvl(lower(ps_room_no),'%') like nvl('$id2search','$noval') ";

	        $id2search=$_SESSION["panno"];
	        $id2search=strtolower($id2search);
	        $searchcrt.=" and nvl(lower(ps_bldng),'%') like nvl('$id2search','$noval') ";

	          $id2search=$_SESSION["edqual"];
	        $id2search=strtolower($id2search);
	        $searchcrt.=" and nvl(lower(PS_EDCTNL_QLFCTN1),'%') like nvl('$id2search','$noval') ";

	        $id2search=$_SESSION["wonw"];
	        //$id2search=$id2search."%";
	        switch($id2search)
	        	{
	        	case "Working":
	        		$id2search='W';
	        		break;
	        	case "Not Working":
	        		$id2search='N';
	        		break;
	        	
	        	}
	       // echo "<script>alert('".  $id2search."')</script>";
	       $id2search=strtolower($id2search);
	        $searchcrt.=" and nvl(lower(PS_FLG),'%') like nvl('$id2search','$noval') ";
		}	
				/**/
			
			$query = "SELECT ps_nm,
			                 ps_idn,
			                 ps_frst_nm,
			                 ps_sx_typ,
			                 ps_bld_grp,
			                 PS_PRSNT_ADDRSS1 PS_HM_TWN_ADDRSS1,
			                 PS_PRSNT_ADDRSS2 PS_HM_TWN_ADDRSS2,
  			                 PS_PRSNT_ADDRSS3 PS_HM_TWN_ADDRSS3,
  			                 PS_EDCTNL_QLFCTN1,
  			                 PS_PRSNT_CTY PS_HM_CTY,
  			                 ps_cdr_id,
  			                 ps_wing,
  			                 ps_sctn_id,
  			                 ps_brnch_id,
  			                 ps_pca_bsc_jan06,
  			                 er_da,
  			                 er_ca,
  			                 er_cca,
  			                 er_hra,
  			                 er_gpf,
  			                 er_cggis,
  			                 er_cghs,
  			                 er_lcnc_fee,
  			                 er_pt,
  			                 er_it,
  			                 er_it_srchr,
  			                 er_rcvry_ttl,
  			                 er_nt_py,
  			                 tier1,
  			                 ps_room_no,

  			                 ps_bldng,
  			                 ps_floor,
  			                 ps_mobile_no,
  			                 ps_tele_office,
  			                 ps_flg,
  			                 ps_eml_addrss,
  			                 ps_dt_of_brth,
  			                 ps_grp_id,
  			                 sr_entry_cdr_id,
  			                 sr_dt_of_jn,
  			                 sr_dt_of_jn_ssn,
  			                 sr_trnsfr_stts,
  			                 sr_yr_of_pssng_sog,
  			                 sr_yr_of_pssng_ra,
  			                 sr_ltst_prmtn_cdr_id,
  			                 sr_ltst_dt_of_prmtn,
  			                 sr_ltst_dt_of_prmtn_ssn,
  			                 sr_prbtn_dt,
  			                 sr_prbtn_ssn,
  			                 sr_cnfrmtn_pst,
  			                 sr_dpttn_cdr_id,
  			                 cm_unt_cd,
  			                 cm_dli,
  			                 cm_dni,
  			                 cm_chq_pd,
  			                 cm_rti_nrti,
  			                 cm_clms_flg,
  			                 cm_cghs_flg,
  			                 sr_acp_stts,
  			                 ps_prsnt_pn_cd,
  			                 sr_snrty,
  			                 sr_sc_st_n,
  			                 SR_LTST_DT_OF_PRMTN_JN_DT,
  			                 SR_DT_OF_RTRMNT,
  			                 PS_PRNT_OFFICE,
  			                 PS_GPFNO,
  			                 PS_SLNO,
  			                 PS_BNK_NM,
  			                 SR_DT_OF_JN_CAG,
  			                 PS_PAO_NO,
  			                 PS_BNK_ACCNT_NO,
  			                 decode(nvl(CM_ACCMMDTN,'No'),'No','No','Govt Quarters') CM_ACCMMDTN,
  			                 CM_TA_RQRD_FLG,
  			                 PS_DPTTN_DESIG,
  			                 PS_DPTTN_PLACE,
  			                 PS_DPTTN_FR_PLACE,
  			                 PS_GRADUATE,
  			                 PS_EXSM_FLG,
  			                 SR_ACP_STTS2,
  			                 SR_ACP_STTS3

  			            FROM prsnl_infrmtn_systm,
  			            						(select * from clms_erng_yrfl where 
  			           			er_mnth_of_acnt in	 (select max(er_mnth_of_acnt) from clms_erng_yrfl)
  			           						     ) aa
  			            where 
  			            	 er_idn(+)=ps_idn and  
  			            	 lower(ps_nm) 
						like '".strtolower($name)."%'".$searchcrt.$subquery
						."order by ps_cdr_id desc";
						   
			 
						   
						   
			//echo $query;			   
			 echo "<br>";
			 $statemen=oci_parse($conn,$query);
	         oci_execute($statemen);
			 $results=array();
	         $num = oci_fetch_all($statemen, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
			  oci_execute($statemen);
			$_SESSION["x"]+=1;
			
			//$num=$result->num_rows;
			//$num=oci_num_rows($statemen);
			if($_SESSION["x"]>$num) $_SESSION["x"]=1;
			if ($num==0) restimage();
			//echo '<f id="bl"><b>'.$num.' records where found that matches your search string</b></f>';
			echo "<marquee scrolldelay='50' scrollamount='10' truespeed  style='background-color:black;font-size: 36;color:white;font-weight: bold;'  >";
			echo  "WELCOME ".strtoupper(getnmx($current_user,$conn));
			echo "</marquee>";
			if ($num > 0) 
				{
					 //while($row = $result->fetch_assoc())
					while($num>0)	 
					 {  $row = oci_fetch_array($statemen);
				       if ($_SESSION["x"]==$num)
						 {
							 $_SESSION["y"]=$row["PS_NM"];
					    $cadre=$row["PS_CDR_ID"];
						$wing=$row["PS_WING"];
						$section=$row["PS_SCTN_ID"];
						$branchh=$row["PS_BRNCH_ID"];
						$blood=$row["PS_BLD_GRP"];
						$edqual=$row["PS_EDCTNL_QLFCTN1"];
						$er_da=$row["ER_DA"];
						$er_cca=$row["ER_CCA"];
						$er_ca=$row["ER_CA"];
						$er_hra=$row["ER_HRA"];
						$er_gpf=$row["ER_GPF"];
						$er_cggis=$row["ER_CGGIS"];
						$er_cghs=$row["ER_CGHS"];
						$er_lcnc_fee=$row["ER_LCNC_FEE"];
						$er_pt=$row["ER_PT"];
						$er_it=$row["ER_IT"];
						$er_it_srchr=$row["ER_IT_SRCHR"];
						$er_rcvry_ttl=$row["ER_RCVRY_TTL"];
						$er_nt_py=$row["ER_NT_PY"];
						$tier1=$row["TIER1"];
						$room=$row["PS_ROOM_NO"];
						$pan_no=$row["PS_BLDNG"];
						$paylevel=$row["PS_FLOOR"];
						$dob=$row["PS_DT_OF_BRTH"];
						$wonw=($row["PS_FLG"]=="W")?"Working":"Not Working";
						$grpid=$row["PS_GRP_ID"];
						$doj=$row["SR_DT_OF_JN"];
						$entrycdr=$row["SR_ENTRY_CDR_ID"];
						$dor=$row["SR_DT_OF_RTRMNT"];
						$bunit=$row["CM_UNT_CD"];
						$gpfno=$row["PS_GPFNO"];
						$acomm=$row["CM_ACCMMDTN"];
						$cat=$row["SR_SC_ST_N"];//query done
						$depplace=$row["PS_DPTTN_PLACE"];
						$depdes=$row["PS_DPTTN_DESIG"];
						$dfp=$row["PS_DPTTN_FR_PLACE"];
						$bnk=$row["PS_BNK_NM"];
						$mobl=$row["PS_MOBILE_NO"];
						$_SESSION["per"]=$row["PS_IDN"];
						
						 echo  '
						 <script>
					     	document.getElementById("name").value=\''.$row["PS_NM"].'\';
							'.
							'document.getElementById("id").value=\''.$row["PS_IDN"].'\''
							.'
					     </script>
						       ';
						 //echo $row["ps_sx_tp"];
                         echo '<script>';
                         //echo 'document.getElementById("ima").src=\'images/'.'2190'.'\.jpg\'';
                         if (file_exists("photo_cag/".$row['PS_IDN'].".jpg"))
						 echo 'document.getElementById("ima").src=\'photo_cag/'.$row["PS_IDN"].'\.jpg\'';
						 //echo 'no photo';
						 echo '</script>';
						 
						 echo '<script>';
						 echo 'document.getElementById("mf").value=\''.$row["PS_SX_TYP"].'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("dob").value=\''.$dob.'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("wonw").value=\''.$wonw.'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("grpid").value=\''.$grpid.'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("doj").value=\''.$doj.'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("dor").value=\''.$dor.'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("acomm").value=\''.$acomm.'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("gpfno").value=\''.$gpfno.'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("eci").value=\''.descr($entrycdr,$conn).'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("cat").value=\''.descr($cat,$conn).'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("bunit").value=\''.descr($bunit,$conn).'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("panno").value=\''.$pan_no.'\'';
					     echo '</script>';
					     echo '<script>';
						 echo 'document.getElementById("mobl").value=\''.$mobl.'\'';
					     echo '</script>';
						 echo '<script>';
						 echo 'document.getElementById("kltva").value=\''.$row["PS_FRST_NM"].'\'';
						 echo '</script>';
						 echo '<script>';
						 echo 'document.getElementById("bldgrp").value=\''.$row["PS_BLD_GRP"].'\'';
						 echo '</script>';
						 echo '<script>';
						 echo 'document.getElementById("addr1").value=\''.$row["PS_HM_TWN_ADDRSS1"].'\'';
						 echo '</script>';
						 echo '<script>';
						 echo 'document.getElementById("addr2").value=\''.$row["PS_HM_TWN_ADDRSS2"].'\'';
						 echo '</script>';
						 echo '<script>';
						 echo 'document.getElementById("addr3").value=\''.$row["PS_HM_TWN_ADDRSS3"].'\'';
						 echo '</script>';
						 echo '<script>';
						 echo 'document.getElementById("city").value=\''.$row["PS_HM_CTY"].'\'';
						 echo '</script>';
						 echo '<script>';
						 echo 'document.getElementById("bpay").value=\''.$row["PS_PCA_BSC_JAN06"].'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("depplace").value=\''.descr($depplace,$conn).'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("depdes").value=\''.descr($depdes,$conn).'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("dfp").value=\''.descr($dfp,$conn).'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("bnk").value=\''.$bnk.'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("net").value=\''.$er_nt_py.'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("it").value=\''.$er_it.'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("itsur").value=\''.$er_it_srchr.'\'';
						 echo '</script>';
						 
						 echo '<script>';
						 echo 'document.getElementById("tr").value=\''.$er_rcvry_ttl.'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("pt").value=\''.$er_pt.'\'';
						 echo '</script>';

						 echo '<script>';
						 echo 'document.getElementById("licence").value=\''.$er_lcnc_fee.'\'';
						 echo '</script>';

						   

						 
						 
						 
						 $query = "SELECT dmn_dscrptn from estt_dmn_mstr where dmn_id  = '".$cadre."'";
						 $statemen=oci_parse($conn,$query);
	                     oci_execute($statemen);
						 $row=oci_fetch_array($statemen);
						  
						    {//$row = $result->fetch_assoc();
						     echo '<script>';
						     echo 'document.getElementById("cadre").value=\''.$row["DMN_DSCRPTN"].'\'';
						      echo '</script>';
							}
							
						 $query =  "SELECT dmn_dscrptn from estt_dmn_mstr where dmn_id  = '".$wing."'";
						 $statemen=oci_parse($conn,$query);
	                     oci_execute($statemen);
						 $row=oci_fetch_array($statemen);
						  
						    {//$row = $result->fetch_assoc();
						     echo '<script>';
						     echo 'document.getElementById("wing").value=\''.$row["DMN_DSCRPTN"].'\'';
						      echo '</script>';
							}
							
						$query = "SELECT dmn_dscrptn from estt_dmn_mstr where dmn_id  = '".$section."'";
						 $statemen=oci_parse($conn,$query);
	                     oci_execute($statemen);
						 $row=oci_fetch_array($statemen);
						  
						    {//$row = $result->fetch_assoc();
						     echo '<script>';
						     echo 'document.getElementById("level").value=\''.$row["DMN_DSCRPTN"].'\'';
						      echo '</script>';
							}
							
							
						$query = "SELECT dmn_dscrptn from estt_dmn_mstr where dmn_id  = '".$blood."'";
						 $statemen=oci_parse($conn,$query);
	                     oci_execute($statemen);
						 $row=oci_fetch_array($statemen);
						  
						    {//$row = $result->fetch_assoc();
						     echo '<script>';
						     echo 'document.getElementById("bldgrp").value=\''.$row["DMN_DSCRPTN"].'\'';
						      echo '</script>';
							}

						$query = "SELECT dmn_dscrptn from estt_dmn_mstr where dmn_id  = '".$branchh."'";
						 $statemen=oci_parse($conn,$query);
	                     oci_execute($statemen);
						 $row=oci_fetch_array($statemen);
						  
						    {//$row = $result->fetch_assoc();
						     echo '<script>';
						     echo 'document.getElementById("branchh").value=\''.$row["DMN_DSCRPTN"].'\'';
						      echo '</script>';
							}	


						 echo '<script>';
						     echo 'document.getElementById("edqual").value=\''.$edqual.'\'';
						      
						  echo '</script>';

						  echo '<script>';
						  echo 'document.getElementById("da").value=\''.$er_da.'\'';
						  echo '</script>';

						  echo '<script>';
						  echo 'document.getElementById("ta").value=\''.$er_ca.'\'';
						  echo '</script>';

						  echo '<script>';
						   echo 'document.getElementById("daonta").value=\''.$er_cca.'\'';
						   echo '</script>';


						  echo '<script>';
						   echo 'document.getElementById("hra").value=\''.$er_hra.'\'';
						   echo '</script>';

						  echo '<script>';
						   echo 'document.getElementById("gpf").value=\''.$er_gpf.'\'';
						   echo '</script>';

						  echo '<script>';
						   echo 'document.getElementById("cggis").value=\''.$er_cggis.'\'';
						   echo '</script>';

						  echo '<script>';
						   echo 'document.getElementById("cghs").value=\''.$er_cghs.'\'';
						   echo '</script>';
							
						 echo '<script>';
						   echo 'document.getElementById("t1").value=\''.$tier1.'\'';
						   echo '</script>';

						   echo '<script>';
						   echo 'document.getElementById("hq").value=\''.$room.'\'';
						   echo '</script>';

						   echo '<script>';
						   echo 'document.getElementById("paylevel").value=\''.$paylevel.'\'';
						   echo '</script>';
							
							
							
						
							
						
							
						
							
							
						 }
							  // $inc_elee=$inc_ele;
							//   while($inc_elee==$inc_elem);
							   
						$num-=1; 
					 }
				}
			}
/*
function test_input2($data) 
	{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = htmlentities($data);
	return $data;
	}

function getdesc($desc,$conn,$opto='no')
	    {
	    	//require_once("./include/membersite_config.php");
           //$conn=oci_connect($fgmembersite->orauser(),$fgmembersite->orap(),$fgmembersite->oraho());
	      $desc=strtoupper(($desc)); 
          if (!$conn)
			{
				echo 'Failed to connect to Oracle';
	     		die("Connection failed: " . $conn->connect_error);
			}
		if ($opto!='usual')
	      $query="select dmn_id from estt_dmn_mstr where 
	         upper(replace(dmn_dscrptn,'&','and')) like"." '$desc'";
	    else
	      $query="select dmn_id from estt_dmn_mstr where 
	         upper((dmn_dscrptn)) like"." '$desc'";

	// echo $query;echo '<br>';
	// $query="select dmn_id from estt_dmn_mstr where lower(dmn_dscrptn) like 'economic & revenue sector audit'";
	// echo $query;	;echo '<br>';
	      $statemen=oci_parse($conn,$query);
	      oci_execute($statemen);
	      if ( $row=oci_fetch_array($statemen))
	 	    {   //echo $row["DMN_ID"];
	 		return $row["DMN_ID"];
	        }
	    //echo 'none found';
	      return '%';
	    }


function descr($dmnid,$conn)
	    { 
	    	//require_once("./include/membersite_config.php");
           //$conn=oci_connect($fgmembersite->orauser(),$fgmembersite->orap(),$fgmembersite->oraho());
	      $dmnid=strtoupper($dmnid); 
          if (!$conn)
			{
				echo 'Failed to connect to Oracle';
	     		die("Connection failed: " . $conn->connect_error);
			}
	      $query="select dmn_dscrptn from estt_dmn_mstr where 
	              dmn_id like"." '$dmnid'";
	// echo $query;echo '<br>';
	// $query="select dmn_id from estt_dmn_mstr where lower(dmn_dscrptn) like 'economic & revenue sector audit'";
	// echo $query;	;echo '<br>';
	              //return "shalo";
	      $statemen=oci_parse($conn,$query);
	      oci_execute($statemen);
	      if ( $row=oci_fetch_array($statemen))
	 	    {   //echo $row["DMN_ID"];
	 		return $row["DMN_DSCRPTN"];
	        }
	    //echo 'none found';
	      return 'Not Given';
	    }
	
*/
?>

</body>
