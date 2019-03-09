<?php include("checklogin.php");
include("config.php");
?>
<html>
<body>
<br> Deposite gold into your account
<form  action="depositfunds.php" method="post">
    <fieldset>
        <label for="Balance">Amount:</label><input type="int" name="Balance" /><br />
        <input type="submit" name="deposit" id="deposit" value="Add Funds" />
    </fieldset>
    </form>
</body>
</html> 