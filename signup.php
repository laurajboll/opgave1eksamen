<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST") // Vi tjekker om brugeren har trykket på "tilmeld"-knappen
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) // vi tjekker om user_name og password er udfyldt og at brugernavnet ikke kun består af tal
		{

			// Hvis det er udfyldt, så gemmes informationerne i databasen og en bruger er oprettet
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')"; //den laver et random user_id der består af 20 tal

			mysqli_query($con, $query); // vi gemmer til databasen

			header("Location: login.php"); // redirect til login-siden efter oprettelse
			die;
		}else
		{
			echo "<p> <font color=#FFFFFF>Venligst indtast gyldigt information! </p>"; //hvis ovenstående ikke er udfyldt, så udsriver den dette
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
<title>Opret bruger</title>	
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
	<div id="box">
	<form class="form" method ="post"> 
	<div style="font-size: 20px;"><h1>Opret ny bruger</h1></div>
			<label class="label" for="user_name">Brugernavn:</label>
			<input id="text" type="text" name="user_name"><br><br>
			<label class="label" for="password">Adgangskode:</label>
			<input id="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Tilmeld dig"><br><br>
			<a href="login.php">Er du allerede bruger? Log ind</a><br><br> <!--link til login-siden  -->
		</form>
	</div>
</body>
</html>