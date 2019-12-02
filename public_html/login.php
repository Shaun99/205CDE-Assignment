<?php
session_start();

if(isset($_POST['submit'])){
					
    $conn = mysqli_connect('localhost', 'root', '', 'the_fashion_shop');
    $sql = "SELECT * FROM user WHERE uname = '". $_POST['uName'] ."' AND pword = '". $_POST['pWord'] ."'";

    if($result = mysqli_query($conn, $sql)) {
        if(mysqli_num_rows($result) > 0) {
            
            $row = $result->fetch_assoc();

            //Successfully login
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['uName'] = $_POST['uName'];
            
            //Store username and password if checked "Remember Me"
            if(!empty($_POST["remember"])) {
                setcookie ("uname",$_POST["uName"],time()+ 3600);
                setcookie ("pword",$_POST["pWord"],time()+ 3600); 
            } else {
                setcookie("uname","");
                setcookie("pword","");        
            }

            // Register $UN, $PW and redirect to file "signin.php"
            echo '<link href="style.css" type="text/css" rel="stylesheet">';
            echo '<div class="log">';
            echo '<div class="login1">';
            echo "<h2>Welcome, ";
            echo $_SESSION['uName'] = $_POST['uName'];
            echo "</h2>";
            echo "<script>setTimeout(\"location.href = 'men.php'\",3000);</script>";
            echo "<p style=\"color:#673405;\">Sign in successful, we will redirect you to homepage...</p><br>";
            exit();

        }
        else{
        // Print error message
        header('location: login.php?error=Invalid username or password. Please try again.');
        exit(mysqli_error($conn));
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

    <title>Login - The Fashion Shop</title>
    
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
              <a class="nav-link js-scroll-trigger text-center" href="aboutUs.php">About Us</a>
            </li>
            <li class="nav-item">
             <a class="nav-link js-scroll-trigger text-center active" href="login.php"><?php echo isset($_SESSION['uName']) ? "Logged in as ". $_SESSION['uName'] : "Login"; ?></a>
            </li>
			 <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-center" href="register.php">Register</a>
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
          <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">Login</div>
		   <div class="intro-lead-in">A classic never goes out of style.</div>
          <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="aboutUs.php">Tell Me More</a>
        </div>
      </div>
    </header>
	<br/><br/>
    <?php
        if(isset($_GET['error'])) {
                echo '<div class="bg-danger" style="border-radius: 5px; margin: 0px 50px 0px 50px;">';
                        echo '<p class="p-1 pl-3" style="color:#FFF;">'. $_GET['error'] .' <a href="login.php" class="float-right pr-3">Close</a></p>';
                echo '</div>';
        }
    ?>
        <form name="loginForm" action="login.php" onsubmit="return validateForm()" method="post">
          <div class="container3">
            <div class="login">
            <img src="img/login.png"  alt="login" width="100" height="100">
            </div>
            <div class="paragraph">	 
                <label> <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;<strong>Username ID:</strong></label><br>
                <input type="text" placeholder="Enter Username" name="uName" id="uName" value="<?php if(isset($_COOKIE["uname"])) { echo $_COOKIE["uname"]; } ?>"/>
            </div>	
            <div class="paragraph">
                <br>
                <label><i class="fa fa-lock"></i>&nbsp;<strong>Password:</strong></label><br>
                <input type="password" placeholder="Enter Password" id="pWord" name="pWord" value="<?php if(isset($_COOKIE["pword"])) { echo $_COOKIE["pword"]; } ?>"
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
           
                <div class="password">
                <input type="checkbox" onclick="myFunction()"> Show Password
                </div>
            </div>          
            <br>
            <div class="paragraph1">
            <input type="checkbox" checked="checked" name="remember" />
            Remember me 
            <a href="#" style="color: #ffbb00; padding-left:200px;"><i>Forgot Password?</i></a>
            </div>
            
        <br>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <button type="submit" name="submit" class="signbtn"><b>Login</b></button>  
            </div>
        </div><br>
        <div class="registerNow">
            <p>Don't have an account yet? <a href="register.php" class="text-danger"><i>Register Now</i></a></p>
        </div>
        </div>
        </form>
        
        
        
    <div class="container1">
    <hr style="border-color:grey">
    <div>
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
    </div>
    <hr style="border-color:grey">
    </div>
    <!-- Clients -->
    <section class="py-5">
      <div class="container">
		<h5>Official Licensed:</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/brand.png" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/timberland.png" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/ralph.png" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/levis.jpg" alt="">
            </a>
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
                <a href="#" class="text-warning">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="text-warning">Terms of Use</a>
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

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

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
            var x = document.forms["loginForm"]["uName"].value;
            var y = document.forms["loginForm"]["pWord"].value;
            
                if (x == "" && y == "") {
                  alert("Username and Password must be filled out");
                  return false;
                }else if (x == "") {
                  alert("Username must be filled out");
                  return false;
                }else if (y == "") {
                  alert("Password must be filled out");
                  return false;
                }
        }
        
        function myFunction() {
            var x = document.getElementById("pWord");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
        }
	
        var element = document.getElementById('time');	
	
	setInterval(function() {
		var date = new Date();
		element.innerHTML = (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()) + "<br/>";
		element.innerHTML += ((date.getHours() < 10) ? "0" + date.getHours() : date.getHours()) + ":" + ((date.getMinutes() < 10) ? "0" + date.getMinutes() : date.getMinutes()) + ":" + ((date.getSeconds() < 10) ? "0" + date.getSeconds() : date.getSeconds());
	}, 1000);
    </script>
</html>
