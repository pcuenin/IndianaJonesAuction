<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<script type="text/javascript">
var xmlhttp; //Global variable to hold reference of XMLHTTPRequest object
createRequestObject(); 	//call the function createRequest to create a XMLHTTPRequest object
			// this call will be placed as soon as the page is loaded

function createRequestObject()	//here is the function to prepare appropriate XMLHTTPRequest
				// object depending on your browser
{
	if(window.XMLHttpRequest)
	{
	//code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
	// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
	alert("Your browser does not support XMLHTTP!");
	}
}
function Books()	//this is the function to initiate Ajax call
					//it will send the selected Id to getBooks.php
{

	var e=document.getElementById("cat_id");
	var id=e.options[e.selectedIndex].value;

	xmlhttp.open("GET","getBooks.php?"id="+id,true");	//sending the background getBooks.php request

	xmlhttp.onreadystatechange=handlerequest;		//when the status of request changes
													//call the handlerequest method
													//notice there are no () after the method call
													//this is used to invoke the function instructions
													//think of it as event handler
													//using() means expecting something in return
	xmlhttp.send(null);	// All is set, send the request
}

function handlerequest()	// as you saw before this is the event handler for state change
	{
	if(xmlhttp.readyState==4)
	{
	var response=xmlhttp.responseText;
	document.getElementById('bookList').innerHTML=response;
	}
	}
</script>
</head>
	
<body>
	<?php
	include("config.php");
	session_start();
	if(isset($_SESSION['loggedin'])){
	echo "<h1>Welcome to Dr. Jones' Antiquities Auction, ".$_SESSION['UserID']."! <br> <a href=account.php>Your Account</a>  
	<a href=sellitemform.php>Sell Item</a> <a href=logout.php>Sign Out</a><br></h1> ";
}
else{
	echo "<h1>Welcome to Dr. Jones' Antiquities Auction, Guest!<br>  <a href=logincheck.php>Sign In</a>   <a href=registerform.php>Register</a> <a href=sellitemform.php>Sell Item</a><br></h1> ";
}

	
	?>