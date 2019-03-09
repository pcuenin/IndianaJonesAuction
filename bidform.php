<?php

include("checklogin.php");
include("config.php");

$availablebal=" Not working";
$query="select * from users where UserID =\"".$_SESSION['UserNumID']."\""; // get users theoretical balance
$result=mysql_query($query);


echo " <html><body> <br>  Bid on item";
echo "<br>  Item ID: ".$_GET['id']."";
echo "<br>   Item Current Bid: ".$_GET['pr']."";
$row=mysql_fetch_array($result);
	$availablebal=$row['BidBalance'];
	
echo "<br> You have this many doubloons to bid: ".$availablebal;



?>

<form action="checkbid.php" method="post" >
    
        <label for="newbid">Your bid:</label><input type="text" name="newbid" ><br >

        <?php
        echo "<input type=\"hidden\" name=\"itemid\" value=".$_GET['id']." >";
        echo "<input type=\"hidden\" name=\"bidbalance\" value=".$availablebal." >";
        echo "<input type=\"hidden\" name=\"oldprice\" value=".$_GET['pr']." >";
        ?>
        <input type="submit" value="Bid Now!">

    
    </form>