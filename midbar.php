<head>

<style>
.dropbtn 
	{
		font-size: 16px;
		border: none;
	}
.dropdown 
	{
		position: relative;
		display: inline-block;
		float:left;
		width:20%;
	}

.dropdown-content 
	{
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}

.dropdown-content button 
	{
		color: white;
		font-weight: bold;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}


.dropdown-content button:hover 
	{
		background-color: #f1f1f1;
	}


.dropdown:hover .dropdown-content 
	{
		display: block;
	}

.dropdown:hover .dropbtn 
	{
		background-color: #3e8e41;
	}
.ddbutton
	{
		background-color: #4CAF50;
		color: white;
		width:100%;
		border: none;
		cursor: pointer;
	}
.ddbutton:hover
    {
		opacity: 0.5;
		color:red;
    }

</style>
</head>
<body>
<div class="dropdown">
  <button class="dropbtn"> Menu1</button>
  <div class="dropdown-content">
    <button type="button" id="bx1" class="ddbutton" >biodata</button>
    <button type="button" id="bx2" class="ddbutton" >Office details</button>
    <button type="button" id="bx3" class="ddbutton" >Pay details</button>
  </div>
</div>
</body>