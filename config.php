<?php


$host = 'localhost'; //IP Address on domain name of the host for the database

$user ='root'; //the name o fthe user

$pass="";//we had no password


$con=mysql_connect($host,$user,$pass) or //make the connection to the database
die('Error connecting to mysql');

$dbname = "test"; //we had a database name books
mysql_select_db($dbname);

?>