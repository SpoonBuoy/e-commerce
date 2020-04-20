<?php
include 'buy.inc.html.php';
?>
<?php
include 'mysqlconnect.php';
$bookid = array();
$bookprice = array();
$bookimage = array();
$bookinfo = array();
$query = "SELECT book_id, book_price, book_image, book_info FROM books WHERE book_name = '{$_REQUEST['itemname']}' "; //query for getting engeneering books data
		$booksdata = mysqli_query($link, $query);
		$count=0;
		while($books = mysqli_fetch_array($booksdata , MYSQLI_ASSOC)){
			$bookid[] = $books['book_id'];
			$bookprice[] = $books['book_price'];
			$bookimage[] = $books['book_image'];
			$bookinfo[] = $books['book_info'];
			$count++; //NUMBER OF BOOKS RETRIEVED
		}
?>
<table align="center" id="productinfo">
<tr>
<td rowspan="2"> <img src=<?php echo" '{$bookimage[0]}' "; ?> width="250px" height="300px"> </br> <b> <?php echo " {$_REQUEST['bookname']} "; ?> </b> </td> 
			<td rowspan="2"> <p> <?php echo " '{$bookinfo[0]}' "; ?> </p> </td>
			<td>PRICE: </BR> <B> <?php echo " Rs. {$bookprice[0]} "; ?> </B> </td> 
</tr>
<tr>
<td id="buyuseraction">
<form action="buyuseraction.html.php" method="post">
<input type="hidden" value=" <?php echo "{$_REQUEST['bookname']}"; ?> " name="productname" >
<input type="submit" name="choice" value="Buy Now">
<input type="submit" name="choice" value="Add To Cart"> </br>
Quantity: </br>
<input type="number" name="quantity" id="quantity" value="1">
</br></td>
</tr>
</table>
</div>
</body>
</html>