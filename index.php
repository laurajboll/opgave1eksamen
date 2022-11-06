<?php 
// Vi starter en session, som inkluderer filerne med userdata og forbindelse til databasen, for at tjekke om brugeren er logget ind

session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Trendsetter</title>
	<link rel="stylesheet" href="index.css">

</head>
<body>

	<a href="logout.php">Log ud</a>
	<h1>Restaurant Trendsetter</h1>

	<br>
	<div class="welcome"> Velkommen, <?php echo $user_data['user_name']; ?> </div> <!-- Vi udskriver userdata i form af brugernavnet -->
</body>
</html>