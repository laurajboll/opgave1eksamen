<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST") // Vi tjekker om brugerenn har trykket på "tilmeld"-knappen
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) 	// vi tjekker om user_name og password er udfyldt og at brugernavnet ikke kun består af tal

		{

			// hvis det er udfyldt, så gemmes informationerne i databasen og en bruger er oprettet
			$user_id = random_num(20); //den laver et random user_id der består af 20 tal
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query); // vi gemmer til databasen

			header("Location: login.php"); // redirect til login-siden efter oprettelse
			die;
		}else
		{
			echo "Venligst indtast gyldigt information!"; //hvis ovenstående ikke er udfyldt, så udsriver den dette
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Tilmeld dig</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post"> // de felter der bliver tjekket i ovenstående kode
			<div style="font-size: 20px;margin: 10px;color: white;">Tilmeld dig</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Tilmeld"><br><br> // tilmeldingsknap

			<a href="login.php">Er du allerede bruger? Log ind</a><br><br> // link til login-siden
		</form>
	</div>
</body>
</html>
