<head>
<script type="text/javascript">
	function proc()
		{
			var myObj = {"name":"zhinyatz Belkin", "age":31, "area":"Krokovian Republic"};
			var myJSON = JSON.stringify(myObj);
			var mo=JSON.parse(myJSON);
			localStorage.setItem("testJSON", myJSON);
			window.location = "demo_json.php?x=" + myJSON;
			document.getElementById('uu').innerHTML=mo.name;
		}
</script>
</head>



<body>
<b1 id='uu'></b1>
<button type="button" onclick="proc()"> Click</button>

</body>