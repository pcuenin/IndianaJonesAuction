<?php
// login check need to figure out
$index=0;
$id_cart=array();
session_start();

$id_cart=$_SESSION['id_c']; //copy id_c to $id_cart array
$pos = array_search($_GET['id'], $id_cart); // search array for id value


// Remove from array

unset($id_cart[$pos]); //unset item frmo $id_cart with the id passed
$_SESSION['id_c']=array_values($id_cart); // copy $id_cart array values to id_c
	


header("Location:index2.php");
?>