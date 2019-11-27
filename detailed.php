<?php
include('session.php');
$user = $login_session;
$usersql = "SELECT * FROM ark.user WHERE username = '$user'";
$user_result = mysqli_query($db,$usersql);
$user_row = mysqli_fetch_array($user_result,MYSQLI_ASSOC);
$userid = $user_row['uid'];
if(isset($_GET['prod_id'])){
  $id = $_GET['prod_id'];
  $sql =  "SELECT * FROM ark.product WHERE prod_id='$id'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $uid = $row['uid'];
  $name = $row['name'];
  $price = $row['price'];
  $quantity = $row['quantity'];
  $description=$row['description'];
  $category = $row['category_id'];
  $catsql = "SELECT * FROM ark.category WHERE category_id='$category'";
  $catresult = mysqli_query($db,$catsql);
  $catrow = mysqli_fetch_array($catresult,MYSQLI_ASSOC);
  $categoryname = $catrow['category_name'];
  $usersql = "SELECT * FROM ark.user WHERE uid = '$uid'";
  $userresult = mysqli_query($db,$usersql);
  $userrow = mysqli_fetch_array($userresult,MYSQLI_ASSOC);
  $userfname = $userrow['fname'];
  $userlname = $userrow['lname'];
  $userfull = $userfname.' '.$userlname;
  $useremail = $userrow['email'];
  $userphone = $userrow['phoneno'];
  //echo json_encode(array_merge($row,$userrow,$catrow));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $usersql = "SELECT * FROM ark.user ";
  $wishlistsql = "INSERT INTO ark.wishlist_util (uid,prod_id) VALUES ('$userid','$id')";
  mysqli_query($db,$wishlistsql);
     header("Location: landing.php");
}

?>
<html lang="en">
<head>
	<title><?php echo $name ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
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
      <span style="float:left;margin:8px;"><a href = "wishlist.php?uid=<?php echo $userid?>"><img src="img/wishlist.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
      <span style="float:left;margin:8px;"><a href = "account.php"><img src="img/account.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
      <span style="float:left;margin:8px;"><a href = "upload.php"><img src="img/upload.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
      <span style="float:left;margin:8px;"><a href = "logout.php"><img src="img/exit.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
    </div>
  </div>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-32">
							<?php echo $name ?>
					</span>
          <span class="txt4 p-b-11">
						Category: <?php echo $categoryname ?>
					</span>

					<span class="txt4 p-b-11">
						 Price: <?php echo $price ?>
					</span>
          <span class="txt4 p-b-11">
						 Quantity: <?php echo $quantity ?>
					</span>
          <span class="txt4 p-b-11">
             Description: <?php echo $description ?>
          </span>
          <span class="txt4 p-b-11">
            Uploaded by :
					</span>
          <span class="txt4 p-b-11">
             <?php echo $userfull?>
          </span>

          <span class="txt4 p-b-11">
					 <?php echo $useremail ?>
					</span>
          <span class="txt4 p-b-11">
						 +<?php echo $userphone ?>
					</span>

          <button class="addWishlist"><img src="img/add.png"></button>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
