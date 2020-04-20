<!DOCTYPE html>
<html lang="en">
   <head>
	<title>REGISTER</title>
	<meta charset="utf-8" \>
	<link href="register.css" rel="stylesheet" type="text/css"/>
	<link href="style.css" rel="stylesheet" type="text/css"/>
   </head>
<body>
<?php
$register="activeregister";
include 'collegebuddy.html.php'; 
?>
<div class="registerbody" id="registerbody">
<p id="error">
<?php echo "$output"; ?>
</p>
<form action="registeraction.html.php" method="post">
<fieldset> 
<legend> Sign Up </legend>
<?php
$fields=array('firstname' => 'First Name', 'lastname' => 'Last Name' , 'username' => 'Username' , 
		'password' => 'Password' , 'confirmpassword' => 'Confirm Password' , 'email' => 'E-mail' , 'phone' => 'Phone');
foreach($fields as $fieldname => $field)
{
if($fieldname == 'email'){$placeholder = "John@example.com";}
elseif($fieldname == 'phone'){$placeholder = "Max-10 digits";}
else{$placeholder  = "Max-20 characters";}
echo "
<label for='$fieldname'> $field : </label>
<input type='text' name='$fieldname' id='$fieldname' placeholder='$placeholder'> </br>
";
}
?>
<label for="gender" id="gender"> Gender :
Male <input type="radio" name="gender" value="F" <?php if('checked' == 'checked'){echo "id='male'";} ?>> Female <input type="radio" name="gender" value="M">
</label> </br>
<label for="dob">
Date of Birth: <!-- <input type="date" name="dob"> --> 
<select name= "year">
<option> Year </option>
<?php 
for($year=2020; $year>=1900; $year--){
	echo "<option> $year </option>" ;
	} ?>
</select>
<select name="month">
<option> Month </option>
<?php
for($month=1; $month<13; $month++){
	echo "<option> $month </option>";
	}
	?>
</select>
<select name="day">
<option> Day </option>
<?php
for($day=1; $day<32; $day++){
	echo"<option> $day </option>";
	}
?>
</select>
</br>
<input type="hidden" name="timeofregistration">
</br>
<input type="submit" value="Confirm" id="submit">  <input type="reset" value="Reset" id="submit">
</fieldset>
</div>
</body>
</html>