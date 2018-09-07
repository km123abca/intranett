<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
$conn=oci_connect($fgmembersite->orauser(),$fgmembersite->orap(),$fgmembersite->oraho());




function store2debug($contentt)
  {
  $file_save=fopen("debugfile.txt","w+");
  flock($file_save,LOCK_EX);
  fputs($file_save,$contentt."\n");
  
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }

?>
<head>

<h1 id="hea2">   </h1>

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
              .hea2
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
             .colgrey
             {
              color:#545d6b;
             }
             .bl
             {
              font-weight: bold;

             }
 </style>
<script >



 function Ajax_Send(GP,URL,PARAMETERS,RESPONSEFUNCTION)
  {     
    var xmlhttp  = new XMLHttpRequest();;
    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState == 4){
      if (RESPONSEFUNCTION=="") return false;
      //console.log('hello'+RESPONSEFUNCTION);
      eval(RESPONSEFUNCTION(xmlhttp.responseText))
                    }
                       }

      if (GP=="GET")
            {
            URL+="?"+PARAMETERS;
            xmlhttp.open("GET",URL,true);
            xmlhttp.send(null);
            }

      if (GP=="POST")
            {
           return false;
            }
  }
 
function vallist(col)
						{
							gp='GET';
              url='vallist.php';
              params='q='+col+'&tabo=leavemonitor';
              respfn=deal;
              Ajax_Send(gp,url,params,respfn);
						}

function predealsel(col)
            {
              gp='GET';
              url='vallist2.php';
              params='valt='+col+'&valtab=leavemonitor';
              respfn=dealsel;
              Ajax_Send(gp,url,params,respfn);
            }

function deal(resptext)
  {
    //console.log(resptext);
    document.getElementById('namlist').innerHTML=resptext;
  }

function dealsel(resptext)
  {
    //console.log(resptext);
    document.getElementById('lt').innerHTML=resptext;
  }


 vallist('l_idno'); 
 predealsel('l_typ');
  </script>

  <!--  ALIEN CONTENT FOR CALENDER ADDED BY KRISHNAMOHAN  -->

                  <link href="outsidecss/jquery.datepick.css" rel="stylesheet">
          <script src="outsidejs/jq.js"></script>
          <script src="outsidejs/jquery.plugin.min.js"></script>
          <script src="outsidejs/jquery.datepick.js"></script>
          <script>
            $(function() {
            $('#sdate').datepick({dateFormat:'dd/mm/yyyy'});
            $('#edate').datepick({dateFormat:'dd/mm/yyyy'});
            $('#inlineDatepicker').datepick({onSelect: showDate});
                    });

            function showDate(date) {
                  alert('The date chosen is ' + date);
                        }
          </script>

                    <!--  ALIEN CONTENT ENDS HERE  -->

</head>


<body style="background-color: #8cade2">



<a href="empreports.php" >back to Reports</a>
    <fieldset>

    <legend class='bl'>Promotion Details</legend>
    <form method="post"  id="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <?php
    $nmtodisplay=$fgmembersite->SafeDisplay('empnm');
    //if ($nmtodisplay=='') $nmtodisplay='click here';
    ?>
   <b class='bl'>Name</b>:<input type='text' name='empnm' id='empnm' list='namlist' value='<?php  echo $nmtodisplay; ?>' >
   <datalist id='namlist'></datalist>

   

   <b class='bl'>Leave type</b>:
   <select id='lt' name='lt'>
   </select>
   

   

   <?php
  $d21=$fgmembersite->SafeDisplay('sdate');
  $d22=$fgmembersite->SafeDisplay('edate');
  if ($fgmembersite->SafeDisplay('sdate')=='') $d21=date("d/m/Y");
  if ($fgmembersite->SafeDisplay('edate')=='') $d22='31/12/'.date("Y");

  ?>
  start date:<input type='text' name='sdate' id='sdate' placeholder="DD/MM/YY" value=<?php echo "'".$d21."'";?>  > 
  end date  :<input type='text' name='edate'  id='edate' placeholder="DD/MM/YY" value=<?php echo "'".$d22."'";?> >

   <input type="submit" name="maindbsub" value="Get" id="maindbsub" class='maindbbutton'> 
    </form>
    </fieldset>

<?php
if (($_SERVER["REQUEST_METHOD"] == "POST") &&(array_key_exists('empnm',$_POST)))
{



 $nm=$_POST['empnm'];
 $lt=$_POST['lt'];
// $sdate='to_date(\''.$_POST["sdate"].'\',\'DD/MM/YY\')';
 //$edate='to_date(\''.$_POST["edate"].'\',\'DD/MM/YY\')';
 $sdate=$_POST["sdate"];
 $edate=$_POST["edate"];
        
$query="select a.l_idno id,
           b.ps_nm name,
           a.l_typ leavetype,
           a.fromdate fromd,
           a.todate tod,
           a.days days,
           a.rmrks rmrks,
           cdr.dmn_dscrptn cadre
from
           leavemonitor a,prsnl_infrmtn_systm b,estt_dmn_mstr cdr
where
           a.l_idno=b.ps_idn  and b.ps_nm like '$nm' and a.l_typ like '$lt' and cdr.dmn_id(+)=ps_cdr_id and
          ( 
          (a.todate between  to_date(nvl('$sdate', '01/01/'||to_char(sysdate,'yyyy')),'dd/mm/yyyy')  and to_date(nvl('$edate', '31/12/' ||to_char(sysdate,'yyyy'))    ,'dd/mm/yyyy')) or
           (a.fromdate between   to_date(nvl('$sdate', '01/01/'||to_char(sysdate,'yyyy')),'dd/mm/yyyy')  and  to_date(nvl('$edate', '31/12/' ||to_char(sysdate,'yyyy'))    ,'dd/mm/yyyy')) 
          )
            order by a.fromdate";
  store2debug($query);



 
 $statemen=oci_parse($conn,$query);
 oci_execute($statemen);
 $count=0;
 while( $row=oci_fetch_array($statemen))
 	{
 		$count+=1;
 		if ($count==1)
 		{   
 			echo " <div class='hea2 colgrey'>Leave History of </div><div class='hea2'>".$nm.", ".$row["CADRE"]."</div>";
 			
 			echo "<table id='stab'>";
			echo "<tr>"; 
			echo "<th>Leave Type</th>" ;
			echo "<th>From</th>" ;
      echo "<th>To</th>" ;
      echo "<th>Days</th>" ;
 			echo "</tr>";
 		}
 $leavetype =$row["LEAVETYPE"];
 $fromd     =$row["FROMD"];
 $tod       =$row["TOD"];
 $days      =$row["DAYS"];

 echo "<tr>
       <td>$leavetype</td>
       <td>$fromd</td>
       <td>$tod</td> 
       <td>$days</td>
       </tr>";
	}

echo "</table>";



}

?>





</body>