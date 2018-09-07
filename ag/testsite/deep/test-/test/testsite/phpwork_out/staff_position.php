<head>

<h1 id="h1">   </h1>

<style>
table, th, td 
	{
    border: 1px solid black;
     text-align: left;
     border-collapse: collapse;

    }
    tr:hover {background-color: #f5f5f5;}
    tr:nth-child(even) {background-color: #f2f2f2;}
    th {
    background-color: #4CAF50;
    color: white;
}
 </style>
</head>


<body>

<script>
document.getElementById("h1").innerHtml=' Staff Position as on '+Date();
</script>

<table>
<tr> <th>Designation</th>  <th>TVM</th> <th>TCR</th> <th>EKM</th> <th>KTM</th> <th>KDE</th> <th>Sum</th>    </tr>
<?php
$query="select cd,dmn_dscrptn cadre,c1 tvm,c2 tcr,c3 ekm,c4 ktm,c5 kde,c6 total 
            from
            (select distinct ps_cdr_id cd from prsnl_infrmtn_systm ) aa,

            (select ps_cdr_id cd1,count(ps_cdr_id) c1 from prsnl_infrmtn_systm where 
                    ps_room_no='TVM' and ps_wing='W01' AND   ps_flg='W'
                    group by ps_cdr_id)a,

			(select ps_cdr_id cd2,count(ps_cdr_id) c2 
					from prsnl_infrmtn_systm where 
 					ps_room_no='TCR' and ps_wing='W01' AND   ps_flg='W'
					group by ps_cdr_id) b,

			(select ps_cdr_id cd3,count(ps_cdr_id) c3 
					from prsnl_infrmtn_systm where 
 					ps_room_no='EKM' and ps_wing='W01' AND   ps_flg='W'
					group by ps_cdr_id) c, 

			(select ps_cdr_id cd4,count(ps_cdr_id)  c4
					from prsnl_infrmtn_systm where 
 					ps_room_no='KTM' and ps_wing='W01' AND   ps_flg='W'
					group by ps_cdr_id) d,
			(select ps_cdr_id cd5,count(ps_cdr_id) c5 
					from prsnl_infrmtn_systm where 
 					ps_room_no='KDE' and ps_wing='W01' AND   ps_flg='W'
					group by ps_cdr_id) e,

			(select ps_cdr_id cd6,count(ps_cdr_id) c6 
					from prsnl_infrmtn_systm where 
 					ps_wing='W01' AND   ps_flg='W'
					group by ps_cdr_id) f,

			estt_dmn_mstr 

		where dmn_id(+)=cd and
              cd=cd1(+) and 
              cd=cd2(+) and 
              cd=cd3(+) and 
              cd=cd4(+) and
			  cd=cd5(+) and
			  cd=cd6(+)
        order by cd";


 $conn=oci_connect("ags","ags","localhost/xe");
 $statemen=oci_parse($conn,$query);
 oci_execute($statemen);
 while( $row=oci_fetch_array($statemen))
 	{
 $cadre=$row["CADRE"];
 $tvmcount=$row["TVM"];
 $tcrcount=$row["TCR"];
 $ekmcount=$row["EKM"];
 $ktycount=$row["KTM"];
 $kdecount=$row["KDE"];
 $sum=$row["TOTAL"];
 echo "<tr> 
       <td>$cadre</td> 
       <td>$tvmcount</td>
       <td>$tcrcount</td> 
       <td>$ekmcount</td>
       <td>$ktycount</td>  
       <td>$kdecount</td>
       <td>$sum</td> 
        </tr>";
	}
?>
</table>


</body>