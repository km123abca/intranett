<?php
require_once("./empdbfunctions.php");
require_once("./include/membersite_config.php");
	if(!$fgmembersite->CheckLogin())
		{
    $fgmembersite->RedirectToURL("login_frames.php");
    exit;
		}

$conn=oci_connect($fgmembersite->orauser(),$fgmembersite->orap(),$fgmembersite->oraho() );
  	if (!$conn)
				{echo 'Failed to connect to Oracle';
			     die("Connection failed: " . $conn->connect_error);
				}
	
?>
<head>
<script src="empdbscriptss.js"></script>
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


</style>
</head>

<body>
<hea id="hea2" style="width:90%;">leave approver</hea>
 <a href='logout.php'> <f><img src='images\logoutt.jpg' alt='logout' style="width:111px;height:48px;float:right;"></f></a>
<?php
if (($_SERVER["REQUEST_METHOD"] == "POST") &&(array_key_exists('apy0',$_POST)))
		{echo "<button type='button' id='ack' onclick='hidee()'>approvals/denials confirmed, 
	           click here to hide notification</button>";
	     $_SESSION["secdef"]='y';//session variable to keep this tab alive when the page reloads
		$cn=0;
		while(array_key_exists("apy$cn",$_POST))
			{
		
		$pid=$_POST["idinp$cn"];
		$pfid=$_POST["fdinp$cn"];
		$ptid=$_POST["tdinp$cn"];
		$papy=$_POST["apy$cn"];


        $elleave2=0;
        $clleave2=0;
        $leavetyp2=$_POST["typinp$cn"];
        $days2=$_POST["daysinp$cn"];
		$clleave2=$_POST["clleaveinp$cn"];
		$elleave2=$_POST["elleaveinp$cn"];


		//$papn=$_POST["apn$cn"];
        $apr=$papy;
        if($apr=='y')
        {
        if (($leavetyp2=='CL')&&(($clleave2-$days2)>=0)) $clleave2-=$days2;
        else if ($leavetyp2=='CL') $apr='n';
        if ($leavetyp2=='EL') $elleave2+=$days2;   
        
        }
        else
        {

        if ($leavetyp2=='CL') $clleave2+=$days2;
        if ($leavetyp2=='EL') $elleave2-=$days2;	
        }
        //check if already approved
        $query="select aproved from leaveapplication where 
		        idno='$pid' and
		        todate='$ptid' and
		        fromdate='$pfid' ";
		$statemen=oci_parse($conn,$query);
		oci_execute($statemen);
		$prevaprove='none';
		while( $row=oci_fetch_array($statemen))
		{
         $prevaprove=$row["APROVED"];
		}
       
         //only if there are changes in approval
        if ($prevaprove!=$apr)
        {
		$query="update leaveapplication set  aproved='$apr',cl=$clleave2,el=$elleave2
		        where 
		        idno='$pid' and
		        todate='$ptid' and
		        fromdate='$pfid' ";
		$statemen=oci_parse($conn,$query);
		oci_execute($statemen);

		$query="update leaveapplication set  cl=$clleave2,el=$elleave2
		        where 
		        idno='$pid'  ";
		$statemen=oci_parse($conn,$query);
		oci_execute($statemen);
        }

        $cn+=1;
			}

		}

?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
      onsubmit="return confirm('Are you sure you want to submit this form?');">
<table id="t01">
<tr>
<th><b1 class="bl"> ID Number</b1></th>
<th><b1 class="bl"> Name</b1></th>
<th><b1 class="bl"> From Date</b1></th>
<th><b1 class="bl"> To Date</b1></th>
<th><b1 class="bl"> Number of Days</b1></th>
<th><b1 class="bl"> Leave Type</b1></th>
<th><b1 class="bl"> CL remaining</b1></th>
<th><b1 class="bl"> EL taken</b1></th>
<th><b1 class="bl"> Approved?</b1></th>
</tr>

<?php

$query="select idno,ps_nm,fromdate fd,todate td,aproved,days,typ,nvl(el,0) el,nvl(cl,0) cl
        from leaveapplication,prsnl_infrmtn_systm where ps_idn=idno";
$statemen=oci_parse($conn,$query);
oci_execute($statemen);
$count=0;
while( $row=oci_fetch_array($statemen))
		{
$idno=$row["IDNO"];
$nm=$row["PS_NM"];
$fd=$row["FD"];
$td=$row["TD"];
$ap=$row["APROVED"];
$days=$row["DAYS"];
$typ=$row["TYP"];
$elleave=$row["EL"];//29Jan
$clleave=$row["CL"];//29Jan
$chn="checked";
$chy="";
if($ap=='y') 
	{
	$chy="checked";
	$chn="";
	}

echo "<tr>";

echo "<td><inp id='id$count' name='id$count'> $idno</inp>";
echo "<input id='idinp$count' name='idinp$count' class='novis' type='text' value='$idno'></td>";

echo "<td><inp id='nm$count' name='nm$count'> $nm</inp>";
echo "<input id='nminp$count' name='nminp$count' type='text' class='novis' value='$nm'></td>";

echo "<td><inp id='fd$count' name='fd$count'> $fd</inp>";
echo "<input id='fdinp$count' name='fdinp$count' type='text' class='novis' value='$fd'></td>";

echo "<td><inp id='td$count' name='td$count'> $td</inp>";
echo "<input id='tdinp$count' name='tdinp$count' type='text' class='novis' value='$td'></td>";

echo "<td><inp id='days$count' name='days$count'> $days</inp>";
echo "<input id='daysinp$count' name='daysinp$count' type='text' class='novis' value='$days'></td>";

echo "<td><inp id='typ$count' name='typ$count'> $typ</inp>";
echo "<input id='typinp$count' name='typinp$count' type='text' class='novis' value='$typ'></td>";

echo "<td><inp id='clleave$count' name='clleave$count'> $clleave  </inp>";
echo "<input id='clleaveinp$count' name='clleaveinp$count' type='text' class='novis' value='$clleave'></td>";

echo "<td><inp id='elleave$count' name='elleave$count'> $elleave</inp>";
echo "<input id='elleaveinp$count' name='elleaveinp$count' type='text' class='novis' value='$elleave'></td>";

echo "<td>yes<input type='radio' id='apy$count' name='apy$count' value='y' $chy>";
echo "no<input type='radio' id='apn$count' name='apy$count' value='n' $chn></td>";
echo "</tr>";
$count+=1;
		}
?>
</table>


<input type="submit" name="subut2" id="subut2" value="confirm approval/denial" >
</form>
<ul>

<li id="leaveerror"><warn>*CL limit exceeded</warn></li>
</ul>


</body>