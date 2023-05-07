<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="styles/checkout.css">
</head>
<body>
	<h2>Checkout</h2>
	<form action="payment.php" method="post">
		<table>
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php
				session_start();
				$total_price = 0;

				if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
					foreach ($_SESSION['cart'] as $productid => $quantity) {
						// Retrieve product details from database
						$servername = "localhost";
						$username = "username";
						$password = "password";
						$dbname = "database_name";

						$conn = mysqli_connect($servername, $username, $password, $dbname);

						if (!$conn) {
						    die("Connection failed: " . mysqli_connect_error());
						}

						$sql = "SELECT * FROM product WHERE productid='$productid'";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
						    // output data of each row
						    while($row = mysqli_fetch_assoc($result)) {
						        $productname = $row['productname'];
						        $price = $row['price'];
						    }
						} else {
						    echo "0 results";
						}

						mysqli_close($conn);

						// Calculate total price
						$total_price += $price * $quantity;

						// Display product and price in table row
						echo "<tr>";
						echo "<td>" . $productname . "</td>";
						echo "<td>" . $price . "</td>";
						echo "</tr>";
					}
				}
				?>
				<tr>
					<td><b>Total Price:</b></td>
					<td><b><?php echo $total_price; ?></b></td>
				</tr>
			</tbody>
		</table>
		<input type="submit" value="Pay Now">
	</form>
</body>
</html>
