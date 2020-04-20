<?php
session_start();
include 'index.html.php'
?>
<div id="memberpage">
<table align="center" rows="4" cols="3">
<th colspan="3"> <?php echo "{$_SESSION['username']}" ?> </th>
<tr> <td> Account Info </td> <td> <?php echo  " Name: {$_SESSION['username']} </br> Gender:{$_SESSION['gender']} </br> Phone: {$_SESSION['phone']} </br>
						Email: {$_SESSION['email']} " ?> </td> </tr>
<tr> <td> Address Deatil </td> <td><?php echo "Country: {$_SESSION['country']} </br> City: {$_SESSION['city']} </br> Pin: {$_SESSION['pincode']}" ?> </td> </tr>
<tr> <td> Further Info </td> <td> <?php echo "Full Adress: {$_SESSION['fulladdress']}" ?> </td> </tr>
</table>