<?php
include_once 'index.html.php';
@session_start();
include_once 'mysqlconnect.php';
if(isset($_REQUEST['addressid'])){
	$id = $_REQUEST['addressid'];
	$query = "DELETE FROM user_address WHERE address_id = '$id' LIMIT 1";
	mysqli_query($link, $query);
	$output = "Address Deleted";
	}
	
	
if(isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];
	if($_REQUEST['action'] == 'cancel'){
	$query = "DELETE FROM orders WHERE order_id = '$id' LIMIT 1";
	mysqli_query($link, $query);
	$output = "Your request for cancelling the order was successfull";
	}
	elseif($_REQUEST['action'] == 'return'){
	$query = "INSERT INTO order_return VALUES('$id', NOW())";
	mysqli_query($link, $query);
	$query = "UPDATE orders SET order_status='Process' WHERE order_id = '$id' ";
	mysqli_query($link, $query);
	$output = "Request for Return is Successfull";
	}
	}

$query = "SELECT user_id FROM users WHERE username = '{$_SESSION['username']}' LIMIT 1";
		$result = mysqli_query($link, $query);
		while($id = mysqli_fetch_array($result)){
			$userid = $id['user_id'];
			}
?>
<div id='useraccount'>
<table align='center'>
<?php
if(isset($_REQUEST['view'])){
	if($_REQUEST['view'] == 'orders'){
		$query = "SELECT DAY(DATE(NOW())) AS date ";
		$result= mysqli_query($link, $query);
		while($row = mysqli_fetch_array($result)){
		$today = $row['date'] ;
		}
		$query = "SELECT *FROM orders WHERE user_id = '$userid'";
		$result = mysqli_query($link, $query);
			$orderid = array();
			$productid = array();
			$orderprice = array();
			$orderstatus = array();
			$orderdate = array();
			$addressid = array();
			$caption = array();
			$image = array();
			$count = 0;
		while($row = mysqli_fetch_array($result)){
			$orderid[] = $row['order_id'];
			$productid[] = $row['product_id'];
			$orderprice[] = $row['order_price'];
			$orderstatus[] = $row['order_status'];
			$orderdate[] = $row['order_date'];
			$addressid[] = $row['address_id'];
			$count++;
			}
		echo "<tr> <td> Order ID </td> <td> Order Price </td> <td> Order Date </td> <td> Address ID </td> <td> Order Status </tr>";
		for($i=0; $i<$count; $i++){
			if($orderstatus[$i] == 'Succcess'){ $image[$i] = " 'png/confirm.png' width='30px' height='30px'  "; $caption[$i] = "Confirmed"; $action = "<a href='?id={$orderid[$i]}&action=cancel'> <img src='png/failed.png' width='30px' height='30px'> Cancel It </a>";  }
			elseif($orderstatus[$i] == 'Failed'){ $image[$i] = " 'png/failed.png' width='30px' height='30px' "; $caption[$i] = "Failed"; $action = ' ';}
			elseif($orderstatus[$i] == 'Shipped'){ $image[$i] = " 'png/shipped.png' width='30px' height='30px' "; $caption[$i] = "Shipped"; $action = ' ';}
			elseif($orderstatus[$i] == 'Process') {$image[$i] = " 'png/shipped.png' width='30px' height='30px' "; $caption[$i] = "Processing Return"; $action = ' ';}
			else{$image[$i] = " 'png/delivered.png' width='30px' height='30px' "; $caption[$i] = "Delivered"; $action = "<a href='?id={$orderid[$i]}&action=return'> <img src='png/return.png' width='30px' height='30px'> Return </a> ";}
			echo "<tr> <td> {$orderid[$i]} </td>  <td> Rs.{$orderprice[$i]} </td>  <td> {$orderdate[$i]} </td>  <td> {$addressid[$i]} </td> <td> <img src={$image[$i]}> {$caption[$i]} </td> <td> $action </td> </tr>";
			}
			}
		elseif($_REQUEST['view'] == 'address'){
			$query = "SELECT *FROM user_address WHERE user_id ='$userid'";
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
		echo "<tr> <td> Address ID </td> <td> <a href='addressform.html.php'> <img src='png/add.png' width='30px' height='30px'> Add Address </a>  </tr>";
		for($i=0; $i<$count; $i++){
			echo "<tr> <td> {$addressid[$i]} </td>  <td> {$fulladdress[$i]} </td>  <td> {$city[$i]} </td>  <td> {$state[$i]} </td> <td> {$country[$i]} ,</td> <td> {$pincode[$i]} </td> <td> <a href='?addressid={$addressid[$i]}'> <img src='png/empty.png' width='30px' height='30px'> </a> </td> </tr>";
			}
			}
	elseif($_REQUEST['view'] == 'info'){
			$query = "SELECT *FROM users WHERE user_id = '$userid' LIMIT 1 "; 
			$result = mysqli_query($link, $query);
			while($row = mysqli_fetch_array($result)){
				$firstname = $row['first_name'];
				$lastname = $row['last_name'];
				$phone= $row['phone'];
				$email = $row['email'];
				$password = $row['password'];
				}
			echo "<tr> <td> First Name </td> <td> Last Name </td> <td> Phone </td> <td> Email </td> <td> Password </td> </tr>";
	echo "<tr> <td> {$firstname} </td>  <td> {$lastname} </td>  <td> {$phone} </td>  <td> {$email} </td> <td> {$password} </td>  </tr>";
			}
		
			}
else{ echo"

<th> Hello {$_SESSION['username']}   </th>
<tr>
<td> <a href='?view=orders'> <img src='png/notes.png' width='40px' height='40px'>  Orders </a></tr>
<tr>
<td> <a href='?view=address'> <img src='png/useraddress.png' width='40px' height='40px'>  Address </a> </tr>
<tr>
<td> <a href='?view=info'> <img src='png/uinfo.png' width='40px' height='40px'>  General Info </a>  </tr> </table>
</br> </br> </br>  $output
";
}
?>
