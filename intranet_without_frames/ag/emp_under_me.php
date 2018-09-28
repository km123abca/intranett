<head>
<?PHP

require_once("./empdbfunctions.php");
$privarray=array('ag'=>'9023','dag_admin'=>'9022','dag_sgs2'=>'9025','dag_sgs3'=>'9027','dag_lba'=>'9020');
$conn=true;
//echo "hello";

$conn=oci_connect('ags','ags','localhost/xe');
	if (!$conn)
	{
	echo 'Failed to connect to Oracle';
	die("Connection failed: " . $conn->connect_error);
	}



	function store2debug($contentt)
  		{
  	$file_save=fopen("debugfile.txt","w+");
  	flock($file_save,LOCK_EX);
  	fputs($file_save,$contentt."\n");
    flock($file_save,LOCK_UN);
  	fclose($file_save);
  		}
?>
<style>
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
							#hea2
							{
							text-align: center;
							float:left;
							width:100%;
                    		font-weight: bold;
                    		background-color:#eee; 
							}

</style>
<h1 id='hea2'>STAFF LIST</h1>


<!-- Jquery script added on 12 June 2018-->
<script src="../ag/outsidejs/jq.js"></script>
<script>
$(document).ready(
                  function()
                  {
                  $("#fs").on("keyup", function() {
                                                        var value = $(this).val().toLowerCase();
                                                        $("#tablebody tr").filter(
                                                                                function() {
                                                                                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                                                            }
                                                                                );
                                                        }
                                  );

                    }
                  );
</script> 
<!-- Jquery script added on 12 June 2018-->
</head>

<body>
    <a href="empdb.php" >back to main page</a>
    
    <?php

    
      echo '<div id=\'sea\'>Type any part of whatever you need to search here:<input type=\'text\' id=\'fs\'></div>';
    
    $wing='%';
    $bran='S03';
    
    $current_user='none';
    if (isset($_REQUEST['cu'])) $current_user=$_REQUEST['cu'];
    //$current_user='Hema CV';

   
    if ($current_user=='basic')
    	{
    	echo "<script>";
    	echo "window.location.href='empdb.php';";
    	echo "</script>";
    	}

    $query="select a.* from access_mazter a,role_mazter 
			where a.idno=role and usr='$current_user'";

	if (array_key_exists($current_user,$privarray)) 
	    	$current_user=$privarray[$current_user];
	$statemen=oci_parse($conn,$query);
	oci_execute($statemen);
	store2debug($query);
			//store2debug($query);
	if( $row=oci_fetch_array($statemen))
		{
            $awings=$row['WING'];
	        $abranches=$row['BRANCH'];
	        $asections=$row['SECTIONN'];
	        $ids=$row['IDS'];
	        //if  ($row["IDNO"]=='basic') $ids=$current_user;

	        $subquery="and ( ";
	        foreach(explode(',',$awings) as $awing)
	        		{
            $subquery.=" ps_wing like '$awing' or ";
	        		}
	        $subquery=substr($subquery, 0,-3).") and (";
	        foreach(explode(',',$ids) as $aid)
	        		{
            $subquery.="ps_idn like '$aid' or ";
	        		}
	        $subquery=substr($subquery, 0,-3).") and (";
	        foreach(explode(',',$abranches) as $abranch)
	        		{
            $subquery.="ps_brnch_id like '$abranch' or ";
	        		}
            $subquery=substr($subquery, 0,-3).") and (";
	        foreach(explode(',',$asections) as $asection)
	        		{
            $subquery.="ps_sctn_id like '$asection' or ";
	        		}
	        $subquery=substr($subquery, 0,-3).")";
		}
		else
	        	{//echo 'no access';
	             
	             //echo '';
	             die('<br><warn> Something wrong happened</warn><br>');
	             }
	$statemen=oci_parse($conn,$query);
	oci_execute($statemen);
	echo    "<table id='t01'><thead>";
	echo	"<tr>
			<th>Head Officer</th>
			<th>Wing</th>
			<th>Reporting officer</th>
			<th>Reporting officer</th>
			<th>Designation</th>
			<th>Section</th>
			<th>hq?</th>
		    </tr></thead><tbody id='tablebody'>
		    ";

	

        //store2debug($subquery);
        $current_user=getid($current_user,$conn);
		$query="select  a.ps_nm DAG,a.branch branch,
		                b.ps_nm reporting_officer,b.cadre designation,b.section section,b.ps_idn ppid,
		                decode(b.dec,'HQ','Hqrs','Field') hq,b.ps_idn idemp
		                from
                            (select ps_nm,ps_brnch_id,brn.dmn_dscrptn branch,
                                    ps_cdr_id,ps_wing 
                                    from 
                                    prsnl_infrmtn_systm,estt_dmn_mstr brn 
									where brn.dmn_id(+)=ps_brnch_id and ps_flg='W' and 
									ps_idn='$current_user'
							) a,
							(select ps_nm,ps_brnch_id,cdr.dmn_dscrptn cadre,sec.dmn_dscrptn section,
							        ps_cdr_id,sec.dmn_shrt_nm dec,ps_idn,nvl(p_s,9999) sr_snrty
									from 
									prsnl_infrmtn_systm,estt_dmn_mstr cdr,estt_dmn_mstr sec,
									(select ps_idn pdd,pbr_snrty p_s from KER_BILLS_PERS_INF) kb
									where cdr.dmn_id(+)=ps_cdr_id and sec.dmn_id(+)=ps_sctn_id and 
									ps_flg='W'  
									and pdd(+)=ps_idn ".$subquery."
							) b
						where a.ps_brnch_id=b.ps_brnch_id(+) and 
						a.ps_wing like ('$wing')  
						order by b.ps_cdr_id,b.sr_snrty,a.ps_wing,a.ps_brnch_id,b.ps_cdr_id,decode(b.dec,'HQ','Hqrs','Field')";
		store2debug($query);
		$statemen=oci_parse($conn,$query);
		oci_execute($statemen);
                $dagprev='km';
                $branchprev='km';
                $cnt=1;
		while( $row=oci_fetch_array($statemen))
				{
				$dag=$row["DAG"];
				$branch=$row["BRANCH"];
                ($dagprev!=$dag)?$dagprev=$dag:$dag='';
                if ($branchprev!=$branch) $cnt=1;
                ($branchprev!=$branch)?$branchprev=$branch:$branch='';
                $empid=$row["IDEMP"];
				$officer=$row["REPORTING_OFFICER"];
				$desig=$row["DESIGNATION"];
				$section=$row["SECTION"];
				$hq=$row["HQ"];
				$ppid=$row["PPID"];
				echo "<tr>";
				echo "<td>$dag</td>";
				echo "<td>$branch</td>";
				echo "<td>$cnt.$officer</td>";
				echo "<td><a href='http://10.53.214.109:8012/intranett/intranet_without_frames/ag/empdb.php?specuser=$ppid'><img src='..\ag\photo_cag\\".$empid.".jpg' alt='no photo' style='width:100px;height:122px;'></a></td>";
				echo "<td>$desig</td>";
				echo "<td>$section</td>";
				echo "<td>$hq</td>";
				echo "</tr>";
				$cnt+=1;
				}
		
	echo "</tbody></table>";
    
	?>
</body>