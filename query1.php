<?php
if(!mysqli_query($link, $query))
{
	$output = "ERROR" .mysql_error($link);
	include 'output.php';
	exit();
}
$output = "UPDATED";
include 'output.php';
?>