<?php include("checklogin.php");
include("config.php");
?>

<html>
<body>
<br> Item information
<form  action="sell.php" method="post" enctype="multipart/form-data">
    <fieldset>
    	<label for="Name">Name:</label><input type="text" name="Name" /><br /><br>
        <label for="Description">Description:</label><input type="text" name="Description" /><br /><br>
        <label for="Price">Price:</label><input type="int" name="Price" /><br /><br>
        <!--<label for="ProductID">ProductID:</label><input type="text" name="ProductID" /><br /> -->
        <!--<label for="EndTime">EndTime:</label><input type="text" name="EndTime" /><br /> -->
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" name="sellitem" id="sellitem" value="Sell" />
    </fieldset>
    </form>
</body>
</html> 