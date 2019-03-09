<?php
//$date = date_create('2000-01-01');
//$now=date_format($date, 'Y-m-d H:i:s');

//SELECT * FROM items INNER JOIN users ON items.SellerID=users.UserID WHERE items.WinnerID IS NULL AND NOW() > items.EndTime ;

$sellerjoin="SELECT * FROM items INNER JOIN users ON items.SellerID=users.UserID WHERE items.WinnerID IS NULL AND items.EndTime < CURDATE() ;";
$Itemsresult=mysql_query($sellerjoin);
if(!$Itemsresult) // if not results
	{
	echo" get Items & Winners error"; // print error
	//exit;
	} 

////SELECT * FROM items INNER JOIN users ON items.SellerID=users.UserID WHERE items.WinnerID IS NULL AND NOW() > items.EndTime ;
$buyerjoin="SELECT * FROM items INNER JOIN users ON items.BuyerID=users.UserID WHERE items.WinnerID IS NULL AND items.EndTime < CURDATE() ;";
$Usersresult=mysql_query($buyerjoin);
if(!$Usersresult) // if not results
	{
	echo" get items & sellers error"; // print error
	//exit;
	} 


// update seller
while($row=mysql_fetch_array($Itemsresult))
{
	$NewBalance=$row['Balance']+$row['Price'];
	$updateseller="update users set Balance ='".$NewBalance."' where UserID ='".$row['BuyerID']."'"; //updating balance after purchase
	//mysql_query($updateseller);
	if(mysql_query($updateseller)!==TRUE){
		 echo "Error: " . $updateseller . "<br>";
	}
}
// update buyer and item
while($row=mysql_fetch_array($Usersresult))
{
	$thisID=$row['BuyerID'];
	$NewBalance=$row['Balance']-$row['Price']; //preparing balance for update statement
	$updatebuyer="update users set Balance ='".$NewBalance."' where UserID ='".$row['BuyerID']."'"; //updating balance after purchase
	$updateitem="update items set WinnerID = '".$row['BuyerID']."' where ProductID='".$row['ProductID']."'"; //updating winner id
	//mysql_query($updatebuyer);
	if(mysql_query($updatebuyer)!==TRUE){
		 echo "Error: " . $updatebuyer . "<br>";
	}
	//mysql_query($updateitem);
	if(mysql_query($updateitem)!==TRUE){
		 echo "Error: " . $updateitem . "<br>";
	}
}
?>