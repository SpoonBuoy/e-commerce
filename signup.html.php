<!DOCTYPE html>
<html lang="en">
   <head>
	<title>sign up</title>
	<meta charset="utf-8"/>
	<link href="signup.css" rel="stylesheet" type="text/css"/>
	
   </head>
<body>
<div class="flashsignup" id="flashsignup">
<fieldset>
<legend>
SIGN UP </legend>
<form action="actionsignup.php", method="get">
<fieldset id="name" class="namesection">
<legend> Name Section </legend> 
<label for="firstname"> First Name </label>
<input type="text" name="firstname"> </br>
<label for="lastname"> Last Name </label>
<input type="text" name="lastname"> </br>
<label for="username"> Username </label>
<input type="text" name="username"> </br>
<label for="password"> Password </label>
<input type="text" name="password"> </br>
<label for="gender"> </label>
Male <input type="radio" name="gender" value="M"> 
Female <input type="radio" name="gender" value="F"> </br>
<label for="phone"> Phone </label>
<input type ="text" name="phone"> </br>
Date of Birth: 
<select name="month">
<?php for($i=1;$i<30;$i++)
{
	echo "<option> $i </option>";
}
?>
</select> </br>
<input type="submit" value="Sign Up" name="submit">
</form>
</body> 
</html>
