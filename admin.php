<!DOCTYPE html>    
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get the username and password from the form
	$username = $_POST['uname'];
	$password = $_POST['psw'];

	// Check if the username and password are correct
	if (($username == 'hari' && $password == '1234') || ($username == 'sunil' && $password == '5678')) {
		// Redirect to the admin page
		header('Location: product.php');
		exit;
	} else {
		// Display an error message
		#echo '<p style="color: red;">Invalid username or password</p>';
	}
}
?>
<head>
    <title>Admin login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/admin.css">
</head>
<body>
    <header>
        <h1>Admin Login</h1>
    </header>
</body>
	<form method="post">
		<!--<div class="imgcontainer">-->
			<!--<img src="avatar.png" alt="Avatar" class="avatar">-->
		</div>
		<div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<button type="submit">Login</button>
			<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
			</label>
		</div>
		<div class="container" style="background-color:#f1f1f1">
			<button type="button" class="cancelbtn">Cancel</button>
			<span class="psw">Forgot <a href="#">password?</a></span>
		</div>
	</form>
</body>
</html>