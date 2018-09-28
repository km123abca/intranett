<?php

function sanitizedb($fil="inbox.txt")
  {
  $fil='boxes/'.$fil;
  $file_save=fopen($fil,"w+");
  flock($file_save,LOCK_EX);
  fputs($file_save,"");
  
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }
function store2db($contentt,$fil="inbox.txt")
  {
  $fil='boxes/'.$fil;
  $file_save=fopen($fil,"a+");
  flock($file_save,LOCK_EX);
  fputs($file_save,$contentt."\n");
  
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }
function getlastind($conn)
	    				{       
          					if (!$conn)
							{
							echo 'Failed to connect to Oracle';
	     					die("Connection failed: " . $conn->connect_error);
							}
						$nm=0;
			      		$query="select nvl(max(slno),0) n from itcomplaints";
	      				$statemen=oci_parse($conn,$query);
	      				oci_execute($statemen);
	      				if ( $row=oci_fetch_array($statemen)) 
	      						return $row["N"];
	 	  				return $nm;
	    				}

function getid($nm,$conn)
	    {       
          if (!$conn)
			{
				echo 'Failed to connect to Oracle';
	     		die("Connection failed: " . $conn->connect_error);
			}
		
	      $query="select ps_idn from prsnl_infrmtn_systm where ps_nm like '$nm' ";
	      $statemen=oci_parse($conn,$query);
	      oci_execute($statemen);
	      if ( $row=oci_fetch_array($statemen)) return $row["PS_IDN"];
	 	  return $nm;
	    }

function getnmx($nm,$conn)
	    {       
          if (!$conn)
			{
				echo 'Failed to connect to Oracle';
	     		die("Connection failed: " . $conn->connect_error);
			}
		
	      $query="select ps_nm from prsnl_infrmtn_systm where ps_idn like '$nm' ";
	      $statemen=oci_parse($conn,$query);
	      oci_execute($statemen);
	      if ( $row=oci_fetch_array($statemen)) return $row["PS_NM"];
	 	  return $nm;
	    }

function getcl($conn,$id)
	 	{
	 	if (!$conn)
			{
				echo 'Failed to connect to Oracle';
	     		die("Connection failed: " . $conn->connect_error);
			}
		$num=18;
		//echo "num:".$num;
		$query="select nvl(min(cl),18) cl from leaveapplication where idno='$id' and aproved='y'";
	    $statemen=oci_parse($conn,$query);
	    oci_execute($statemen);
	    if ( $row=oci_fetch_array($statemen)) return $row["CL"];
	    return $num;
	 	}

function getel($conn,$id)
	 	{
	 	if (!$conn)
			{
				echo 'Failed to connect to Oracle';
	     		die("Connection failed: " . $conn->connect_error);
			}
		$num=0;
		$query="select nvl(max(el),0) el from leaveapplication where idno='$id' and aproved='y'";
	    $statemen=oci_parse($conn,$query);
	    oci_execute($statemen);
	    if ( $row=oci_fetch_array($statemen)) return $row["EL"];
	    return $num;
	 	}

function stripSearch($str)
	    {
	    $sstr=str_replace(' ', '', $str);
	    return $sstr;
	    }

function get_date($tds)
		{
		$monthh = array("01"=>"JAN", "02"=>"FEB", "03"=>"MAR",
  		"04"=>"APR","05"=>"MAY","06"=>"JUN",
  		"07"=>"JUL","08"=>"AUG",
  		"09"=>"SEP","10"=>"OCT","11"=>"NOV",
  		"12"=>"DEC");
		$tds_split=explode('/',$tds);
		$tds1=$tds_split[0].'-'.$monthh[$tds_split[1]].'-'.$tds_split[2];
		return $tds1;

		}

function test_input($data) 
		{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = htmlentities($data);
		return $data;
		}


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
require('fpdf/fpdf.php');
//A class definition
class PDF extends FPDF
		{
			var $imfil;
	function getimgg()
		{
		return $this->imfil;
		}
	function setimgg($str)
		{
		$this->imfil=$str;
		}
	function Header()
		{
			 // Logo
		$this->Image($this->imfil,150,25,30);
		// Arial bold 15
		$this->SetFont('Arial','B',25);
		// Move to the right
		//$this->Cell(80);
		// Title
			 $this->Cell(0,10,'Office of the Accountants General, Kerala',1,0,'C');
			 // Line break
			  $this->Ln(20);
		}

		// Page footer
		function Footer()
			{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
			}
		}
			




?>
