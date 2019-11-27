<?php
include('session.php');
$getUidSql = "SELECT uid FROM ark.user WHERE username = '$login_session'";
$uidResult = mysqli_query($db,$getUidSql);
$uidRow = mysqli_fetch_array($uidResult);
$uid = $uidRow['uid'];

$getCategoriesSql = "SELECT * FROM ark.category";
$categoryResult = mysqli_query($db,$getCategoriesSql);
$categoryCount = mysqli_num_rows($categoryResult);

if($_SERVER["REQUEST_METHOD"] == "POST"){
$title = mysqli_real_escape_string($db,$_POST['title']);
$category_name = mysqli_real_escape_string($db,$_POST['category']);
$getCategoryIdSql = "SELECT * FROM ark.category where category_name='$category_name'";
$categoryIdResult = mysqli_query($db,$getCategoryIdSql);
$categoryRow = mysqli_fetch_array($categoryIdResult,MYSQLI_ASSOC);
$catId = $categoryRow['category_id'];
$price = mysqli_real_escape_string($db,$_POST['price']);
$quantity = mysqli_real_escape_string($db,$_POST['quantity']);
$description = mysqli_real_escape_string($db,$_POST['description']);
$productSql  = "INSERT INTO ark.product (uid,name,category_id,price,quantity,description) values
('$uid','$title','$catId','$price','$quantity','$description')";
$executeResult = mysqli_query($db,$productSql);
$prod_idsql = "SELECT * FROM ark.product WHERE uid='$uid' AND name = '$title'";
$prod_idresult = mysqli_query($db,$prod_idsql);
$prod_idrow = mysqli_fetch_array($prod_idresult,MYSQLI_ASSOC);
$prod_id = $prod_idrow['prod_id'];
$accountsql = "INSERT INTO ark.account_util (uid,prod_id) VALUES ('$uid','$prod_id')";
mysqli_query($db,$accountsql);
}




?>
<html lang="en">
<head>
	<title>Upload Item</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="navBar">
		<span class="txt1 p-b-11">
			ARK
		</span>
		<div class="icons">
			<span style="float:left;margin:8px;"><a href = "landing.php"><img src="img/home.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
			<span style="float:left;margin:8px;"><a href = "wishlist.php"><img src="img/wishlist.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
			<span style="float:left;margin:8px;"><a href = "account.php"><img src="img/account.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
		<!--	<span style="float:left;margin:8px;"><a href = "upload.php"><img src="img/upload.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>-->
			<span style="float:left;margin:8px;"><a href = "logout.php"><img src="img/exit.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
		</div>
	</div>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-32">
						Upload Item
					</span>
					<span class="txt1 p-b-11">
						Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="title" >
						<span class="focus-input100 colorChange"></span>
					</div>
					<span class="txt1 p-b-11">
						Category
					</span>
					<div class="select-100 m-b-36" data-validate = "Username is required">
						<select name="category">
							<?php
								for($x=0;$x<$categoryCount;$x++){
									$row = mysqli_fetch_array($categoryResult,MYSQLI_ASSOC);
									echo "<option value=".$row['category_name'].">".$row['category_name']."</option>";
								}
							 ?>
						</select>
					</div>
					<span class="txt1 p-b-11">
						Price
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="price" >
						<span class="focus-input100 colorChange"></span>
					</div>
					<span class="txt1 p-b-11">
						Quantity
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="number" name="quantity" >
						<span class="focus-input100 colorChange"></span>
					</div>
					<span class="txt1 p-b-11">
						Description
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<textarea class="input100" name="description" rows="4" cols="40" ></textarea>
						<span class="focus-input100 colorChange"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Submit
						</button>
					</div>
				</form>
			</div>
		<div>
	</div>
