<html>
<body>

<br> Please Login
<form action="login.php" method="post" >
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" /><br />
        <label for="password">Password:</label><input type="password" name="password" /><br />
        <input type="submit" value='Login'>
    </fieldset>
    </form>

    <?php

echo "<br> or please <a href=registerform.php>Register</a><br>";
?>

</body>
</html>