<?php
include 'buy.inc.html.php';
?>
<?php
include 'mysqlconnect.php';
$product = $_REQUEST['product'];
$booksdb = array('book_id', 'book_price', 'book_image', 'book_info', 'book_name', 'price');
$stationarydb = array('item_id', 'item_price', 'item_image', 'item_info', 'item_name', 'price');
if($product == 'books'){ //SELECT books TABLE
	list($itemid, $itemprice, $itemimage, $iteminfo, $itemname, $realprice) = $booksdb;
	}
elseif($product == 'startionary_item'){ //SELECT startionary_items TABLE
	list($itemid, $itemprice, $itemimage, $iteminfo, $itemname, $realprice) = $stationarydb;
	}
$id = array();
$price = array();
$image = array();
$info = array();
$query = "SELECT $itemid, $itemprice, $itemimage, $iteminfo, $itemname, $realprice FROM $product WHERE $itemname = '{$_REQUEST['itemname']}' "; //query for getting engeneering books data
		$itemsdata = mysqli_query($link, $query);
		$count=0;
		while($items = mysqli_fetch_array($itemsdata , MYSQLI_ASSOC)){
			$id[] = $items[$itemid];
			$price[] = $items[$itemprice];
			$image[] = $items[$itemimage];
			$info[] = $items[$iteminfo];
			$discount =@(($items[$realprice] - $items[$itemprice])/$items[$realprice])*100;
			$count++; //NUMBER OF BOOKS RETRIEVED
		}
?>
<table align="center" id="productinfo">
<tr>
<td rowspan="2"> <img src=<?php echo" '{$image[0]}' "; ?> width="250px" height="300px"> </br> <b> <?php echo " {$_REQUEST['itemname']} "; ?> </b> </td> 
			<td rowspan="2"> <p> <?php echo " '{$info[0]}' "; ?> </p> </td>
			<td>PRICE: </BR> <B> <?php echo " Rs. {$price[0]} </br> <span id='price'> {$items[$realprice]} </span> </br>
								<span id='off'> $discount%Off </span>"; ?> </B> </td> 
</tr>
<tr>
<td id="buyuseraction">
<form action="proceedorder.html.php" method="post">
<input type="hidden" value=" <?php echo "$product"; ?> " name="tablename" >
<input type="hidden" value=" <?php echo "{$_REQUEST['itemname']}"; ?> " name="productname" >
<input type="submit" name="choice" value="Buy Now">
<input type="number" name="quantity" id="quantity" value="1">
</form> </br> </br>
<form action="buyuseraction.html.php" method="post">
<input type="hidden" value=" <?php echo "$product"; ?> " name="tablename" >
<input type="hidden" value=" <?php echo "{$_REQUEST['itemname']}"; ?> " name="productname" >
<input type="submit" name="choice" value="Add To Cart">
<input type="number" name="quantity" id="quantity" value="1">
</form>
</br></td>
</tr>
</table>
</div>
</body>
</html>