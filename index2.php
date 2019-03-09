<?php
include("header.php");
include("winnerupdate.php");

?>
<iframe width="420" height="315" src="https://www.youtube.com/embed/_6X-CLaF1xI?rel=0&amp;controls=0&amp;showinfo=0?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>

	<?php
		
		/*$query="SELECT * FROM category";  //query to get all books from one category
		$result=mysql_query($query); // results from executing the query
		if(!$result)  // if no results
			{
		echo "no result error";
		exit;
			}*/
		//$num=mysql_numrows($result); // number of rows in results
		$i=0;
		echo "<form name=F1 id=F1>"; // form name and id
		echo "<h4> Please view all of our items of antiquity below.</h4>"; // text prompt
		//echo "<select id=cat_id onChange='Books()'>"; // on selection execute Books() function in javascript which send for the getBookx.php
		//echo "<option value=-1>Not Selected</option>"; //if nothing selected value is -1

		/*while($nt=mysql_fetch_array($result))  //while $nt mysql array still has a result do
		{
			echo"<option value=".$nt['Id'].">".$nt['Name']."</option>"; // print these items from the array
		}
		echo"</select></form>"; // print the select form*/
		include("getItems.php");
		?>

		

	<?php
		// include("shopping_cart.php"); // show shopping car
		include("footer.php"); // show footer
		?>
		
	