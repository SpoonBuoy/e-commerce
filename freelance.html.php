<!DOCTYPE html>
<html lang="en">
   <head>
	<title>FREELANCE</title>
	<meta charset="utf-8" \>
	<link href="freelance.css" rel="stylesheet" type="text/css"/>
	<link href="style.css" rel="stylesheet" type="text/css"/>
   </head>
<body>
<?php
include'collegebuddy.html.php';
?>
<div class="freelancebody" id="freelancebody">
<?php
if($_REQUEST['choice'] == NULL){
echo "<H2 align='center'> What Are You Looking For? <H2>
<table align='center' cellspacing='20'>
<tr> 
<td align='center'> <a href='freelance.html.php?choice=job'> <img src='png/work.png' width='200px' height='150px'> </a> Work</td> 
<td align='center'> <a href='freelance.html.php?choice=client'> <img src='png/hire.png' width='200px' height='150px'> </a> Hire Someone</td>
</tr>
</table>
<h4>
<p align='center'>
Please note that at this moment, we are providing freelancing to <i> college related assignments only </i>,
to know more Contact us on below provided link.
</p>
</h4>";
}
elseif($_REQUEST['choice'] == 'client'){
echo " <H3 align='center'> Right now, only clients for writing college assignments are available.</br>
		For further details, please visit Contact Us page. </H3>";
}
else{
echo " <H3 align='center'> Right now, only jobs for writing college assignments are available. </br>
		For further details, please visit Contact Us page. </H3>";
}

?>
	

</div>