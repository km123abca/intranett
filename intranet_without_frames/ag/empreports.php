<?php
require_once("./empdbfunctions.php");
require_once("./include/membersite_config.php");
	if(!$fgmembersite->CheckLogin())
		{
    $fgmembersite->RedirectToURL("login_frames.php");
    exit;
		}
   // include_once('../iwfheader.php');
?>
<head>
<style>


 		*
		{
			word-wrap:break-word;
		 	box-sizing:border-box;

		}
		body
		{background-color: #ffffcc;}
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

							.dropbtnx {
    						/*background-color: #555;
    						color: white;
    						padding: 16px;*/
    						font-size: 16px;
    						border: none;
									}

							
							.dropdownx {
    						position: relative;
    						display: inline-block;
    						float:left;
    						width:20%;
									  }

							.dropdownx-content {
    						display: none;
    						position: absolute;
    						background-color: #f9f9f9;
    						min-width: 160px;
    						box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    						z-index: 1;
												}

							.dropdownx-content button {
    						color: white;
    						font-weight: bold;
    						padding: 12px 16px;
    						text-decoration: none;
    						display: block;
												}


							.dropdownx-content button:hover {background-color: #f1f1f1}


							.dropdownx:hover .dropdownx-content {
    						display: block;
															   }


							.dropdownx:hover .dropbtn {
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


</style>

</head>

<body>
<?php require_once('../iwfheader.php'); ?>
<hea2 id="hea2" style="width:80%;">Various Reports for administrative uses</hea2>
  <a href='logout.php'> <f><img src='images\logoutt.jpg' alt='logout' style="width:111px;height:48px;float:right;"></f></a>
  <fieldset>
 <legend>  Reports </legend>

<!--  DROP DOWN NEW                              -->

 <div class="dropdownx" style="float:left;width:30%;">
  <button class="dropbtnx"> Important Reports   </button>
  <div class="dropdownx-content" style="margin-left:130px">
  <pre>
    <a href="employeefulllist.php">All Employee details</a>
 	<a href="staff2hq.php">Staff Position</a>
 	<a href="eventreader.php">Important Events</a>
 	<a href="section_history.php">Section History</a>
 	<a href="retirement.php">Employees due for retirement</a>  
 	<a href="sraos.php">Senior AOs /AOs reporting under each group officer</a>
 	<a href="hqfieldanalydets.php"> HQ Field Analysis (detail)</a>
 	<a href="malefemale.php"> Male/Female count </a>
 	<a href="catcount.php"> Category wise count </a>
 	<a href="promdets.php"> Promotion Details </a>
 	<a href="leavemonitor.php">  Leave Details of Probationers </a>
 	<a href="leavemonitor_cadrewise.php">  Leave Details of Probationers, cadrewise </a>
 	</pre>
  </div>
</div>

 <div class="dropdownx" style="float:left;width:30%;">
  <button class="dropbtnx"> Staff Position Reports  </button>
  <div class="dropdownx-content" style="margin-left:130px">
  <pre>
    <a href="employeefulllist.php">All Employee details</a>
 	<a href="staff2hq.php">Staff Position</a>
 	<a href='countorarepo_v3.php'>Employee Count</a>
 	<a href="staff_position_ersa.php">Staff Position Status in ERSA</a>
 	<a href="staff_position_pdc.php">Staff Position Status in PDC</a>
 	<a href="counter.php">User Specified Report for employee count</a>
 	<a href="detailer.php">User Specified Report for employee details</a>
 	<a href="sraos.php">Senior AOs /AOs reporting under each group officer</a>
 	<a href="sraoscount.php"> No of Senior AOs /AOs reporting under each group officer</a>
 	<a href="hqfieldanaly.php"> HQ Field Analysis (count)</a>
 	<a href="hqfieldanalydets.php"> HQ Field Analysis (detail)</a>
 	<a href="malefemale.php"> Male/Female count </a>
 	<a href="catcount.php"> Category wise count </a>
 	</pre>
  </div>
</div>

 <div class="dropdownx" style="float:left;width:30%;">
  <button class="dropbtnx"> Reports pertaining to Employee Count  </button>
  <div class="dropdownx-content"  style="margin-left:100px">
  <pre>
    <a href="employeefulllist.php">All Employee details</a>
 	<a href='countorarepo_v3.php'>Employee Count</a>
 	<a href="counter.php">User Specified Report for employee count</a>
 	<a href="sraoscount.php"> No of Senior AOs /AOs reporting under each group officer</a>
 	<a href="hqfieldanaly.php"> HQ Field Analysis (count)</a>
 	<a href="malefemale.php"> Male/Female count </a>
 	<a href="catcount.php"> Category wise count </a>
 	</pre>
  </div>
</div>

 <div class="dropdownx" style="float:left;width:30%;">
  <button class="dropbtnx"> Deputation Reports  </button>
  <div class="dropdownx-content">
  <pre>    
 	<a href="deputFROM.php">Persons who are on deputation from this office</a>
 	<a href="deputTO.php">Persons who are on deputation in this office</a>
 	<a href="combinedcadres.php">Staff Position cadre group wise including deputation</a>
 	</pre>
  </div>
</div>

 <div class="dropdownx" style="float:left;width:30%;">
  <button class="dropbtnx"> Misc Reports  </button>
  <div class="dropdownx-content">
  <pre>
   
 	<a href="eventreader.php">Important Events</a>
 	<a href="section_history.php">Section History</a>
 	<a href="retirement.php">Employees due for retirement</a>  
 	<a href="joiningwise.php">Employees who joined between specific dates</a> 
 	<a href="malefemale.php"> Male/Female count </a>
 	<a href="catcount.php"> Category wise count </a>
 	</pre>
  </div>
</div>

 <div class="dropdownx" style="float:left;width:30%;">
  <button class="dropbtnx"> All Reports  </button>
  <div class="dropdownx-content">
  <pre>
    <a href="employeefulllist.php">All Employee details</a>
 	<a href="staff2hq.php">Staff Position</a>
 	<a href="deputFROM.php">Persons who are on deputation from this office</a>
 	<a href="deputTO.php">Persons who are on deputation in this office</a>
 	<a href="eventreader.php">Important Events</a>
 	<a href="section_history.php">Section History</a>
 	<a href='countorarepo_v3.php'>Employee Count</a>
 	<a href="combinedcadres.php">Staff Position cadre group wise including deputation</a>
 	<a href="combinedcadres_nodepo.php">Staff Position cadre group wise excluding deputation</a>
 	<a href="staff_position.php">Staff Position Status in GSSA</a>
 	<a href="staff_position_ersa.php">Staff Position Status in ERSA</a>
 	<a href="staff_position_pdc.php">Staff Position Status in PDC</a>
 	<a href="retirement.php">Employees due for retirement</a>  
 	<a href="joiningwise.php">Employees who joined between specific dates</a> 
 	<a href="counter.php">User Specified Report for employee count</a>
 	<a href="detailer.php">User Specified Report for employee details</a>
 	<a href="sraos.php">Senior AOs /AOs reporting under each group officer</a>
 	<a href="sraoscount.php"> No of Senior AOs /AOs reporting under each group officer</a>
 	<a href="hqfieldanaly.php"> HQ Field Analysis (count)</a>
 	<a href="hqfieldanalydets.php"> HQ Field Analysis (detail)</a>
 	<a href="malefemale.php"> Male/Female count </a>
 	<a href="catcount.php"> Category wise count </a>
 	<a href="promdets.php"> Promotion Details </a>
 	<a href="leavemonitor.php">  Leave Details of Probationers </a>
 	<a href="leavemonitor_cadrewise.php">  Leave Details of Probationers, cadrewise </a>
 	</pre>
  </div>
</div>

 	
 </fieldset>
</body>