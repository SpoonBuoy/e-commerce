<?php
include_once 'index.html.php';
?>
<div id="loginbody">
<div id="output">
<?php echo "$output"; ?>
</div>
<form action="loginaction.html.php" method="post">
<fieldset>
<legend> Log In </legend>
<label for="loginusername">
Username: <input type="text" name="loginusername" required="yes"> </label> </br>
<label for="loginpassword">
Password: <input type="password" name="loginpassword" required="yes"> </label> </br>
<input type="submit" name="login" value="Login">
</fieldset>
