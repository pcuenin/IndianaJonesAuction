<?php
include("config.php");
session_start();
 //copy userTrue variable to $loggedin
if($_SESSION['loggedin']===TRUE){
	header("Location:index2.php");
}
else{
	header("Location:loginform.php");
}
?>