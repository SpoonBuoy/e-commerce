<?php
include_once 'buy.inc.html.php';
?>
<?php
include 'mysqlconnect.php';
$product = $_REQUEST['product'];
$category =$_REQUEST['category'];
$booksdb = array('book_name', 'book_price', 'book_image', 'book_category', 'price');
$stationarydb = array('item_name', 'item_price', 'item_image', 'item_category', 'price');
if($product == 'books'){ //SELECT books TABLE
	list($itemname, $itemprice, $itemimage, $itemcategory, $originalprice) = $booksdb;
	}
elseif($product == 'startionary_item'){ //SELECT startionary_items TABLE
	list($itemname, $itemprice, $itemimage, $itemcategory, $originalprice) = $stationarydb;
	}
$name = array();
$price = array();
$image = array();
$realprice = array();
$searchname = $_POST['search'];
$query = "SELECT $itemname, $itemprice, $itemimage, $originalprice FROM $product WHERE $itemcategory = '$category' "; //query for getting items data from repective tables in database
		$itemsdata = mysqli_query($link, $query);
		$count=0;
		while($items = mysqli_fetch_array($itemsdata)){
			$name[] = $items[$itemname];
			$price[] = $items[$itemprice];
			$image[] = $items[$itemimage];
			$realprice[] = $items[$originalprice];
			$count++; //NUMBER OF BOOKS RETRIEVED
		}
echo "<table align='left' id='listtable' margin='0'>";
$j=0;
for($col=0; $col<2; $col++){
	echo "<tr>";
	for($row=0; $row<6 && $j< $count; $row++,$j++){
		$discount = @(($realprice[$j] - $price[$j])/$realprice[$j])*100;
		echo "<td id='list'> <img src='$image[$j]' width='110px' height='100px'>  <a href='itemorder.html.php?itemname=$name[$j]&product=$product'> $name[$j] </a> 
								</br><b> Rs. $price[$j] </b><span id='price'> $realprice[$j] </span> <span id='off'> $discount%Off </span>  </td> " ;
				}
	echo "</br> </tr>";
}
echo "</table>";
?>
</div>
</body>
</html>
