<?php
include("config.php");
session_start();

$query="select * from Users where UserName='".$_POST['username']."'"; //query to get results for that user name
$result=mysql_query($query); //execute query
if($result===null and $_POST['password']!=$_POST['password2']){ // if results
	header("Location:registerform.php");
}
else{


$sql = "INSERT INTO Users (UserName, Password)
VALUES ('".$_POST['username']."','".$_POST['password']."')";

if (mysql_query($sql) === TRUE) {
	$_SESSION['loggedin']=true;
	$_SESSION['UserID']=$_POST['username'];
	$query="select * from users where UserName='".$_POST['username']."';"; //query to get results for that user name
	$result=mysql_query($query); //execute query
	while($row=mysql_fetch_array($result)){
	
		
		$_SESSION['UserNumID']=$row['UserID'];
		header("Location:index2.php");


	}




    echo "Thank you for registering";
    echo "Return to <a href=index2.php>Home</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; 
} 
}
?>