<?php

session_start();

if(isset($_SESSION['user_id'])) // Tjekker om værdien 'user_id' er aktiviveret
{
	unset($_SESSION['user_id']); // Hvis ovenstående er gældende, deaktiveres id'et

}

header("Location: login.php"); // Brugeren omdirigeres til login-siden
die;