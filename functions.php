<?php

function check_login($con) // Funktionen tjekker om brugeren er logget ind.
{

	//En session opbevare information i form af variabler, som kan bruges på tværs af flere sider.
	if(isset($_SESSION['user_id'])) //Her tjekker vi om der i sessionen er et user_id
	{
		//Her tjekkes om user_id eksisterer i databasen
		$id = $_SESSION['user_id']; 
		$query = "select * from users where user_id = '$id' limit 1"; //Der oprettes en forespørgsel til databasen

		//Result variablen defineres
		$result = mysqli_query($con,$query);

		//Hvis resultatet er positivt og antallet af rækker er større end 0, hentes data ved nedenstående kode.
		if($result && mysqli_num_rows($result) > 0)
		{

		/* Brugerens data kommer tilbage til brugeren og kan logge ind */
			$user_data = mysqli_fetch_assoc($result);
			return $user_data; //Brugerens data bliver returneret.
		}
	}

	//Hvis ovenstående ikke virker bliver brugeren omdirigeret til login siden.
	header("Location: login.php");
	die; //Sørger for at koden ikke fortsætter.

}


function random_num($length) //Length afgøre længden af user_id
{

	$text = ""; 
	if($length < 5) //Længden kan ikke være mindre end 5
	{
		$length = 5;
	}

	$len = rand(4,$length); //Man får et random nummer mellem 4 og ens maxnummer, som er 20.

	for ($i=0; $i < $len; $i++) { //Der laves en for loop, så ikke alle user_id har den samme længde.

		$text .= rand(0,9);
	}

	return $text; //User_id bliver returneret
}