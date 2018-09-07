<head>
<script>

function Ajax_Send(GP,URL,PARAMETERS,RESPONSEFUNCTION='none')
  {     
    var xmlhttp  = new XMLHttpRequest();;
    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState == 4){
      if (RESPONSEFUNCTION=="") return false;
      //console.log('hello'+RESPONSEFUNCTION);
      if (RESPONSEFUNCTION=='none')
        return xmlhttp.responseText;
        else
      eval(RESPONSEFUNCTION(xmlhttp.responseText));
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
function conveyer(resp)
 {
 alert(resp.trim());

 }

 function sentcont()

	{
		var sub=document.getElementById('sub').value;
		var vall=document.getElementById('fileToUpload').value;
	    var params='sub='+sub+'&filz='+vall;
		Ajax_Send('GET','phpfuncs.php',params,conveyer);
	}
</script>
</head>



<body>
		<?php
		$linval="";
		if (isset($_REQUEST['lin']))
			{
               $linval=$_REQUEST['lin'];
			}

		?>
sub:<input type='text' name='sub' id='sub' size='70' value=<?php   echo "'".$linval."'";?> > <br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"  >
    <input type="submit" value="Upload Image" name="submit">
</form>



</body>