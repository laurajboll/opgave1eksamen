<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST") // Her tjekkes, om brugeren har trykket på "login"-knappen
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) // Vi tjekker, om user_name og password er udfyldt, og at brugernavnet ikke kun består af tal
		{

			// Hvis ovenstående er udfyldt læses informationerne fra databasen
			$query = "select * from users where user_name = '$user_name' limit 1"; // Vi sammenligner, om det brugernavn der er indtastet af brugeren, findes i databasen. "Limit 1" sørger for, at vi kun får 1 resultat
			$result = mysqli_query($con, $query); // Skrives for at få resultatet 

			if($result) // Vi tjekker, om resultatet er rigtigt
			{
				if($result && mysqli_num_rows($result) > 0) // Hvis resultatet er positivt, og antallet af rækker er større end 0, hentes data ved nedenstående kode
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password) // Hvis passwordet i databasen er det samme, som det password brugeren har givet.. se næste kommentar
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php"); // Hvis alt virker, omdirigeres brugeren til index-siden
						die;
					}
				}
			}
			
		} else
		{
			echo "<p> <font color=#FFFFFF>Forkert brugernavn eller kodeord! </font> </p>"; // Udskriver denne sætning, hvis ovenstående ikke er opfyldt. 
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Log ind</title>
	<link rel="stylesheet" href="stylesheet.css">

</head>
<body>
	<div id="box">
		
		<form class="form" method ="post"> <!-- De felter der bliver tjekket i ovenstående kode -->
			<div style="font-size: 20px;"><h1>Log ind</h1></div>
			<label class="label" for="user_name">Brugernavn:</label>
			<input id="text" type="text" name="user_name"><br><br>
			<label class="label" for="password">Adgangskode:</label>
			<input id="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Log ind"><br><br> <!-- Login-knap -->

			<a href="signup.php">Er du ny bruger? Tilmeld dig</a><br><br> <!-- Link til signup-siden -->
		</form>
	</div>
</body>
</html>