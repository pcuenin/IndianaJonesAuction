<?php


$query="select * from items"; // create query using the $_GET 'id' sent
echo "<br><br><br> Please choose an item to bid on<br><br>"; // promps user to order a book
$result=mysql_query($query); //results from executing the mysql query
	if(!$result) // if not results
	{
	echo" get Items error"; // print error
	exit;
	}
	while($row=mysql_fetch_array($result)) // while there are results
	{
	echo "<br>ID Number: ".$row['ProductID'].
	"<br>Name:  ".$row['Name'].
	"<br>Description: ".$row['Description']. //print row price, name, author
	"<br>Current Bid: ".$row['Price']." Gold Doubloons".
	"<br>Auction Ending: ".$row['EndTime'].
	"<br><img src=\"photos/".$row['Photo']."\" alt=\"Item\" style=\"width:300px;\">". //photo goes here
	"<br><a href=bidform.php?id=".$row['ProductID']."&pr=".$row['Price'].">Bid on Item</a><br>"; // allow user to add the items to their cart
	
}
?>