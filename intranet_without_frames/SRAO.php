<head>
<?PHP


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
    <a href="index.php" >back to main page</a>
    
    <?php

    
      echo '<div id=\'sea\'>Type any part of whatever you need to search here:<input type=\'text\' id=\'fs\'></div>';
    
    $wing='%';
    $bran='S03';
    if (isset($_REQUEST['branch'])) $bran=$_REQUEST['branch'];
	echo    "<table id='t01'><thead>";
	echo	"<tr>
			<th>Group Officer</th>
			<th>Wing</th>
			<th>Reporting officer</th>
			<th>Reporting officer</th>
			<th>Designation</th>
			<th>Section</th>
			<th>hq?</th>
		    </tr></thead><tbody id='tablebody'>
		    ";

		
		$query="select  a.ps_nm DAG,a.branch branch,
		                b.ps_nm reporting_officer,b.cadre designation,b.section section,
		                decode(b.dec,'HQ','Hqrs','Field') hq,b.ps_idn idemp
		                from
                            (select ps_nm,ps_brnch_id,brn.dmn_dscrptn branch,
                                    ps_cdr_id,ps_wing 
                                    from 
                                    prsnl_infrmtn_systm,estt_dmn_mstr brn 
									where brn.dmn_id(+)=ps_brnch_id and ps_flg='W' and 
									ps_cdr_id in ('DA00','DA01','DA02','DA04','DA05','DA07','DA08')
							) a,
							(select ps_nm,ps_brnch_id,cdr.dmn_dscrptn cadre,sec.dmn_dscrptn section,
							        ps_cdr_id,sec.dmn_shrt_nm dec,ps_idn
									from 
									prsnl_infrmtn_systm,estt_dmn_mstr cdr,estt_dmn_mstr sec
									where cdr.dmn_id(+)=ps_cdr_id and sec.dmn_id(+)=ps_sctn_id and 
									ps_flg='W' and ps_cdr_id in ('DB01','DB03','DB04','DB06','DB02','DB05')
							) b
						where a.ps_brnch_id=b.ps_brnch_id(+) and a.ps_wing like ('$wing') and a.ps_brnch_id like '$bran' 
						order by a.ps_wing,a.ps_cdr_id,a.ps_brnch_id,b.ps_cdr_id,decode(b.dec,'HQ','Hqrs','Field')";
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
				echo "<tr>";
				echo "<td>$dag</td>";
				echo "<td>$branch</td>";
				echo "<td>$cnt.$officer</td>";
				echo "<td><img src='..\ag\photo_cag\\".$empid.".jpg' alt='no photo' style='width:100px;height:122px;'></td>";
				echo "<td>$desig</td>";
				echo "<td>$section</td>";
				echo "<td>$hq</td>";
				echo "</tr>";
				$cnt+=1;
				}
		
	echo "</tbody></table>";
    
	?>
</body>