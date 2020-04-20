<!DOCTYPE html>
<html lang="en">
   <head>
	<title>CONTACT</title>
	<meta charset="utf-8" \>
	<link href="contact.css" rel="stylesheet" type="text/css"/>
	<link href="style.css" rel="stylesheet" type="text/css"/>
   </head>
<body>
<?php
include 'collegebuddy.html.php'
?>
<div class="contactbody" id="contactbody">
<img src="png/address.jpg" width="20px" height="20px">
<b>
218, Mansbal </br>
NIT, Srinagar </br>
J &amp; K,190001 
</b> </br>
</br>
<b> 
<img src="png/phone.png" width="20px" height="20px">
+91-8899624821 </br>
<img src="png/phone.png" width="20px" height="20px">
+91-9797782600 </br> </br>
<img src="png/email.jpg" width="20px" height="20px"> thecollegebuddy@gmail.com
</br> </br>
</b>
<div id="outputcontact">
<p align="center">
<b>
<?php echo "$output"; ?>
</b>
</p>
</div>
<div class="query" id="query">
<form action="userqueryaction.html.php" method="post"> 
<fieldset> <legend> <b> Have Queries? </b> </legend>
<label for="name">Name: 
<input type="text" name="name"> </label> </br> 
<label for="phone">Phone:
<input type="text" name="phone"> </label> </br>
<label for="email"> E-mail:
<input type="text" name="email"> </label> </br>
Write Your Query:
<textarea name="query" id="query"> </textarea> </br>
<input type="submit" name="sendquery" value="Send Your Query">
<input type="reset" value="Reset">
</fieldset>
</div>
</body>
</html>