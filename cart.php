<!--<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="styles/cart.css">
	<script src="js/cart.js"></script>
</head>
<body>
	<div class="container">
		<h2>Shopping Cart</h2>
		<main>
			<section>
				<div class="message">
					<p>You are in the cart page. Enjoy hassle-free shopping!</p>
				</div>
			</section>
		</main>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="cart">
				 Cart items will be added dynamically using JavaScript 
			</tbody>
		</table>
		<p>Total Price: $<span id="totalPrice">0.00</span></p>
		<button onclick="checkout()">Checkout</button>
		<a href="index.php">Continue Shopping</a>
	</div>
</body>
</html>-->

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles/cart.css">
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>

</head>
<body>
    <div class="container">
        <h2>Shopping Cart</h2>
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

        // Check if product id is submitted
        if (isset($_POST['productid'])) {
            $productid = $_POST['productid'];
            $sql = "SELECT * FROM products WHERE productid = '$productid'";
            $result = mysqli_query($conn, $sql);

            // Check if product exists in the database
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $productname = $row['productname'];
                $price = $row['price'];

                // Add product to cart session
                session_start();
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                } else {
                    $cart = array();
                }
                if (array_key_exists($productid, $cart)) {
                    $cart[$productid]['quantity'] += 1;
                } else {
                    $cart[$productid] = array('productname' => $productname, 'price' => $price, 'quantity' => 1);
                }
                $_SESSION['cart'] = $cart;
            } else {
                echo "<p>Product not found.</p>";
            }
        }
        
        // Display cart
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<p>Your cart is empty.</p>";
        } else {
            echo "<table>";
            echo "<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";
            $total = 0;
            foreach ($_SESSION['cart'] as $productid => $product) {
                $productname = $product['productname'];
                $price = $product['price'];
                $quantity = $product['quantity'];
                $subtotal = $price * $quantity;
                $total += $subtotal;
                echo "<tr><td>$productname</td><td>$price</td><td>$quantity</td><td>$subtotal</td></tr>";
            }
            echo "<tr><td colspan='3'>Total</td><td>$total</td></tr>";
            echo "</table>";
        }

        mysqli_close($conn);
        ?>

        <form action="checkout.php" method="post">
            <input type="submit" value="Checkout">
        </form>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="productid">Product ID:</label>
            <input type="text" id="productid" name="productid">
            <input type="submit" value="Add to Cart">
        </form>
        <div class="row" align="center">
        <div class="col-4-lg">
                
            <form method="post" action="#">
                <h3 style="color:blue;">Scan product QR Code</h3>
                <input type="hidden" readonly="" name="qrid" id="qrid"/>
            </form>
            <video id="preview"></video>
            <script type="text/javascript">
                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                scanner.addListener('scan', function (content) {
                    console.log(content);
                });
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                    } else {
                    console.error('No cameras found.');
                    }
                }).catch(function (e) {
                    console.error(e);
                });

                scanner.addListener('scan',function(c){
                    document.getElementById("qrid").value=c;
                    document.forms[0].submit();
                });
            </script>
        </div>
    </div>
    </div>
</body>
</html>
