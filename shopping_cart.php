<?php

$i=0;
$total=0.0;

if(IsSet($_SESSION['id_c'])) // if there is a SESSION Variable id_c then proceed
{

echo "<br>--------------------------------<br>";
echo "<br> Books in your cart";
$my_cart=$_SESSION["id_c"]; //copy id_c to $my_cart array
while($i < sizeof($my_cart)) //while $i is less then the $my_cart array length
	{
	$query="Select * from bookTable2 where id='".$my_cart[$i]."'"; //create querry using the id from $my_cart @ $i
	$result=mysql_query($query); //find the results of the query
	$row=mysql_fetch_array($result); //make the query into an array

	echo"<br>Name ".$row['Name']."   $".$row['Price']."<br><a href=remove.php?id=".$row['Id'].">Remove from cart</a>";
	// print the name, price, and have a remove button that executes remove.php
	$total +=$row['Price'];  // add the price of the item to the total
	$i++;
	}
}
echo "<br>---------------------------------<br>";
echo "Your total is $".$total; // print the cost total
echo "<br><a href=empty.php> Empty cart </a>  ";
echo " <br><a href=checkout.php> Checkout </a>";

?>

