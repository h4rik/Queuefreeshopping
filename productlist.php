	<!DOCTYPE html>
	<html>
	<head>
		<title>Product List</title>
		<link rel="stylesheet" href="styles/productlist.css">
	</head>
	<body>
		<div class="container">
			<h2>Product List</h2>
			<table>
				<thead>
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Image</th>
						<th>QR</th>
					</tr>
				</thead>
				<tbody>
					<!-- PHP code to fetch products from database and loop through them -->
					<?php
						$servername = "localhost";
						$username = "hari";
						$password = "hari";
						$dbname = "shopping";

						// Create connection
						$conn = mysqli_connect($servername, $username, $password, $dbname);

						// Check connection
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						$sql = "SELECT * FROM products";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>" . $row["productid"] . "</td>";
								echo "<td>" . $row["productname"] . "</td>";
								echo "<td>" . $row["price"] . "</td>";
								echo "<td><img class='product-img' src='data:image/jpeg;base64," . base64_encode($row['productimg']) . "'/></td>";
								echo "<td><img class = 'product-img' src = 'qr_codes/".$row["sno"].".png'></td>";
								echo "</tr>";
							}
						} else {
							echo "0 results";
						}

						mysqli_close($conn);
					?>
				</tbody>
			</table>
			<a href="cart.php">View Cart</a>
		</div>
	</body>
	</html>
