<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="styles/login.css">
	<script src="script/login.js"></script>
</head>
<body>
	<header>
		<h1>Login Page</h1>
	</header>
	<main>
		<section>
			<h2>Login</h2>
			<p>Please enter your mobile number to get started.</p>
			<form>
    			<div id="mobile-container">
        			<label for="mobile">Mobile Number:</label>
        			<input type="text" id="mobile" name="mobile" placeholder="Enter mobile number">
        			<button type="button" id="mobile-submit" onclick="sendOTP()">Get Code</button>
    			</div>
    			<div id="otp-container" style="display: none;">
        			<label for="otp">Enter OTP:</label>
        			<input type="text" id="otp" name="otp" placeholder="Enter OTP">
        			<input type="hidden" id="original-otp" name="original-otp">
        			<button type="button" id="otp-submit" style="display: none;" onclick="verifyOTP()">Submit</button>
    			</div>
			</form>
			<div id="error" class="error"></div>
		</section>
	</main>
    <?php include 'footer.php'; ?>
</body>
</html>
