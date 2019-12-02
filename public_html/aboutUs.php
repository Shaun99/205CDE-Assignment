<?php
    session_start();
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About Us - The Fashion Shop</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="style.css" type="text/css" rel="stylesheet">

  </head>

  <body>

    <button class="btn-danger" onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-double-up fa-2x"></i></button>
    <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="#">The Fashion Shop</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
          
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Product
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="men.php">Men</a>
                          <a class="dropdown-item" href="women.php">Women</a>
                          <a class="dropdown-item" href="shoeaccessorie.php">Shoes & Accessories</a>
                        </div>
			</li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-center active" href="aboutUs.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-center " href="login.php"><?php echo isset($_SESSION['uName']) ? "Logged in as ". $_SESSION['uName'] : "Login"; ?></a>
            </li>
			 <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-center " href="register.php">Register</a>
            </li>
			 <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-center" href="cart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-center" href="contactUs.php">Contact Us</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger text-center" title="Logout" href="logout.php">
			  <i class="fas fa-power-off"></i> </a>
            </li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-cog"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="control.php" style="font-size:12px">Admin Control Panel</a>
			</div>
			</li>
			<li class="nav-item">
              <a class="nav-link text-center" id="time"></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Our Fashion Shop!</div>
          <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">About Us</div>
		   <div class="intro-lead-in">A style for every story.</div>
          <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="product.php">Back to Home</a>
        </div>
      </div>
    </header>
	
	<br/><br/>
        
<div class="container">
    <div class="about-section paddingTB60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about-title clearfix">

                        <div class="row">
                            <div class="col-sm-6">
                                <img src = "img/lap.jpg" class="w-100">
                            </div>
                                <div class="col-sm-6">
                                    <h3>Who are we? </h3>
                                    <hr class="colorgraph">
                                        <p class="about-paddingB">We are a web-based outlet that sells clothes and operates in Malaysia and Singapore. 
                                        We aim to provide an easy way to purchase clothing through our website. We plan to improve our platform in the coming future to become the service of choice in the region. 
                                        We currently have clothing ranging from childrens clothes to adult clothes. 
                                        We started this website because we believed e-marketing is the future.</p>
                                </div>
                        </div>
                        <br>
                                    <h3>Our Purpose </h3>
                                    <hr class="colorgraph">
                                    <p>We believe in the progress of technology and wish to utilize it in order to make it easier for our customers to make purchases in the modern day. 
                                    We also hope to provide a platform to connect both customers and sellers in a community. In the coming future we hope to continously enhance our platform in order 
                                    to provide an enjoyable shopping experience for all kinds of users.</p>
                    </div>
                </div>
                    <div class="col-md-5 col-sm-6">
                        <div class="about-img">
                            <img src="https://devitems.com/preview/appmom/img/mobile/2.png" alt="">
                        </div>
                    </div>	
            </div>
        </div>
    </div>
<br>

