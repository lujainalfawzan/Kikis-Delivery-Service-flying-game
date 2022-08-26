<?php

// the variables below are used for the connection of the php files to the database.
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test2";


//if connection succeed
if(!$conn2 = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!"); // show if the connection to the database fails.
}

