<?php
@session_start();
if($_REQUEST['choice'] == 'Buy'){
	if($_SESSION['login'] != 1){
		include_once 'login.html.php';
		}
	else{
		$quantity = $_POST['quantity'];
		include 'mysqlconnect.php' ; //establish connection
		$query = "SELECT user_id FROM users WHERE username = '{$_SESSION['username']}' "; //Get user id of user
		$ids = mysqli_query($link, $query);
		while($id = mysqli_fetch_array($ids)){
			$user_id = $id['user_id'] ;
			}	
		$table = trim($_POST['tablename']);
		$productname = trim($_POST['productname']);		// remove any white spaces from beggining and end 
		$addressid = trim($_POST['addressid']);
		$booksdb = array('product_id', 'book_price', 'book_name');
		$stationarydb = array('product_id', 'item_price', 'item_name');
		if($table == 'books'){ //SELECT books TABLE
			list($itemid, $itemprice, $itemname) = $booksdb;
			}
		elseif($table == 'startionary_item'){ //SELECT startionary_items TABLE
			list($itemid, $itemprice, $itemname) = $stationarydb;
			}
		$query = "SELECT $itemid, $itemprice FROM $table WHERE $itemname = '$productname' LIMIT 1 "; //Get product details
		$details = mysqli_query($link, $query);
		while($detail = mysqli_fetch_array($details)){
			$productid = $detail[$itemid] ;
			$productprice = $detail[$itemprice];
			}
		$orderprice = $productprice * $quantity;
		$query = "INSERT INTO orders (user_id, product_id, order_date, order_time, order_price, order_quantity, address_id, order_status)
				VALUES('$user_id', '$productid', DATE(NOW()), TIME(NOW()), '$orderprice', '$quantity', '$addressid', 'Succcess')";
		mysqli_query($link, $query);
		$output = "Dear {$_SESSION['username']} your order for $quantity $productname each worth Rs.$productprice is Succesfull.
				The delivery is expected to be in 2 working days. The total amount of Rs. $orderprice will be collected
				at the time of delivery. Thanks for shopping with us. </br> </br> <img src='png/order.png' width='200px' height='200px'> ";
		include_once 'output.html.php';
		exit();
	}
	}
	
else{
	if($_SESSION['login'] != 1 ){ //check whether the user has logged in
		include_once 'login.html.php' ; //if not redirect to login page
		}
	else{
		include 'mysqlconnect.php' ; //establish connection
		$query = "SELECT user_id FROM users WHERE username = '{$_SESSION['username']}' "; //Get user id of user
		$ids = mysqli_query($link, $query);
		while($id = mysqli_fetch_array($ids)){
			$user_id = $id['user_id'] ;
			}
		$table = trim($_POST['tablename']);
		$productname = trim($_POST['productname']); // remove any white spaces from beggining and end 
		$booksdb = array('product_id', 'book_price', 'product_type', 'book_name');
		$stationarydb = array('product_id', 'item_price', 'product_type', 'item_name');
		if($table == 'books'){ //SELECT books TABLE
			list($itemid, $itemprice, $itemtype, $itemname) = $booksdb;
			}
		elseif($table == 'startionary_item'){ //SELECT startionary_items TABLE
			list($itemid, $itemprice, $itemtype, $itemname) = $stationarydb;
			}
		$query = "SELECT $itemid, $itemprice, $itemtype FROM $table WHERE $itemname = '$productname' "; //Get product details
		$details = mysqli_query($link, $query);
		$productid = array();
		$producttype = array();
		$productprice = array();
		while($detail = mysqli_fetch_array($details)){
			$productid[] = $detail[$itemid] ;
			$producttype[] = $detail[$itemtype];
			$productprice[] = $detail[$itemprice];
			}
		for($quantity=0; $quantity < $_POST['quantity']; $quantity++){ //CHECK THE QUANTITY SET BY USER
		$query = "INSERT INTO user_cart (user_id, username, product_id, product_type, product_name, product_price, cart_time)
				VALUES ('$user_id', '{$_SESSION['username']}', '{$productid[0]}', '{$producttype[0]}', '$productname', '{$productprice[0]}', NOW() )"; //Move data into user cart table
		mysqli_query($link, $query);
		}
		header('location:cart.html.php');
		exit();
		}
		}
?>
