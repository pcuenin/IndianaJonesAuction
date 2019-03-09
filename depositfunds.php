<?php
include("config.php");
include("checklogin.php");
$getbalance ="select * from Users where UserID='".$_SESSION['UserNumID']."'";
$result=mysql_query($getbalance);
$row=mysql_fetch_array($result);

$newbalance =$row['Balance']+$_POST['Balance'];
$updatebalance ="UPDATE Users SET Balance= '".$newbalance."' AND BIDBALANCE= '".$newbalance."' WHERE UserID='".$_SESSION['UserNumID']."';"; //query to get results for that user name
$result=mysql_query($updatebalance); //execute query
echo $result;

echo" Your new account balance is ".$newbalance;

?>