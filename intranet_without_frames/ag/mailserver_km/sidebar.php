<head>
	<style>
		*
		{
		box-sizing:border-box;
	    }
		.sb
		{
	 	position             :relative;
	 	float   			 :left;
	 	height  			 :94%;
	 	width                :300px;
	 	background-color  	 :#93a5c1;
		}
        .spec
        {
        border               :none;
        background-color  	 :#93a5c1;
        cursor               :pointer;

        }
	</style>
	<script src='rogue.js'>
	
	</script>
</head>


<body>

	<div class='sb'>
		<ul>
			<li>  <a href='index.php?sid=inbox'>Inbox</a> </li>
			<li>  <a href='index.php?sid=sent'>Sent</a> </li>
			<li>  <a href='index.php?sid=draft'>Drafts</a> </li>
	<!--		<li><button type='button' class='spec' onclick="changevisb('composebox','on')" ><u>Compose</u></button> </li>    -->
			<li><a href="javascript:changevisb('composebox','on')">Compose</a> </li>
			<li><a href="javascript:logout()">logout</a> </li>
		</ul>
	</div>

</body>