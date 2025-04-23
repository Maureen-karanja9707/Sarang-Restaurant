<?php
$dbhost ="localhost";
$dbuser ="root";
$dbpass ="";
$dbname ="sarang";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect !");
}
else {
    //echo("connected with database successful");
}