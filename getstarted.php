<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Get Started</title>
    <link rel="stylesheet" type="text/css" href="styles/style2.css">

</head>
<body>
	<header>
		<h1>Get Started</h1>
	</header>
	<main>
		<section>
			<h2>Step 1: Login to User GUI</h2>
			<img src="login.png" alt="Login">
			<p>Enter your mobile number and the OTP to login to the User GUI. Once you are logged in, you can view the products available and add them to your cart.</p>
			<button onclick="location.href='login.php';">Login</button>
		</section>
		<section>
			<h2>Step 2: Add Products to Cart</h2>
			<img src="cart.png" alt="Cart">
			<p>Enter the product code or click the enter symbol to add the product to your cart. You can add multiple products to your cart and checkout once you are done.</p>
			<button onclick="location.href='cart.php';">Cart</button>
			<script>
				// JavaScript code for adding products to cart
				const scanner = document.querySelector('.scanner');
				const cartItems = document.querySelector('.cart-items');
				
				scanner.addEventListener('click', () => {
					const productCode = prompt('Enter product code:');
					if (productCode) {
						const product = document.createElement('li');
						product.textContent = productCode;
						cartItems.appendChild(product);
					}
				});
			</script>
		</section>
		<section>
			<h2>Step 3: Checkout and Pay</h2>
			<img src="payment.png" alt="Payment">
			<p>Show your payment confirmation to the billing counter and collect your items. You can also choose to pay using a payment gateway available in the User GUI.</p>
			<button onclick="location.href='checkout.php';">Checkout</button>
		</section>
        <section>
			<button onclick="location.href='index.php';">Go back to homepage or Click on above Login</button>
		</section>
        <script>
            
        </script>
	</main>
	<?php include 'footer.php'; ?>
</body>
</html>
