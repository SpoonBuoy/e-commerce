<?php
include_once 'index.html.php';
@session_start();
$username = $_SESSION['username'];
include 'mysqlconnect.php';
$query = "SELECT product_name, product_price, DATE(cart_time), product_id, product_type FROM user_cart WHERE username = '$username'";
$cart = mysqli_query($link, $query);
$productname = array();
$productprice = array();
$date = array();
$productid = array();
$producttype = array();
$count =0;
while($items = mysqli_fetch_array($cart)){
	$productname[] = $items['product_name'];
	$productprice[] = $items['product_price'];
	$date[] = $items['DATE(cart_time)'];
	$productid[] = $items['product_id'];
	$producttype[] = $items['product_type'];
	$count++;
	}
$cartitems = $count;
?>
<div class="cartbody" id="cartbody">
<table align="center"  width="500px">
<tr>
<td colspan="10"><h2 align="center"> <?php echo "$username"; ?> </h2> </td> <!--<td> <a href='cartaction.html.php?empty=emptycart'> <img src='png/empty.png' width=30px' height='30px'> </a>-->  </td>
</tr>
<?php
if($cartitems == 0){
	echo "<tr> <td> <p align='center'> <b> Your Cart is Empty </b> </p> 
			</td> </tr> </table> ";
	exit();
	}
?>
<tr>
<td width="50px"> S.no </td> <td width="350px"> Product </td>
<td width='150px'> Action </td>
<td width="100px"> Product ID </td>
</tr>

<?php
if(isset($_REQUEST['page'])){ //condition to check whether any page number has been clicked
	$start = ($_REQUEST['page']*3)-3;
}
else{ //else display first page by default
	$start =0;
}
$pages = ceil($cartitems/3); //get number of pages required
if($_REQUEST['page'] == $pages){ //if any page number is clicked
	$end = $start + $cartitems%3;
	}
elseif(empty($_REQUEST['page']) && $cartitems <4){ //how to display the begginin page, knowing a page can display only 3 items
	$end = $cartitems;
	}
else{
$end =$start+3;
}
for($i=$start;$i<$end;$i++){
$sno = $i+1;
echo "
	<tr>
	<td width='50px'> $sno </td> <td width='250px'> <B> {$productname[$i]}  </br> Rs. {$productprice[$i]} </B>Date: {$date[$i]} </td>
	<td width='150px'>
	<form action='cartaction.html.php' method='post'>
	<input type='hidden' name='producttype' value='{$producttype[$i]}'>
	<input type='hidden' name='productname' value='{$productname[$i]}'>
	<input type='hidden' name='username' value='$username'>
	<input type='submit' name='action' value='Delete'> </br>
	<input type='submit' name='action' value='Buy Now'>
	</form>
	</td>
	<td width='100px'> $productid[$i] </td>
	</tr>
	";
	}
	

?>
</table>
<p align='right' id='pages'> <b> Page No:
<?php  //how to paginate?
if($cartitems > 3){ //condition to check if cartitems are more than one page could display
$pages = ceil($cartitems/3); //get number of pages required
	for($page=1; $page<=$pages;$page++){
		echo "<a href='?page=$page'> $page </a>"; //give every page a unique link to refer
		}
	}
?>
</b> </p>
</div>
 