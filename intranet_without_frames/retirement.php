<?PHP

$conn=oci_connect('ags','ags','localhost/xe');
function getsel($str)
      {
        $disp='';
      if (isset($_POST["wing"]))
         {
          $disp=($str==($_POST["wing"]))?'selected':'';
         }
      return $disp;
      }

function cleaan($desc,$conn)
      { 
        if ($desc=='%') return $desc;        
        $desc=strtoupper($desc); 
          if (!$conn)
      {
        echo 'Failed to connect to Oracle';
          die("Connection failed: " . $conn->connect_error);
      }
        $query="select dmn_id from estt_dmn_mstr where 
                dmn_dscrptn like"." '$desc'";
  
        $statemen=oci_parse($conn,$query);
        oci_execute($statemen);
        if ( $row=oci_fetch_array($statemen))
        {   //echo $row["DMN_ID"];

      return $row["DMN_ID"];
          }
     
        return $desc;
      }

  function descr($dmnid,$conn)
      { 
        if ($dmnid=='%') return $dmnid;
      $dmnid=strtoupper($dmnid); 
        if (!$conn)
      {
        echo 'Failed to connect to Oracle';
          die("Connection failed: " . $conn->connect_error);
      }
      $query="select dmn_dscrptn from estt_dmn_mstr where 
                dmn_id like"." '$dmnid'";
      $statemen=oci_parse($conn,$query);
      oci_execute($statemen);
      if ( $row=oci_fetch_array($statemen))
        {   
      return $row["DMN_DSCRPTN"];
          }
      return 'Not Given';
      }



?>
<head>

<h1 id="hea2">  <center>Employees retiring with in the next 2 months</center> </h1>

<style>
table#stab 
              {
                width: 100%; 
                background-color: #f1f1c1;
              }
              th
              {
              text-align: left;
              }
              table#stab tr:nth-child(even) 
              {
                background-color: #eee;
              }
              table#stab tr:nth-child(odd) 
              {
                background-color: #fff;
              }
              table#stab th 
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

              button
              {
              background-color: black;
              color:white;
              border:none;
              font-weight: bold;
              width:100%;
              cursor: pointer;
             }

             body
             {
              background-color: #abc1a4;
             }
 </style>
<script >




 function rearrange(str)
  {   
            
      window.location.href="retirement.php?ord="+str;
  }
 
  

  
  </script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

</head>


<body>



<a href="testpage.html" >back to main page</a>
  <br>
Filter:<input type='text' id='fs'>
   <br>

<form method="post"  id="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table id="stab">
<thead>
<tr> 
    <th><button type="button" onclick="rearrange('ps_nm')">Name</button></th> 
    <th><button type="button" onclick="rearrange('ps_cdr_id')">Designation</button></th> 
    <th><button type="button" onclick="rearrange('ps_wing')">Office</button></th> 
    <th><button type="button" onclick="rearrange('ps_brnch_id')">Functional Wing</button></th>
    <th><button type="button" onclick="rearrange('ps_sctn_id')">Section</button></th>
    <th><button type="button" onclick="rearrange('ps_dt_of_brth')">Retirement date</button></th>
        
 </tr>
</thead>
<tbody id='tablebody'>
<?php
   
       
          
$query="select ps_idn idd,
               ps_nm namee,
               cdr.dmn_dscrptn cadre,
               ps_floor levell,
               sec.dmn_dscrptn sectionn,
               wng.dmn_dscrptn wingg,
               brn.dmn_dscrptn branch,
               last_day(add_months(ps_dt_of_brth,720)) retdate 
        from 
               prsnl_infrmtn_systm a,
               estt_dmn_mstr sec,
               estt_dmn_mstr wng,
               estt_dmn_mstr cdr,
               estt_dmn_mstr brn
        where  ps_sctn_id=sec.dmn_id(+) and ps_wing=wng.dmn_id(+)  and cdr.dmn_id(+)=ps_cdr_id  and brn.dmn_id(+)=ps_brnch_id
          and  last_day(add_months(ps_dt_of_brth,720))>sysdate and ps_dt_of_brth is not null
          and last_day(add_months(ps_dt_of_brth,720)) between sysdate and add_months(sysdate,2)
          and ps_flg='W' ";

$ord=" order by ps_dt_of_brth";
$ordparam='ps_dt_of_brth';
if(isset($_REQUEST["ord"])) $ordparam=$_REQUEST["ord"];
//$ordar=array('p1'=>'c1','p2'=>'c2','p3'=>'c3','cd'=>'cd','p4'=>'c4','p5'=>'c5');
//$ordparam=$ordar[$ordparam];

    if (!isset($_SESSION['toggle'])) $_SESSION['toggle']='';
    if ($_SESSION['toggle']!='desc') $_SESSION['toggle']='desc';
    else $_SESSION['toggle']='';
if (!($ordparam=='ps_dt_of_brth')) $ordparam="nvl(".$ordparam.",'0')";
if (!($ordparam=='ps_dt_of_brth')) 
$ord=" order by $ordparam ".$_SESSION['toggle'];
else
$ord=" order by $ordparam ";
$query.=$ord;


 
 
 $statemen=oci_parse($conn,$query);
 oci_execute($statemen);
 while( $row=oci_fetch_array($statemen))
 	{
 $cadre1    =$row["CADRE"];
 $name1     =$row["NAMEE"];
 $section1  =$row["SECTIONN"]; 
 $wing1    =$row["WINGG"];
 $branch1   =$row["BRANCH"];
 $retdate1  =$row["RETDATE"];
 
 //echo 'the session variable is now:'.$_SESSION['toggle'];
 echo "<tr>
       <td>$name1</td> 
       <td>$cadre1</td> 
       <td>$wing1</td>
       <td>$branch1</td> 
       <td>$section1</td>
       <td>$retdate1</td> 
       </tr>";
	}


?>
</tbody>
</table>

</form>



</body>