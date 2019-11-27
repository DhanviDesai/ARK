<?php
include('session.php');

$user = $login_session;
$usersql = "SELECT * FROM ark.user WHERE username = '$user'";
$user_result = mysqli_query($db,$usersql);
$user_row = mysqli_fetch_array($user_result,MYSQLI_ASSOC);
$userid = $user_row['uid'];

if($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['clicked'])){
  $value = $_POST['clicked'];
	$sql = "SELECT * FROM ark.product WHERE category_id='$value'";
	$default_result = mysqli_query($db,$sql);
 	$default_count = mysqli_num_rows($default_result);
}
}

else{
$default_sql = "SELECT * FROM ark.product";
$default_result = mysqli_query($db,$default_sql);
$default_count=mysqli_num_rows($default_result);
}



?>

 <html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>ARK Shopping</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>


        <section class="first-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="text-content">
                  <h2>Welcome To ARK</h2>
                  <div class="line-dec"></div>
		  <span style="float:left;margin:8px;"><a href = "logout.php"><img src="img/exit.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
		  <span style="float:left;margin:8px;"><a href = "account.php?uid=<?php echo $userid?>"><img src="img/account.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
		  <span style="float:left;margin:8px;"><a href = "upload.php"><img src="img/upload.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
		  <span style="float:left;margin:8px;"><a href = "wishlist.php?uid=<?php echo $userid?>"><img src="img/wishlist.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
                  <span><?php echo $login_session; ?></span>
                </div>
              </div>
            </div>
          </div>
        </section>

           <section class="second-section">
             <form method="post">
                <div class="container">
                  <div class="row">
                    <ul class="project-filter">
                      <li class="filter" data-filter="Notes">
                    <div class="col-md-3 col-sm-6">
                      <div class="service-item">
                        <div class="icon">
                          <button name="clicked" value="1">
                          <img src="img/notes.png" alt="">
                        </button>
                        </div>
                        <h4>Notes</h4>
                        </div>
                    </div>
                  </li>
                  <li class="filter" data-filter="Books">
                    <div class="col-md-3 col-sm-6">
                      <div class="service-item">
                        <div class="icon">
                          <button name="clicked" value="2">
                          <img src="img/books.png" alt="">
                          </button>
                        </div>
                        <h4>Books</h4>
                      </div>
                    </div>
                  </li>
                  <li class="filter" data-filter="Electronics">
                    <div class="col-md-3 col-sm-6">
                      <div class="service-item">
                        <div class="icon">
                          <button name="clicked" value="3">
                          <img src="img/electronics2.png" alt="">
                          </button>
                        </div>
                        <h4>Electronics</h4>
                      </div>
                    </div>
                  </li>
                  <li class="filter" data-filter="Others">
                    <div class="col-md-3 col-sm-6">
                      <div class="service-item">
                        <div class="icon">
                          <button name="clicked" value="4">
                          <img src="img/others2.png" alt="">
                          </button>
                        </div>
                        <h4>Others</h4>
                      </div>
                    </div>
                  </li>
                  </ul>
                  </div>
                </div>
              </form>
              </section>

	<?php
  echo '<section >';
  echo '<form id="nextForm">';
  echo '<div class="container">';
  echo '<div class="row">';
	for($x=0;$x<$default_count;$x++){

	$default_row = mysqli_fetch_array($default_result,MYSQLI_ASSOC);
  $categoryid = $default_row['category_id'];
  $catsql = "SELECT * FROM ark.category WHERE category_id = '$categoryid'";
  $catresult = mysqli_query($db,$catsql);
  $catrow = mysqli_fetch_array($catresult,MYSQLI_ASSOC);


	  echo '<div class="col-md-5 info-section" onclick="goToDetailed()">';
    echo '<a style="text-decoration:none;"href=./detailed.php?prod_id='.$default_row['prod_id'].' />';
	  echo "<div class='text-content Books'><h4>".$default_row['name']."</h4></div>";
	  echo '<div class="text-content"><span>Category:'.$catrow["category_name"].'</span></div>';
  	echo '<div class="text-content"><span>Price:'.$default_row["price"].'</span></div>';
	  echo '<div class="text-content"><span>Quantity:'.$default_row["quantity"].'</span></div>';
	  echo '</div>';
	}

  echo '</div>';
  echo '</div>';
  echo '</form>';
  echo '</section>';
	?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
