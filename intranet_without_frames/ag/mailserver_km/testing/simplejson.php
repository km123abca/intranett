

<head>
<h1>HEY HEY HO HO</h1>
<script>
var cont= '{"name":"Jkhn","age":31,"city":"New York"}';
function func()
	{   var cont2=JSON.parse(cont);
		document.getElementById('u').innerHTML=cont2.name;
	}
</script>
</head>


<body>
<b1 id='u'>Something is going to appear here</b1>
<button type='button' onclick='func()'>Click here too</button>
</body>



<!--
<!DOCTYPE html>
<html>
<body>

<h2>Create Object from JSON String</h2>

<p id="demo"></p>

<script>
var txt = '{"name":"John", "age":30, "city":"New York"}'
var obj = JSON.parse(txt);
document.getElementById("demo").innerHTML = obj.name + ", " + obj.age;
</script>

</body>
</html>
-->