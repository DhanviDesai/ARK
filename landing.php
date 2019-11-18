<?php
include('session.php');


if($_SERVER["REQUEST_METHOD"] == "POST") {

  $search = $_POST['search'];
  if($search == 'Notes' || 'notes'){
	$category = 1;
	$sql = "SELECT * FROM ark.product WHERE category='$category'";
	$default_result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($default_result,MYSQLI_ASSOC);
 	$default_count = mysqli_num_rows($default_result);
echo $default_count;
}
}else{
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
                  <span><?php echo $login_session; ?></span>
		  <span>sign out</span>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="search-section">
          <form method="post">
          <div class="container">
            <div class="row">
              <div class="col-md-11 col-sm-12">
                <div class="wrap-input100 validate-input m-b-36">
                  <input class="input100" type="text" name="search" placeholder="Search for Categories" id="searchInput">
                  <span class="focus-input100"></span>
                </div>
              </div>
              <div class="col-md-1 magnify col-sm-12">
                <input class="search_button"  type="image" src="img/search.png">
              </div>
            </div>
          </div>
        </form>
        </section>

	<section class="info-section">
	<?php
	for($x=0;$x<$default_count;$x++){
	
	$default_row = mysqli_fetch_array($default_result,MYSQLI_ASSOC);
	  echo "<div>".$default_row['name']."</div>";
	  echo '<div class="prod-category">'.$default_row["category"].'</div>';
  	  echo '<div class="prod-price">'.$default_row["price"].'</div>';
	  echo '<div class="prod-quantity">'.$default_row["quantity"].'</div>';
	}
	?>
	</section>

<!--      <section class="second-section">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="service-item">
                  <div class="icon">
                    <img src="img/first-icon.png" alt="">
                  </div>
                  <h4>Quick Editing</h4>
                  <p>Aliquam ex velit, viverra eu tristique vel, rhoncus nec ligula. In vel massa sed dolor pharetra interdum vitae posuere.</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="service-item">
                  <div class="icon">
                    <img src="img/second-icon.png" alt="">
                  </div>
                  <h4>Responsive Layout</h4>
                  <p>Sed pulvinar ipsum id leo volutpat, in convallis lectus molestie. Aliquam nisi sapien, faucibus eu consequat id, egestas vitae augue.</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="service-item">
                  <div class="icon">
                    <img src="img/third-icon.png" alt="">
                  </div>
                  <h4>Quick Support</h4>
                  <p>Aliquam ex velit, viverra eu tristique vel, rhoncus nec ligula. In vel massa sed dolor pharetra interdum vitae posuere.</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="service-item">
                  <div class="icon">
                    <img src="img/fourth-icon.png" alt="">
                  </div>
                  <h4>Voice Chat</h4>
                  <p>Sed pulvinar ipsum id leo volutpat, in convallis lectus molestie. Aliquam nisi sapien, faucibus eu consequat id, egestas vitae augue.</p>
                </div>
              </div>
            </div>
          </div>
        </section>

      <!--  <section class="third-section">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="left-image col-md-4">
                  <img src="img/left-image.png" alt="">
                </div>
                <div class="right-text col-md-8">
                  <h4><em>Integer suscipit</em><br>Nullam volutpat mi vel</h4>
                  <p>Nulla tempor lectus at mauris bibendum porttitor. Aenean ultrices orci id nibh sodales, vel suscipit arcu vulputate. Pellentesque hendrerit diam quis leo dignissim, lacinia interdum nunc volutpat. Morbi lobortis mattis lectus, a dictum augue lobortis non. Fusce eu nulla sagittis, scelerisque eros fringilla, commodo dolor.</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="fourth-section">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="portfolio-item first-item">
                  <div class="image">
                    <a href="img/01-big-item.jpg" data-lightbox="image-1"><img src="img/first-item.jpg"></a>
                  </div>
                  <div class="text">
                    <span>Nature</span>
                    <h4>Robotic Light</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="portfolio-item second-item">
                  <div class="image">
                    <a href="img/02-big-item.jpg" data-lightbox="image-1"><img src="img/second-item.jpg"></a>
                  </div>
                  <div class="text">
                    <span>Architect</span>
                    <h4>Rock Solid</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="portfolio-item third-item">
                  <div class="image">
                    <a href="img/03-big-item.jpg" data-lightbox="image-1"><img src="img/third-item.jpg"></a>
                  </div>
                  <div class="text">
                    <span>Focus</span>
                    <h4>Clean Design</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="send-to-portfolio">
                  <span>Do you want to see more?</span>
                  <div class="primary-button">
                    <a href="portfolio-page.html">Visit gallery</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="fivth-section">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="left-text col-md-8">
                  <h4><em>Aliquam efficitur</em><br>augue et libero vulputate feugiat</h4>
                  <p>Mauris eget orci porta, aliquam neque sit amet, porttitor dui. Donec efficitur vehicula justo quis varius. Vivamus pharetra lorem eget turpis ornare tempus. Vivamus ac sodales lectus. Morbi rhoncus feugiat neque ultrices rhoncus. Maecenas ultrices, nisl pellentesque hendrerit dignissim, ante purus hendrerit urna, eu tristique est massa quis risus.</p>
                </div>
                <div class="right-image col-md-4">
                  <img src="img/right-image.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="sixth-section">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <form id="contact" action="" method="post">
                    <div class="col-md-6">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="btn">Send Message</button>
                      </fieldset>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-5">
                <div class="right-info">
                  <ul>
                    <li><a href="#"><i class="fa fa-envelope"></i>hello@company.com</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i>050 060 0780 / 050 060 0110</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i>1186 New Street, ST 10990</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>

        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-rss"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
                <p>Copyright &copy; 2017 Company Name

                        | Design: Tooplate</p>
              </div>
            </div>
          </div>
        </footer>-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
