<!DOCTYPE html>
<?php
session_start();

// check if user is already logged in and redirect to dashboard if so
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// process login form if submitted
if(isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // validate input
    if(empty($username)) {
        $error_msg = "Please enter your username.";
    }
    else if(empty($password)) {
        $error_msg = "Please enter your password.";
    }
    else {
        // check if user exists in database and password is correct
        // replace this with your own database connection and query
        $user_id = 1;
        $db_password = "password";
        if($username == "testuser" && $password == $db_password) {
            $_SESSION['user_id'] = $user_id;
            header("Location: dashboard.php");
            exit();
        }
        else {
            $error_msg = "Incorrect username or password.";
        }
    }
}
?>	
<head>
	<title>Queue-Free Shopping</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/style1.css">
</head>
<body>
	<header>
		<h1>Queue-Free Shopping</h1>
		<!--div class="login">
			<form method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="submit" name="login" value="Login">
                <button type="submit" name="login" id="login-button" Value="Login">Login</button>
				<?php if(isset($error_msg)) { echo "<p class='error'>$error_msg</p>"; } ?>
			</form>
		</div>-->
	</header>
	<nav>
		<ul>
			<li><a href="#">Home</a></li>
            <li><a href="login.php">User Login</a></li>
            <li><a href="admin.php">Admin Login</a></li>
			<li><a href="productlist.php">Products</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Contact Us</a></li>
            
            
		</ul>
	</nav>
	<main>
		<section>
			<h2>Welcome to Queue-Free Shopping</h2>
			<p>With our website, you can skip the long queues at the mall and shop from the comfort of your own home. Simply scan the products you wish to purchase using our QR code scanner, add them to your cart, and pay online. Then, just stop by our security check to make sure everything matches up before you leave.</p>
			<button id="getstarted" onclick="location.href='getstarted.php';">Get Started</button>

		</section>
	</main>
	<!--<?php include 'footer.php'; ?>-->
    <!--<script src="script/script1.js"></script>-->
</body>
</html>
