



<?php
include("config.php");
session_start();
$query="select * from users where UserName='".$_POST['username']."';"; //query to get results for that user name
$result=mysql_query($query); //execute query
$count=mysql_num_rows($result);
$row=mysql_fetch_array($result);

if($count==1){ // if no results
		$_SESSION['loggedin']=true;
		$_SESSION['UserID']=$_POST['username'];
		$_SESSION['UserNumID']=$row['UserID'];
		header("Location:index2.php");
	
}else{

		header("Location:loginform.php");
	}


?>