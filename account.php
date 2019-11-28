<?php
include('config.php');
$id = 0;
if(isset($_GET['uid'])){

$id = $_GET['uid'];
$wishlistsql = "SELECT * FROM ark.account_util WHERE uid = '$id'";
$wishlist_result = mysqli_query($db,$wishlistsql);
$wishlist_count = mysqli_num_rows($wishlist_result);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$po = mysqli_real_escape_string($db,$_POST['default_prod_id']);
 echo $po;
}

?>
<html class="no-js" lang="">
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

       <title>Account</title>
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

      <link rel="stylesheet" href="css/fontAwesome.css">
      <link rel="stylesheet" href="css/tooplate-style.css">

       <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
   </head>
   <body>

     <div class="navBar wishlist">
       <span class="txt1 p-b-11">
         ARK
       </span>
       <div class="icons">
         <span style="float:left;margin:8px;"><a href = "landing.php"><img src="img/home.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
        <span style="float:left;margin:8px;"><a href = "wishlist.php?uid=<?php echo $id?>"><img src="img/wishlist.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
      <!--   <span style="float:left;margin:8px;"><a href = "account.php"><img src="img/account.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>-->
         <span style="float:left;margin:8px;"><a href = "upload.php"><img src="img/upload.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
         <span style="float:left;margin:8px;"><a href = "logout.php"><img src="img/exit.png" style="width:30px;height:30px;margin-left:8px;"/></a></span>
       </div>
     </div>

     <?php
      echo "<section>";
      echo '<form method="post">';
      echo '<div class="container">';
      echo '<div class="row">';
     for($x=0;$x<$wishlist_count;$x++){

      $prod_row = mysqli_fetch_array($wishlist_result,MYSQLI_ASSOC);
      $prod_id = $prod_row['prod_id'];
      $default_sql = "SELECT * FROM ark.product WHERE prod_id = '$prod_id'";
      $default_result = mysqli_query($db,$default_sql);
      $default_row= mysqli_fetch_array($default_result,MYSQLI_ASSOC);
      $categoryid = $default_row['category_id'];
      $catsql = "SELECT * FROM ark.category WHERE category_id = '$categoryid'";
      $catresult = mysqli_query($db,$catsql);
      $catrow = mysqli_fetch_array($catresult,MYSQLI_ASSOC);

        $pr = $default_row['prod_id'];
       echo '<div class="col-md-5 info-section" onclick="goToDetailed()">';
       echo '<input type="hidden" name="default_prod_id" value="'.$pr.'" />';
       echo '<a style="text-decoration:none;"href=./detailed.php?prod_id='.$default_row['prod_id'].' />';
       echo "<div class='text-content Books'><h4>".$default_row['name']."</h4></div>";
       echo '<div class="text-content"><span>Category:'.$catrow["category_name"].'</span></div>';
       echo '<div class="text-content"><span>Price:'.$default_row["price"].'</span></div>';
       echo '<div class="text-content"><span>Quantity:'.$default_row["quantity"].'</span></div>';
       echo '<div style="float:right;"><a href="./deleteItems.php?prod_id='.$pr.'&uid='.$id.'"><img style="width:30px;height:30px;" src="img/close.png"/></a></div>';
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
