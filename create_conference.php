<?php
	session_start();

	require 'dbconfig/config.php';

	if($_SESSION['login_s'] != '1'){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Create a new conference</title>

	<link rel="stylesheet" href="css/main_style.css">
	<link rel="stylesheet" href="css/sty.css">

	<!--
	<style>
	body {
	margin: 0;
	}

	ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	width: 25%;
	background-color: #f1f1f1;
	position: fixed;
	height: 100%;
	overflow: auto;
	}

	li a {
	display: block;
	color: #000;
	padding: 8px 16px;
	text-decoration: none;
	}

	li a.active {
	background-color: #6495ED;
	color: white;
	}

	li a:hover:not(.active) {
	background-color: #555;
	color: white;
	}
	</style>-->
</head>
<body>

	<nav>
		<ul>
			<li><a href="conferencechairhomepage.php">Back to Home</a></li>
			<!--<li><a class="active" href="index.php">WebComs</a></li>
			<li><a href="logout.php">Logout</a></li>
			<li><a href="help.html">Help</a></li>
			<li><a href="contactUs.html">Contact Us</a></li>-->
		</ul>
	</nav>

	<br><br>
	
	<div id="main-wrapper">
		<center>
			<h2>Create a Conference</h2>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<form class="myform" action="create_conference.php"method="post">
			<label><b>Conference Name:</b></label><br>
			<input name="name" type="text" class="inputvalues" placeholder="Type your conference's title" required/><br>
			
			<label><b>Venue:</b></label><br>
			<input name="venue" type="text" class="inputvalues" placeholder="Venue" required/><br>
			
			<label><b>Start date:</b></label><br>
			<input name="start_date" type="date" class="inputvalues" placeholder="dd-mm-yyyy" required/><br>
			
			<label><b>End date:</b></label><br>
			<input name="end_date" type="date" class="inputvalues" placeholder="dd-mm-yyyy" required/><br>
			
			<label><b>Dead line:</b></label><br>
			<input name="deadline" type="date" class="inputvalues" placeholder="dd-mm-yyyy" required/><br>
			
			<label><b>Sponsor/s details:</b></label><br>
			<input name="sponsor_details" type="text" class="inputvalues" cols="30" placeholder="Sponsor's details" required/><br>

			<input name="create_btn" type="submit" id="register_btn" value="CREATE"/><br>
			<!--<a href="conferencechairhomepage.php"><input type="button" id="back_btn" value="Back"/></a>-->
		</form>
		
		<?php
			if(isset($_POST['create_btn']))
			{				
				$name =$_POST['name'];
				$venue = $_POST['venue'];
				$start_date = $_POST['start_date'];
				$end_date = $_POST['end_date'];
				$deadline = $_POST['deadline'];
				$sponsor_details = $_POST['sponsor_details'];				
		
				//$query= "select * from conferences '";
				//$query_run = mysqli_query($con,$query);					
					
				$query= "insert into conferences values(NULL,'$name','$venue','$start_date','$end_date','$deadline','$sponsor_details','0')";
				$query_run = mysqli_query($con,$query);
						
				if($query_run)
					{
						echo '<script type="text/javascript"> alert("Your Conference Created..Admin will Inform you more details") </script>';
					}
				else
					{
						echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
					}
			}			
		?>
	</div>
</body>
</html>
