<?php
require_once("../templates/header.php"); ?>
<?php
 include("../database/database_functions.php");
 $conn = db_connection();
$user_name = $_SESSION['user'];
   
        ?>
      	
	<?php
	$customer_query = "SELECT customer.email, customer.first_name, customer.last_name, customer.customer_id
					    FROM user
						JOIN
						customer ON customer.customer_id=user.customer_id 
						WHERE username= '$user_name'";

			$result= mysqli_query($conn, $customer_query);
			$result = mysqli_fetch_assoc($result);

			$customerID= $result['customer_id']; 
			$CustomerName= $result['first_name']. " ". $result['last_name'];
			$customerEmail= $result['email']; 

						
	 $order_query= "SELECT	customer_order.order_id, customer_order.order_date
					 FROM customer_order 
					WHERE customer_id= '$customerID' ORDER BY  order_id DESC LIMIT 1
					";

			$OrdeResult= mysqli_query($conn, $order_query);
			$OrdeResult = mysqli_fetch_assoc($OrdeResult );

			$orderID= $OrdeResult['order_id']; 
			$Date= $OrdeResult['order_date'];

		$orderBook= "SELECT *
					 FROM order_items 
					 WHERE order_id= '$orderID'";

		$orderBook= mysqli_query($conn, $orderBook);
				
				$qtys[]= array();
				$prices[]= array();
				$bookTitles[]= array();
				$totalSUM=0;
				$index=0;

			 while($orderBooks = mysqli_fetch_assoc($orderBook))
			 {
					$qtys[$index] = $orderBooks['quantity']; 
					$prices[$index]		 = $orderBooks['total_price'];					
					$orderedBookID= $orderBooks['book_id'];

					$BookQuery= "SELECT book_title
					 FROM book 
					 WHERE book_id= '$orderedBookID'";

					$orderBookitem= mysqli_query($conn, $BookQuery);
					$orderBookitem= mysqli_fetch_assoc(	$orderBookitem);

					$bookTitles[$index]  = $orderBookitem['book_title'];	
					$index++;				 
			 }


			 require_once("../public/email.php"); 
			
?>

<div class="container " style="margin-top: 100px; margin-bottom: 200px; width: 70%;">
	<form action="order_confirmation.php" method="post" id="login-form">
						<div > 	<p style="text-align: center"> <b> Thank You for Shopping with Us! </b> </p>
								<p style="text-align: center"> <b> ORDER RECIEPT </b> </p>
						  <table>
								<tr style="padding-bottom: 5em">
								<th>Name</th>
								<th style="text-align: center;padding-right: 4em;"> Order Number </th>
								<th style="text-align: center; padding-right: 4em;">Date Date </th>
								</tr>
									<tr style="padding-bottom: 3em">
									<td ><?php echo  $CustomerName; ?></td>
									<td style="text-align: center"><?php echo $orderID;?></td>
									<td style="text-align: center"><?php echo $Date; ?></td>
									</tr>
								<tr style="padding-bottom: 2em">
								<th>Book Title</th>
								<th style="text-align: center">Quantity</th>
								<th style="text-align: center"> Price</th>
								</tr>
									<?php for($p=0; $p<count($qtys); $p++){?>
								<tr style="padding-bottom: 2em">
									<td><?php echo $bookTitles[$p];?></td>
									<td style="text-align: center"><?php echo $qtys[$p];?></td>
									<td style="text-align: center"><?php echo$prices[$p];?></td>
									
								</tr>
									<?php
									
								$totalSUM+=$prices[$p];
								
								}?>
								<tr style="padding-bottom: 10em">
							<td><th>Total Price</th> </td><td style="text-align: center"><?php echo $totalSUM?> </tr>
							
							<tr style="padding-bottom: 10em">
						
							<td style="text-align: center"> <button onClick="window.print()">Print Reciept</button> </td> </tr>
						  </table>	
				       </div>		
					   
					  &nbsp;&nbsp; 
	<p style="text-align: center"> Please Check your email as well for order details </p>
	</form>
	</div>




	<?php require_once("../templates/footer.php"); 