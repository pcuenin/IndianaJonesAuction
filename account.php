<link rel="stylesheet" type="text/css" href="mystyle.css">

<?php
include("checklogin.php");
include("config.php");



$query="select * from users where UserID =".$_SESSION['UserNumID'];

$result=mysql_query($query); //results from executing the mysql query
	if(!$result) // if not results
	{
	echo" get Items error"; // print error
	}
	while($row=mysql_fetch_array($result))
	{
	echo
	"<h1>Account Page<br></h1>
	<h3>Account Balance:".$row['Balance']."<br></h3>";
	}


	$query="select * from items where SellerID=".$_SESSION['UserNumID']; 

	$result=mysql_query($query);
	echo "<h3>Items you are selling: </h3> <br>";
	if(!$result) // if not results
	{
	echo  "Not selling any items";
	 // print error
	}
	while($row=mysql_fetch_array($result))
	{
	echo"<br>ID Number: ".$row['ProductID'].
	"<br>Name: ".$row['Name'].
	"<br>Description: ".$row['Description']. //print row price, name, author
	"<br>Current Bid: ".$row['Price']." Gold Doubloons".
	"<br>Auction Ending: ".$row['EndTime'].
	"<br><img src=\"photos/".$row['Photo']."\" alt=\"Item\" style=\"width:300px;\">"; //photo goes here
	}

	$query="select * from items where BuyerID=".$_SESSION['UserNumID'];
	//echo $query;
	$results=mysql_query($query);
	//echo $results;
	echo "<h3>Items you are the highest bidder on:</h3><br>";
	if(!$results)
	{
		echo"<br>Not Currently bidding on any items";
	}
	while($row=mysql_fetch_array($results))
	{
	echo
	"
	<br>ID Number: ".$row['ProductID'].
	"<br>Name:  ".$row['Name'].
	"<br>Description: ".$row['Description']. //print row price, name, author
	"<br>Current Bid: ".$row['Price']." Gold Doubloons".
	"<br>Auction Ending: ".$row['EndTime'].
	"<br><img src=\"photos/".$row['Photo']."\" alt=\"Item\" style=\"width:300px;\">"; //photo goes here
	}

	$query="select * from items where WinnerID=".$_SESSION['UserNumID'];
	//echo $query;
	$results=mysql_query($query);
	//echo $results;
	echo "<h3>Items you have won:</h3><br>";
	if(!$results)
	{
		echo"<br>Not Currently won any items";
	}
	while($row=mysql_fetch_array($results))
	{
	echo
	"
	<br>ID Number: ".$row['ProductID'].
	"<br>Name:  ".$row['Name'].
	"<br>Description: ".$row['Description']. //print row price, name, author
	"<br>Current Bid: ".$row['Price']." Gold Doubloons".
	"<br>Auction Ending: ".$row['EndTime'].
	"<br><img src=\"photos/".$row['Photo']."\" alt=\"Item\" style=\"width:300px;\">"; //photo goes here
	}

	echo 
	"<h3><br><a href=depositfundsform.php>Deposit Funds in Your Account</a> 
	<br><a href=sellitemform.php>Sell an item</a>
	<br><a href=index2.php>Keep Shopping</a> </h3>";
?>

