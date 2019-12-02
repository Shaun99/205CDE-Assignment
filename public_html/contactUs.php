<?php
	session_start();
	
	$value = false;
	
	// Check for submission
	if(isset($_POST['submit'])){

            $sql = "INSERT INTO contact_us (name, email, phone, message) VALUES ('". $_POST['name'] ."', '". $_POST['email'] ."', 
            '". $_POST['phone'] ."', '". $_POST['message'] ."');";

            if($conn = mysqli_connect('localhost', 'root', '', 'the_fashion_shop')) {
                    if(mysqli_query($conn, $sql)) {
                            $value = true;
                    }
            }
    }
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us - The Fashion Shop</title>
    
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
                          <a class="dropdown-item" href="men.php">Mens</a>
                          <a class="dropdown-item" href="women.php">Womens</a>
                          <a class="dropdown-item" href="shoeaccessorie.php">Shoes & Accessories</a>
                        </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-center" href="aboutUs.php">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-center " href="login.php"><?php echo isset($_SESSION['uName']) ? "Logged in as ". $_SESSION['uName'] : "Login"; ?></a>
                </li>
                             <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-center" href="register.php">Register</a>
                </li>
                             <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-center" href="cart.php">Shopping Cart</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-center active" href="contactUs.php">Contact Us</a>
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
              <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">Contact Us</div>
                       <div class="intro-lead-in">Dress how you want to be addressed</div>
              <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="aboutUs.php">Tell Me More</a>
            </div>
          </div>
        </header>
        <hr>   
            <center><h3>Feedback Form</h3></center>
        <hr>
          <div class="note"><h2>Drop us a comment! <small>Feel free to contact us</small></div>
          <form name="contactForm" action="contactUs.php"  method="post">
          <div class="form-content">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <i class="fa fa-user" aria-hidden="true"></i>&nbsp; Name
                      <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                      </span>
                  <input type="text" class="input-white" name="name" placeholder="Enter your name" /></div>
                  </div>
                  <div class="form-group">
                      <i class="fa fa-envelope"></i>&nbsp; Email Address
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                          </span>
                          <input type="Email" class="input-white" name="email" placeholder="Enter your email" id="email"
                                 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Exp: characters@characters.domain"/></div>
                   <div id="message">
                    <h5>Email must contain the following:</h5>
                    <p id="symbol" class="invalid"> An <b>at (@)</b> sign</p>
                    <p id="dot" class="invalid">Minimum 1 <b>dot (.)</b> or more</p>
                  </div>
                  </div>
                  <div class="form-group">
                      <i class="fa fa-phone"></i>&nbsp; Mobile No.
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                          </span>
                          <input type="text" class="input-white" name="phone" placeholder="Enter your phone no."  
                                 pattern="[0-9]+" title="Numeric Value Only"/></div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <i class="fas fa-comment-dots"></i>&nbsp; Message
                      <textarea name="message" class="form-control" rows="9" cols="25" 
                          placeholder="Enter your message here..."></textarea>
                  </div>
              </div>
                <div class="col-lg-12 d-flex justify-content-center">
                    
                <input type="submit" name="submit" class="submitbtn" onclick="return validateForm()" value="Send">
                </div>
          </div>
        </div>
              
          </form>
        <br><br>

        <div class="container">
           <section id="contact">
           <div class="row">

               <div class="card1 border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-phone fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">Call Us</h4>
                   <p>+04-6543345</p>
                  </div>
                </div>

               <div class="card1 border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">office <br> loaction</h4>
                   <address>110, Jalan Tasek SS1, <br> Simpang Ampat, 14120, <br> Bandar Tasek Utama, <br> Pulau Penang, 14120 </address>
                  </div>
               </div>

               <div class="card1 border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-building fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">office hours</h4>
                    <address>9.00 A.M. - 6.00 P.M.</address>
                  </div>
                </div>

               <div class="card1 border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-globe fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">email</h4>
                    <p>www.thefashionshop@gmail.com</p>
                  </div>
                </div>
           </div>
        </section>
        </div>
      <br>
      
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
      
        function validateForm() {
            var w = document.forms["contactForm"]["name"].value;
            var x = document.forms["contactForm"]["email"].value;
            var y = document.forms["contactForm"]["phone"].value;
            var z = document.forms["contactForm"]["message"].value;
            
                if (w == "" && x == "" && y == "" && z == "") {
                  alert("All fields must be filled out");
                  return false;
                }else if (w == "") {
                  alert("Username must be filled out");
                  return false;
                }else if (x == "") {
                  alert("Email must be filled out");
                  return false;
                }else if (y == "") {
                  alert("Phone No. must be filled out");
                  return false;
                }else if (z == "") {
                  alert("Message box must be filled out");
                  return false;
                }
        }
        
        var myInput = document.getElementById("email");
        var symbol = document.getElementById("symbol");
        var dot = document.getElementById("dot");

        // When the user clicks on the email field, show the message box
        myInput.onfocus = function() {
          document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the email field, hide the message box
        myInput.onblur = function() {
          document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
          // Validate at sign 
          var atSign = /[@]/g;
          if(myInput.value.match(atSign)) {  
            symbol.classList.remove("invalid");
            symbol.classList.add("valid");
          } else {
            symbol.classList.remove("valid");
            symbol.classList.add("invalid");
          }

          // Validate dot sign
          var dotSign = /[.]/g;
          if(myInput.value.match(dotSign)) {  
            dot.classList.remove("invalid");
            dot.classList.add("valid");
          } else {
            dot.classList.remove("valid");
            dot.classList.add("invalid");
          }
      }

	var element = document.getElementById('time');	
	
	setInterval(function() {
		var date = new Date();
		element.innerHTML = (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()) + "<br/>";
		element.innerHTML += ((date.getHours() < 10) ? "0" + date.getHours() : date.getHours()) + ":" + ((date.getMinutes() < 10) ? "0" + date.getMinutes() : date.getMinutes()) + ":" + ((date.getSeconds() < 10) ? "0" + date.getSeconds() : date.getSeconds());
	}, 1000);
  </script>

    </body>
</html>
