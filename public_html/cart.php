<?php
    session_start();
    
    if(!isset($_SESSION['user_id'])) {
		header('location: login.php?error=Please log in to enter');
		exit();
	}
?>
<!DOCTYPE html>

<html>
   <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shopping Cart - The Fashion Shop</title>
    
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
          <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">Shopping Cart</div>
		   <div class="intro-lead-in">Fashion is our Passion</div>
          <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="aboutUs.php">Tell Me More</a>
        </div>
      </div>
    </header>

    <br/>
<?php
    // Prompt error message
        if(isset($_GET['error'])) {
            echo '<div>';
                echo '<div class="row">';
                    echo '<div class="col-lg-12">';
                        echo '<div class="bg-danger" style="border-radius: 5px;">';
                            echo '<p class="p-1 pl-3" style="color:#FFF;">'. $_GET['error'] .' <a href="cart.php" class="float-right pr-3">Close</a></p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        //Prompt successful message
        if(isset($_GET['msg'])) {
            echo '<div>';
                echo '<div class="row">';
                    echo '<div class="col-lg-11">';
                        echo '<div class="bg-success" style="border-radius: 5px; margin-left: 30px;">';
                            echo '<p class="p-1 pl-3" style="color:#FFF;">'. $_GET['msg'] .' <a href="cart.php" class="float-right pr-3">Close</a></p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
	?>
    <?php
        if($conn = mysqli_connect('localhost', 'root', '', 'the_fashion_shop')) {

            $sql = "SELECT * FROM ordered_item WHERE user_id = '". $_SESSION['user_id'] ."';";

            if($result = mysqli_query($conn, $sql)) {

                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>&nbsp;</th>';
                            echo '<th>&nbsp;</th>';
                            echo '<th>Name</th>';
                            echo '<th>Size</th>';
                            echo '<th>Color</th>';   
                            echo '<th>Quantity</th>';
                            echo '<th>Price</th>';
                            echo '<th>Total</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                        if(mysqli_num_rows($result) > 0) {
                            $total = 0;
                            $qty=0;
                            while($row = mysqli_fetch_assoc($result)) {

                                $sql2 = "SELECT * FROM item WHERE item_id = ". $row['item_id'] ."";
                                
                                $row2 = NULL;
                                
                                if($result2 = mysqli_query($conn, $sql2)) {
                                        if(!$row2 = mysqli_fetch_assoc($result2)) {
                                                echo '<p>Error</p>';
                                        }
                                }

                                echo '<tr>';
                                 echo '<td style="vertical-align:middle;"><a href="deleteCart.php?id='. $row['order_id'] .'" class="btn btn-danger" 
                                            onclick="return confirm(\'Are you sure you want to remove this product?\');"><i class="fas fa-trash-alt "></i></a></td>';
                                    echo '<td><img src="img/'.$row2['image'].'" style="width:115px" height="130px"></td>';
                                    echo '<td width="20%">'. $row2['name'] .'</td>';

                                    switch($row['size']) {
                                        case 1:
                                                echo '<td width="15%">S <br>(96-101cm/37.8-39.8")</td>';
                                                break;
                                        
                                        case 2:
                                                echo '<td width="15%">M <br>(101-106cm/39.8-41.7")</td>';
                                                break;

                                        case 3:
                                                echo '<td width="15%">L <br>(106-111cm/41.7-43.7")</td>';
                                    }

                                    echo '<td width="10%">'. $row['color'] .'</td>';
                                     echo '<td width="10%">'.$row['quantity'].'</td>';
                                    echo '<td width="10%"> RM'. $row2['price'] .'</td>';
                                    echo '<td width="10%"><b> RM'.number_format($row["quantity"] * $row2["price"], 2).'</b></td>';
                                echo '</tr>';
                                $total += ($row["quantity"] * $row2["price"]);
                                $qty += $row["quantity"];
                                
                                
                                }
                                 echo '<tr>
                                <td colspan="5" align="right"><b>Total Order:</b></td>';   
                                echo '<td align="left"><b>'.number_format($qty).' Item(s)</b></td>
                                <td colspan="1" align="right"><b>SubTotal:</b></td>';   
                                echo '<td align="left"><b>RM'.number_format($total, 2).'</b></td>
                                </tr>';
                            } 
                            else {
                                echo '<tr>';
                                    echo '<td colspan="9"><center><img src = "img/cart.jpg" class="w-30"><p style="font-size:20pt" padding-bottom:50px;">
                                          Click <a href="men.php" class="text-info">here<a> to continue shopping.</p></center></td>';
                                echo '</tr>';
                            }                       
                           
                            
                        echo '</tbody>';
                    echo '</table>';
               
                
                echo '<hr style="height:1px;border-color:grey">';
                
                echo '<div class ="row">';
                echo '<div class ="col-lg-10"><a href="men.php" class="btn btnCart">Continue Shopping</a></div>';
                echo '<div class ="col-lg-2"><a href="checkout.php" class="btn btnCart2"><i class="fas fa-shopping-cart"></i>&emsp;Check out</a></div>';
                echo '</div>';
            }
        }
	?>
    
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
