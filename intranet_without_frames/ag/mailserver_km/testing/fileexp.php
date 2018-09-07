<head>
<script>
	function callf()
	   	{
	   		window.location.href='fileexp.php?texx=y';
	   	}
</script>
</head>


<body>

									<?php
									include_once('phpfuncs.php');
									if ( isset ($_POST['tex']) && ($_SERVER["REQUEST_METHOD"] == "POST"))
										{
									store2db($_POST['tex']);		
										}
									?> 


<form  id='simform' method='post' action='<?php  htmlentities($_SERVER['PHP_SELF']);?>'  >
write something here: <input type='text' id='tex' name='tex'  value='<?php if(isset($_POST['tex'])) echo $_POST['tex'];else echo '' ;?>' >  <br>
<input type='submit' value='write to file' name='submitt' id='submitt'>

</form>
<button type='button' id='kel' onclick="callf()">display</button>	

<textarea id='texar' name='texar' rows="20" cols="50">
									<?php
									if ( isset ($_REQUEST['texx']) )
										{
									$cont=readdb();
									foreach ($cont as $line)
										echo ('This is another line:'.$line);
										}
									?>
 </textarea>
</body>