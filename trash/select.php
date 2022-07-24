<html>
<head>
	<title>
		Page Select
	</title>
	<style>
		div.main
		{
			text-align: center;
	  		padding-top: 9% ;
		}
		div.box
		{
			background-color:lightblue;
			align: center;
			border: 1px solid #666;
			border-radius: 10px;
			text-align: center;
			padding: 10px;
			overflow: auto;
			display:inline-block;
			cursor: pointer;

		}
		div.box:hover, div.box:active {
			color: red;
			-webkit-transform: scale(1.1);
			-ms-transform: scale(1.1);
			transform: scale(1.1);
			transition: 0.7s ease;
		}



		.grow div{
			transition: 1s ease;
		}

		.grow div:hover{
			-webkit-transform: scale(1.2);
			-ms-transform: scale(1.2);
			transform: scale(1.2);
			transition: 1s ease;
		}

	</style>
</head>
<body bgcolor = 'seablue'>
	<div class='main'>
		<div class = 'box'>

		<h1>Submit Assignment</h1>
		</div>&nbsp&nbsp&nbsp&nbsp&nbsp
		<div class = 'box'>
		<h1>View Assignments</h1>
		</div>
	</div>
</body>
</html>
