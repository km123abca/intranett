<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

function dispo()
	{
		inp.value=screen.width;
	}

  $(document).ready(
                    function()
                              {
	                             $("#button3").click(
						                                      function()
							                                     {
    						                                    $("#div1").load("demo_test.txt", 
    														                    function(responseTxt, statusTxt, xhr)
    															                     {
        														                    if(statusTxt == "success")
            													                   alert("External content loaded successfully!");
        														                    if(statusTxt == "error")
            													                   alert("Error: " + xhr.status + ": " + xhr.statusText);
    															                     }
    										                                            );
							                                     }
						                                        );
                                }
                    );

  $(document).ready( function() {
                    $("#button4").click(function(){
                                                  $.get("sampleajax.php", function(data, status){
                                                                                                  alert("Data: " + data + "\nStatus: " + status);
                                                                                                } 
                                                       );
                                                  }
                                          );
                                }
                   );

</script>
<style>
  #inp
  	{
  	width:400px;
  	}
</style>
</head>


<body>
value:<input type='text' id='inp'>
<br>
<button type='button' onclick='dispo()'>click</button>

<br>


<button type='button' id='button3' >click me </button>

<br>
<button type='button' id='button4' >click me for AJAX </button>

<script>
  inp.value='click on the button to view screen width';
</script> 
<div id='div1'>
Text here is supposed to change
</div>

</body>