<div class="container team-sektion paddingTB60">

		<div class="site-heading text-center">
			<div class="border"></div>
				<h3>Our Team</h3>
				<p><i>We are the professional Web and graphic designer with over 6 years of experience. <br> 
				   The prople who work at Schon Outfit Shopper share the vision and value of our community.</i></p>
			<div class="border"></div>
		</div>

	<div class="row">
		<div class="col-md-4 team-box">
		    <div class="team-img thumbnail">
		       
		    <div class="team-content">    
		        <h3>Shaun Lee</h3>
		        <div class="border-team"></div>
		        <p>CEO & Founder</p>
		        <div class="social-icons"> 
				   <a href="https://www.facebook.com/leeshaun.99"><i class="fab fa-facebook fa-3x social text-primary"></i></a>
				   <a href="https://twitter.com/"><i class="fab fa-twitter-square fa-3x social text-info"></i></a>
					<a href="https://plus.google.com/"><i class="fab fa-google-plus-square fa-3x social text-danger"></i></a>
					<a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social text-warning"></i></a>
				</div>
		    </div>
		</div>
	</div>

	    <div class="col-md-4 team-box">
		    <div class="team-img thumbnail">
		       
		    <div class="team-content">    
		        <h3>Michael Sawyer</h3>
		        <div class="border-team"></div>
		        <p>Designer</p>
				<div class="social-icons"> 
                                    <a href="https://www.facebook.com"><i class="fab fa-facebook fa-3x social text-primary"></i></a>
                                    <a href="https://twitter.com/"><i class="fab fa-twitter-square fa-3x social text-info"></i></a>
                                    <a href="https://plus.google.com/"><i class="fab fa-google-plus-square fa-3x social text-danger"></i></a>
                                    <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social text-warning"></i></a>
				</div>
		    </div>
		</div>
	</div>
	<div class="col-md-4 team-box">
		<div class="team-img thumbnail">
		    <div class="team-content">    
		        <h3>Wilson Cornell</h3>
		        <div class="border-team"></div>
		        <p>Designer</p>
		        <div class="social-icons"> 
                                    <a href="https://www.facebook.com"><i class="fab fa-facebook fa-3x social text-primary"></i></a>
                                    <a href="https://twitter.com/"><i class="fab fa-twitter-square fa-3x social text-info"></i></a>
                                    <a href="https://plus.google.com/"><i class="fab fa-google-plus-square fa-3x social text-danger"></i></a>
                                    <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social text-warning"></i></a>
				</div>
		    </div>
		</div>
	</div>
	    
</div>
</div>
</div>

<!-- Services -->
	  <div class="container1">
          <hr style="border-color:grey">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <h4 class="section-subheading text-muted">Benefits for Shopping with Us.</h4>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-success"></i>
             <i class="fas fa-truck fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Delivery</h4>
            <p class="text-muted">Free delivery across Malaysia with minimum spend of RM35.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-secondary"></i>
              <!--<i class="fas fa-laptop fa-stack-1x fa-inverse"></i>-->
			  <i class="fas fa-shield-alt fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Shop Guarantee</h4>
            <p class="text-muted">Shop Guarantee that payment will only be relaeased to the shop when the buyers confirm the acceptance of products.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-warning"></i>
              <!-- <i class="fas fa-lock fa-stack-1x fa-inverse"></i> -->
			  <i class="fas fa-coins fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Fashion Rewards Coins</h4>
            <p class="text-muted">Fashion Coins can be received once payment is made for every RM1 = 1 coin. It can be used to redeem other awesome vouchers and deals!</p>
          </div>
        </div>
      </div>
    <hr style="border-color:grey">
     </div>
    
    <!-- Clients -->
    <section class="py-5">
      <div class="container">
        <h5>Official Licensed:</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6">
              <img class="img-fluid d-block mx-auto" src="img/logos/brand.png" alt="">
          </div>
          <div class="col-md-3 col-sm-6">
              <img class="img-fluid d-block mx-auto" src="img/logos/timberland.png" alt="">
          </div>
          <div class="col-md-3 col-sm-6">
              <img class="img-fluid d-block mx-auto" src="img/logos/ralph.png" alt="">
          </div>
          <div class="col-md-3 col-sm-6">
              <img class="img-fluid d-block mx-auto" src="img/logos/levis.jpg" alt="">
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <div class="footer">
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy;  The Fashion Shop 2019</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#"  class="text-warning">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#"  class="text-warning">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
	
  <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
	var element = document.getElementById('time');	
	
	setInterval(function() {
		var date = new Date();
		element.innerHTML = (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()) + "<br/>";
		element.innerHTML += ((date.getHours() < 10) ? "0" + date.getHours() : date.getHours()) + ":" + ((date.getMinutes() < 10) ? "0" + date.getMinutes() : date.getMinutes()) + ":" + ((date.getSeconds() < 10) ? "0" + date.getSeconds() : date.getSeconds());
	}, 1000);
  </script>
</html>
