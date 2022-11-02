<?php
// På de næste 4 linjer defineres variabler til host, username, password og database navnet for at oprette forbindelse.
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "login_sample_db";

// Hvis der ikke oprettes forbindelse bliver udskrevet 'Kunne ikke oprette forbindelse'. 
if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname))

// Die er alias for exit() function. Denne printer en besked og afslutter scriptet.
{
    die("Kunne ikke oprette forbindelse!");
}
