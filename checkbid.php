<?php
include("checklogin.php");
include("config.php");
if($_POST['oldprice']>$_POST['newbid']){
	echo "Sorry to low of a bid please go back and try again<br>";
}elseif($_POST['bidbalance']<$_POST['newbid']){
	echo "You don't have enough in your account go back and try again<br>";
} else{
	// UPDATE THE NEW BID PRICE AND BUYER ID FOR THE ITEM
$sqlUpdateItem = "UPDATE items SET Price = '".$_POST['newbid']."', BuyerID='".$_SESSION['UserNumID']."' WHERE ProductID='".$_POST['itemid']."'; ";
//echo $sqlUpdateItem."<br>";

// subtract the new bid price from the available balance and update the users info
$newBidBalance = $_POST['bidbalance']-$_POST['newbid'];
//echo $newBidBalance."=".$_POST['bidbalance']."(-".$_POST['newbid']."<br>";
$sqlUpdateUser="UPDATE users SET BidBalance='".$newBidBalance."' WHERE UserID='".$_SESSION['UserNumID']."';";
//echo $sqlUpdateUser."<br>";

if(mysql_query($sqlUpdateItem)===TRUE && mysql_query($sqlUpdateUser)===TRUE){
	echo "Congratulation you are the new high Bidder!";
	echo "Return to <a href=index2.php>Home</a>";
}else {
    echo "Error: " . $sqlUpdateItem . "<br>";
} 


}

/*echo "Check bid<br>";
echo "New Bid: ".$_POST['newbid']."<br>";
echo "Id: ".$_POST['itemid']."<br>";*/
?>