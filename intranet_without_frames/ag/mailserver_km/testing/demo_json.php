<head>
<h1>HEY HEY HO HO</h1>
<script>
var cont= <?php  echo $_REQUEST['x'] ;?>;
var cha=0;
function func()
	{   //var cont2=JSON.parse(cont);
       if (cha==0)
       {
		document.getElementById('u').innerHTML='The name passed was '+cont.name;
		document.getElementById('u').innerHTML+='<br>';
		document.getElementById('u').innerHTML+='age: '+cont.age;
		document.getElementById('u').innerHTML+='<br>';
		document.getElementById('u').innerHTML+='The Place of Residence is  '+cont.area;
		document.getElementById('u').innerHTML+='<br>';
		cha=1;
		}
		else
			{document.getElementById('u').innerHTML='';
			cha=0;
		}

	}
</script>
</head>


<body>
<b1 id='u'>Something is going to appear here</b1>
<button type='button' onclick='func()'>Click here too</button>
</body>