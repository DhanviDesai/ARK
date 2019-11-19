<?php
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
  $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
  $phoneno = mysqli_real_escape_string($db,$_POST['phoneno']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']);

  $sql = "INSERT INTO ark.user (fname,lname,phoneno,email,username,password) values('$firstname','$lastname','$phoneno','$email','$myusername','$mypassword')";
  $result = mysqli_query($db,$sql);
  if($result == TRUE){
    $logsql = "SELECT * FROM ark.user WHERE username = '$myusername' and password='$mypassword'";
    $logresult = mysqli_query($db,$logsql);
    $row = mysqli_fetch_array($logresult,MYSQLI_ASSOC);
    $count = mysqli_num_rows($logresult);
    if($count == 1) {
       //session_register("myusername");
       $_SESSION['login_user'] = $myusername;

       header("location: landing.php");
    }else {
       $error = "Your Login Name or Password is invalid";
    }
  }
}



?>

<html lang="en">
<head>
	<title>Login V14</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-32">
						Account Sign Up
					</span>

					<span class="txt1 p-b-11">
						First Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "First Name is required">
						<input class="input100" type="text" name="firstname" >
						<span class="focus-input100"></span>
					</div>

          <span class="txt1 p-b-11">
						Last Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Last Name is required">
						<input class="input100" type="text" name="lastname" >
						<span class="focus-input100"></span>
					</div>

          <span class="txt1 p-b-11">
						Phone Number
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Phone number is required">
						<input class="input100" type="text" name="phoneno" >
						<span class="focus-input100"></span>
					</div>

          <span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="text" name="email" >
						<span class="focus-input100"></span>
					</div>

          <span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>

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
