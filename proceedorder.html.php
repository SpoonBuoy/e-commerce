<?php
include_once 'index.html.php';
@session_start();
include 'mysqlconnect.php';
$query = "SELECT user_id FROM users WHERE username = '{$_SESSION['username']}' "; //Get user id of user
		$ids = mysqli_query($link, $query);
		while($id = mysqli_fetch_array($ids)){
			$user_id = $id['user_id'] ;
			}	
?>
<div id="proceedorderbody">
<table align="center">


<?php /*
		$booksdb = array('product_id', 'book_price', 'book_name');
		$stationarydb = array('product_id', 'item_price', 'item_name');
		if(!isset($_SESSION['cart'])){
		$tablename = trim($_POST['tablename']);
		$productname = trim($_POST['productname']);
		$quantity = $_POST['quantity'];
		}
		else{
		$tablename = trim($_SESSION['tablename']);
		$productname = trim($_SESSION['productname']);
		$quantity = $_SESSION['quantity'];
		}
		
		if($tablename == 'books'){ //SELECT books TABLE
			list($itemid, $itemprice, $itemname) = $booksdb;
			}
		elseif($tablename == 'startionary_item'){ //SELECT startionary_items TABLE
			list($itemid, $itemprice, $itemname) = $stationarydb;
			}
		$query = "SELECT $itemprice FROM $tablename WHERE $itemname = '$productname' LIMIT 1 "; //Get product details
		$details = mysqli_query($link, $query);
		while($detail = @mysqli_fetch_array($details)){
			$productprice = $detail[$itemprice];
			}
			$amount = $quantity * $productprice;
		echo "<td> $productname, Rs.$productprice </br> Quantity: $quantity </br> Total Amount: Rs.$amount </td>"; */
		?>
</tr>
<?php
		$query = "SELECT *FROM user_address WHERE user_id ='$user_id'";
		$result = mysqli_query($link, $query);
		$country = array();
		$state = array();
		$city = array();
		$pincode = array();
		$fulladdress = array();
		$addressid = array();
		$count = 0;
		while($address=mysqli_fetch_array($result)){
		$country[] = $address['country'];
		$state[] = $address['state'];
		$city[] = $address['city'];
		$pincode[] = $address['pincode'];
		$fulladdress[] = $address['full_address'];
		$addressid[] = $address['address_id'];
		$count++;
		}
		$pages = $count;
		if(isset($_REQUEST['pn']))
			{ $i = $_REQUEST['pn']; $back = $i-1; $i++;  $pagenumber = $_REQUEST['pn']; $start = $pagenumber;}
		elseif($_SESSION['cart'] == 1 && !isset($_REQUEST['pn'])){
				$quantity = $_SESSION['quantity'];
				$productname = $_SESSION['productname'];
				$tablename = $_SESSION['tablename'];
				$i=1; $start=0;
				$_SESSION['cart'] = 0;
				}
		else{ $i = 1; $start = 0;
				$_SESSION['quantity'] = $_POST['quantity'];
				$_SESSION['productname'] = $_POST['productname'];
				$_SESSION['tablename'] = $_POST['tablename'];}
		$quantity = $_SESSION['quantity'];
		$productname = $_SESSION['productname'];
		$tablename = $_SESSION['tablename'];
		echo"<tr> <td> Order Details: </td><td> $productname </br> Quantity: $quantity </td> </tr>";
		$end = $start + 1;
		for($j=$start; $j<$end; $j++){
			$addressidselected = $addressid[$j];
		echo " 
			<tr> 
			<td> Address:</td> <td> {$fulladdress[$j]} </br> {$city[$j]} </br> {$state[$j]} </br> {$country[$j]} </br> {$pincode[$j]} </br>";
		if($pages-$pagenumber != 1){
			echo "
				
				<form action='?pn=$i' method='post'> 
				<input type='submit' name='changeaddress' id='submit' value='Use Another Address'> </td> </form> ";
			}
		/*if($pagenumber >= 1){
			echo " $back
				 <td colspan='2'>
				<form action='?pn=$back' method='post'> 
				<input type='submit' name='changeaddress' id='submit' value='Use Previous Address'> </td> </tr>";
				}*/
			
			}
	
	
?>
<tr>
<td>
Payment :
</td>
<td> Only COD mode of payment is accepted</br> <img src="png/cod.png" height="50px"> </td>
<tr>
<td colspan='2'>
<form action="buyuseraction.html.php?choice=Buy" method='post'>
<input type='hidden' name='quantity' value='<?php echo "$quantity";?>'>
<input type='hidden' name='tablename' value='<?php echo "$tablename";?>'>
<input type='hidden' name='productname' value='<?php echo "$productname";?>'>
<input type='hidden' name='addressid' value='<?php echo "$addressidselected" ; ?>' >
<input type='submit' id='placeorder' name='placeorder' value='Place Order'>
</form>
</td>
</tr>
</table>
</div>
