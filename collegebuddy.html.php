<?php
@session_start();
$buy='buy';
$home='home';
$sell='sell';
$freelance='freelance';
$join='join';
$register='register';
?>
<div class="header" id="header">	
<table>
<tr>
<td> </td> <td> </td> <td> </td> <td> </td> <td> </td> 
<td width="50px" height="50px" align="center">
<a href="aboutus.html.php"> <img src="png/aboutus.png" width="30px" height="30px">
</td>
<?php
if($_SESSION['login'] == 1){
echo "
<td width='50px' height='50px' align='center'>
<a href='useraccount.html.php'>
<img class='settings' src='png/settings.png' width='30px' height='30px'>
</a>
</td>
<td width='50px' height='50px' align='center'>
<a href='cart.html.php'>
<img class='carticon' src='png/carticon.png' width='30px' height='30px'>
</a>
</td>
<td width='50px' height='50px' align='center'>
<a href='loginaction.html.php?logout=yes'>
<img class='loginicon' src='png/logout.png' width='30px' height='30px'>
</a>
</td> ";
}
else{
echo "
<td width='50px' height='50px' align='center'>
<a href='login.html.php'>
<img class='loginicon' src='png/login.png' width='30px' height='30px'>
</a>
</td> ";
}
?>
</tr>
</table>
</div>
<div class="heading" id="heading">
<H1 align="center"> the COLLEGE BUDDY.com </H1>
</div>
<div class="navigation" id="navigation">
<table align="center">
<tr>
<td id=<?php echo "$home"?> > <a href="index.html.php"> Home </a> </td> <td id= <?php echo "$buy" ?> > <a href="buy.html.php"> Buy </a> </td>
<td id=<?php echo "$sell" ?> > <a href=#> Sell </a> </td>  <td id= <?php echo "$freelance" ?> > <a href="freelance.html.php"> Freelance </a> </td>
<td id=<?php echo "$join" ?> > <a href='events.html.php'> Events </a> </td> <td id=<?php echo "register" ?> > <a href="register.html.php"> Register </a> </td>
</tr>
</table>
</div> 
<div class="footer" id="footer">
<table>
<tr>
<td>
&copy; theCOLLEGEBUDDY 2020</td>
<td class="contact" width="400px" align="center">
Have Questions? </br>
<a href="contactus.html.php"> CONTACT US </a>
</td>
<td>
<a href="#"> Terms &amp; Conditions </a>
</td>
</tr>
</table>
</div>