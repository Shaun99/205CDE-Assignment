<?php
    session_start();
    
    if(!isset($_SESSION['user_id'])) {
		header('location: men.php?error=Please log in to enter');
		exit();
	}
        
        if(isset($_POST['submit'])){
             header('location: men.php');
	}
        
?>
<!DOCTYPE html>

<html>
   <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CheckOut - The Fashion Shop</title>
    
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
              <a class="nav-link js-scroll-trigger text-center active" href="cart.php">Shopping Cart</a>
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
          <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">CheckOut</div>
		   <div class="intro-lead-in">Fashion is our Passion</div>
          <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="aboutUs.php">Tell Me More</a>
        </div>
      </div>
    </header>

    <br/>
    
    <div class="note"><h2>Safe & Secure <small> Online shopping</small></div>
    <div class="form-content">
        <div class="well well-sm">		
        <form class="form-horizontal" method="post" action="">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6" style="border: 1px solid #000; padding: 0;">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">Delivery Address</div><br>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address &nbsp;<i class="fas fa-truck"></i></h4>
                                </div>
                            </div>                      
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="input-white" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-12 ">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="input-white" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="input-white" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="input-white" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" class="input-white" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="input-white" value="" />
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="input-white" name="country" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="input-white" value="" /></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="border: 1px solid #000; padding: 0;">
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading text-center"><span><i class="glyphicon glyphicon-lock "></i></span>Secure Payment</div><br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Card Details &nbsp;<i class="far fa-credit-card"></i></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label><div class="col-md-12"><strong>Card Type:</strong></div></label>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <op<tion value="8">Discover</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                <div class="col-md-12"><input type="text" class="input-white" name="card_number" maxlength="19" value="" placeholder="xxxx-xxxx-xxxx-xxxx"/></div>
                            </div>
                        
                            <div class="row">
                                 &emsp;<div class="col-md-6"><strong>Card CVV:</strong>
                                 <input type="password" class="input-white" name="card_code" maxlength="3" value="" placeholder="xxx"/></div>
                                 <div class="col-sm-5">
                                <img src="img/cvv.png" style="width:100%" height="90%">
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label><strong>Expiration Date:</strong></label>
                                </div>
                                <div class="row">
                                    &emsp;
                                    <div class="col-lg-5">
                                        <select name = "month" class="form-control">
                                            <option value = " ">Month</option>
                                            <?php  
                                                //Generate number of months
                                                for ($m=1; $m<=12; $m++){
                                                echo "<option value=\"$m\">$m</option>\n";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-5">
                                        <select name = "year" class="form-control">
                                            <option value = " ">Year</option>
                                            <?php  
                                                //Generate number of years
                                                for ($y=2000; $y<=2030; $y++){
                                                echo "<option value=\"$y\">$y</option>\n";
                                                }
                                            ?>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php
                                if($conn = mysqli_connect('localhost', 'root', '', 'the_fashion_shop')) {
                                    $sql = "SELECT * FROM ordered_item WHERE user_id = '". $_SESSION['user_id'] ."';";
                                    if($result = mysqli_query($conn, $sql)) {
                                        if(mysqli_num_rows($result) > 0) {
                                        $total = 0;
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $sql2 = "SELECT * FROM item WHERE item_id = ". $row['item_id'] ."";
                                          
                                            $row2 = NULL;
                                
                                        if($result2 = mysqli_query($conn, $sql2)) {
                                            if(!$row2 = mysqli_fetch_assoc($result2)) {
                                                echo '<p>Error</p>';
                                            }
                                        }
                                        $total += ($row["quantity"] * $row2["price"]);
                                        
                                        } 
                                        }
                                        echo'<div class="container5">
                                            <div class ="row">
                                                <div class="col-lg-6">
                                                 <div class="payment2">
                                                <b>Merchandise Subtotal:</b>
                                                </div></div>
                                                <div class="col-lg-6" style="padding: 12px 40px 12px 0px; font-size:16px; color: #565555; text-align:right;";>
                                                <b>RM'.number_format($total, 2).'</b>
                                                </div>
                                                 <div class="col-lg-6">
                                                 <div class="payment3">
                                                <b>Shipping Subtotal:</b>
                                                </div></div>
                                                <div class="col-lg-6" style="padding: 8px 40px 12px 0px; font-size:16px; color: #565555; text-align:right;";>
                                                <b>RM3.00</b>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="payment">
                                                <b>Total Payment: </b>
                                                </div></div>
                                                 <div class ="col-lg-6" style="padding: 12px 40px 12px 0px; font-size:20px; text-align:right;";>
                                                 <b>RM'.number_format($total+3, 2).'</b>
                                                 </div>
                                                 <div class ="col-lg-12">
                                                 <input type="button" name="submit" class=" btnSubmit4 " data-toggle="modal" data-target="#myModal" value="Place Order"></div>
                                          </div></div>';
                                    }                                 
                                }?>
            <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header modalHeader">

                  <h4 class="modal-title">Thank you!</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <p>Your order has been successfully placed!</p>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-warning" name="submit" >Okay</button>
                </div>
              </div>

            </div>
          </div>
                                    <br>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>				
                            <center><img src = "img/card.png" style="width: 90%"></center>
                        </div>
                    </div>
                </div>
            </div>					
        </div>
        </form>
        </div>	
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
        
	var element = document.getElementById('time');	
	
	setInterval(function() {
		var date = new Date();
		element.innerHTML = (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()) + "<br/>";
		element.innerHTML += ((date.getHours() < 10) ? "0" + date.getHours() : date.getHours()) + ":" + ((date.getMinutes() < 10) ? "0" + date.getMinutes() : date.getMinutes()) + ":" + ((date.getSeconds() < 10) ? "0" + date.getSeconds() : date.getSeconds());
	}, 1000);
  </script>

  </body>
</html>
