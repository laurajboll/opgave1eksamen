<?php 
session_start();
// vi starter en session som inkluderer filerne med userdata og forbindelse til databasen, for at tjekke om brugeren er logget ind

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Trendsetter</title>
</head>
<body>

	<a href="logout.php">Log ud</a>
	<h1>Velkommen til Restaurant Trendsetter</h1>

	<br>
	Hej, <?php echo $user_data['user_name']; ?> // Vi udskriver userdata i form at brugernavnet
</body>
</html>
