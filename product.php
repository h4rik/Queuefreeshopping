<!DOCTYPE html>
<?php
    if(isset($_POST['productid']) && isset($_POST['productname']) && isset($_POST['productprice']) && isset($_FILES['productimg'])) {
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

    $productid = $_POST['productid'];
    $productname = $_POST['productname'];
    $price = $_POST['productprice'];
    $productimg = addslashes(file_get_contents($_FILES['productimg']['tmp_name']));

    #$sql = "INSERT INTO products (productid, productname, price, productimg) VALUES ('$productid', '$productname', '$price', '$productimg')";
    $sql = "INSERT INTO products (productid, productname, price, productimg) VALUES ('$productid', '$productname', '$price', '$productimg')";
    if (mysqli_query($conn, $sql)) {
        $id = mysqli_insert_id($conn); // get the inserted row's primary key

        if ($id) {
            include_once 'phpqrcode/qrlib.php';
            $qrCodePath = 'qr_codes/'.$id . '.png';
            QRcode::png($id, $qrCodePath);
        }

        //echo "<img center src='" . $qrCodePath . "' alt='QR Code'>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    }
?>

<html>
<head>
	<title>Product Entry Form</title>
	<link rel="stylesheet" href="styles/product.css">
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Product Entry Form</h2>
		<form action="product.php" method="post" enctype="multipart/form-data">
            <label for="productid">Product ID:</label>
            <input type="text" id="productid" name="productid" required><br>

            <label for="productname">Product Name:</label>
            <input type="text" id="productname" name="productname" required><br>

            <label for="productprice">Product Price:</label>
            <input type="text" id="productprice" name="productprice" required><br>

            <label for="productimg">Product Image:</label>
            <input type="file" id="productimg" name="productimg" accept="image/*" required><br>

            <input type="submit" value="Add Product">
            <input type="reset" value="Reset">
            
        </form>

	</div>
</body>
</html>
