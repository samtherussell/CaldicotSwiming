<!DOCTYPE html>
<html>
<head>
<title>Caldicot Swimming Club</title>

<link rel="stylesheet" href="../main.css" />
<link rel="stylesheet" href="../navbar.css" />
<link href="folly.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="email_search.js"></script>
<style type="text/css">

</style>



</head>
<body>
	<div id="wrapper">
		<br>
		<header>

			<table>
				<tr>
					<td><img alt="" src="../media/logo.jpg"></td>
					<td><span id="title">Caldicot Swimming Club</span></td>
				</tr>
			</table>


		</header>
		<br> <br>

		<nav>
			<ul id="nav">
				<li><a href="../">Home</a></li>
				<li><a href="../emaillist/">Get Addresses</a></li>
				<li><a href="#">Add Addresses</a></li>
				
			</ul>
		</nav>

		<br> <br> <br>


			<form onsubmit="email_add.php" method="POST">
Name: </br><input maxsize="40" type="text" name="name" size="50"/></br>
Email:</br><input maxsize="100" type="text" size="100" name="email" /></br>

male<input type="radio" name="gender" value="m"/>
 female<input type="radio" name="gender" value="f"/>
<select name="section">

		<option value="s">Main</option>
		<option value="b">Beginner</option>
		<option value="o">Masters</option>
		<option value="c">Committee</option>
		
	</select></br>
<input type="submit" value="Post"/>
</form>


<?php

require '../../connect.inc.php';


if(isset($_POST['name'])||isset($_POST['email'])){
	$name = mysql_real_escape_string(htmlentities($_POST['name']));
	$email = mysql_real_escape_string(htmlentities($_POST['email']));
	
	$gender = $_POST['gender'];
	
	$section = $_POST['section'];
	

	if(empty($name)||empty($email)||empty($gender)||empty($section)){
		echo 'All fields are required';
	}else{
		if(strlen($name)>100||strlen($email)>100){
			echo'One or more fields has exceeded maximum length';
		}else{
			if(mysql_query("INSERT INTO `swimming_members` VALUES('','$email','$name','','$gender','$section')")){
				echo'done';
				header('Location: '.$_SERVER['PHP_SELF']);
			}else{
				echo'ERROR try again later';
			}
		}	
		
	}


}
?>



	</div>

</body>
</html>