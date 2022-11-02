<?php
function check_login($con).  // Funktionen tjekker om brugeren er logget ind.
{

	//En session opbevare information i form af variabler, som kan bruges på tværs af flere sider.
	if(isset($_SESSION['user_id'])) //Her tjekker vi om der i sessionen er et user_id
		
	{
		//Her tjekkes om user_id eksisterer i databasen
		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1"; //Der oprettes en forespørgsel til databasen

		$result = mysqli_query($con,$query); //Result variablen defineres
		if($result && mysqli_num_rows($result) > 0) //Hvis resultatet er positivt og antallet af rækker er større end 0, hentes data ved nedenstående kode.
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data; //Brugerens data bliver returneret.
		}
	}

	//Hvis ovenstående ikke virker bliver brugeren omdirigeret til login siden.
	header("Location: login.php");
	die; //Sørger for at koden ikke fortsætter.

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 

		$text .= rand(0,9);
	}

	return $text;
}
