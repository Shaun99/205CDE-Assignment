<?php
    session_start();
	
    // Check for submission
	if(isset($_POST['submit'])){

            //Modify
            $date = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

            $sql1 = "SELECT *
                            FROM user
                            WHERE uname='". $_POST['uName'] ."';";

            $conn = NULL;
            $error = false;

            if($conn = mysqli_connect('localhost', 'root', '', 'the_fashion_shop')) {
                    if($result = mysqli_query($conn, $sql)) {
                            if(mysqli_num_rows($result) > 0) {
                                    $error = true;
                            }
                    }
            }

            if($error) {
                //Username exist
                exit('a');					

            } else {
                // Store user credentials details
                $sql1 = "INSERT INTO user 
                        (uname, email, pword, cpword, date, phone, street, city, state, zip, county, country) VALUES
                        ('". $_POST['uName'] ."', '". $_POST['eMail'] ."', '". $_POST['pWord'] ."', '". $_POST['cpWord'] ."', '". $date."', 
                         '". $_POST['phoneNum'] ."', '". $_POST['street'] ."', '". $_POST['city'] ."', '". $_POST['state'] ."',
                         '". $_POST['zip'] ."' , '". $_POST['county'] ."' , '". $_POST['country'] ."');
                        ";

                if(mysqli_query($conn, $sql1)) {
                        //Successfully registered
                        header('location: login.php');
                        exit();
                }
            }
            header('location: login.php');
	}
?>		
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register - The Fashion Shop</title>
    
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
              <a class="nav-link js-scroll-trigger text-center " href="login.php"><?php echo isset($_SESSION['uName']) ? "Logged in as ". $_SESSION['uName'] : "Login"; ?></a>
            </li>
			 <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-center active" href="register.php">Register</a>
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
          <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">Register</div>
		   <div class="intro-lead-in">The ultimate clothing to see the world in.</div>
          <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="aboutUs.php">Tell Me More</a>
        </div>
      </div>
    </header>
	<br/><br/>
        <form name="registerForm" action="register.php" onsubmit="return validateForm()" method="post">
        <div class="container2">
                <br>
                <div class="paragraph">	  
                    <label><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<strong>Name:</strong></label><br>
                    <input type="text" placeholder="Enter Name" name="uName" id="uName"/>
                </div>
                <div class="paragraph">
	            <br>	    
                    <label><i class="fa fa-envelope"></i>&nbsp;<strong>Email:</strong></label><br>
                    <input type="text" placeholder="Enter Email" name="eMail" id="eMail"
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Exp: characters@characters.domain"/>
                </div>
                <div id="message2">
                    <h5>Email must contain the following:</h5>
                    <p id="symbol" class="invalid"> An <b>at (@)</b> sign</p>
                    <p id="dot" class="invalid">Minimum 1 <b>dot (.)</b> or more</p>
                </div>
                <div class="paragraph">
                    <br>	    
                    <label><i class="fa fa-lock"></i>&nbsp;<strong>Password:</strong></label><br>
                    <input type="password" placeholder="Enter Password" id="pWord" name="pWord" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                           title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/> <br>
                <div class="password">
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div>
                </div><br>
                <div id="message">
                    <h5>Password must contain the following:</h5>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                <div class="paragraph">
	            <br>	     
                    <label><i class="fa fa-key"></i>&nbsp;<strong>Confirm Password:</strong></label><br>
                    <input type="password" placeholder="Enter Confirm Password" id="cpWord" name="cpWord"/>
                    <div class="password">
                    <input type="checkbox" onclick="myFunction2()"> Show Confirm Password
                    </div>
                    <br><br>
                </div>
                <div class="paragraph">
                    <label><i class="fa fa-birthday-cake"></i>&nbsp;<strong>Birthday:</strong></label>
                        <select name = "day" id="day">
	                <option value = "0">Day</option>
                        <?php  
                            //Generate number of days 
                            for ($d=1; $d<=31; $d++){
                            echo "<option value=\"$d\">$d</option>\n";
                            }
                        ?>
	                </select>
	                <select name = "month" id="month">
	                <option value = "0">Month</option>
                        <?php  
                            //Generate number of months
                            for ($m=1; $m<=12; $m++){
                            echo "<option value=\"$m\">$m</option>\n";
                            }
                        ?>
	                </select>
	                <select name = "year" id="year">
	                <option value = "0">Year</option>
                        <?php  
                            //Generate number of years
                            for ($y=1900; $y<=2019; $y++){
                            echo "<option value=\"$y\">$y</option>\n";
                            }
                        ?>
	                </select>   
                </div>
                <div class="paragraph">
	            <br>	     
                    <label><i class="fa fa-phone"></i>&nbsp;<strong>Tel. Number:</strong></label><br>
                    <input type="text" placeholder="Enter Telephone Number" name="phoneNum" id="phoneNum"/>
                </div>
                <div class="paragraph">
		    <br>	   
                    <label><i class="fa fa-map-marker"></i>&nbsp;<strong>Address:</strong></label><br>
                    <div class="Street">
                    <input type="text" placeholder="Street" name="street" id="street">
                    </div>
                    <div class="City">
                    <input type="text"  placeholder="City" name="city" id="city">
                    </div>
                    <div class="State">
                    <input type="text"  placeholder="State" name="state" id="state">
                    </div>
                    <div class="Zip">
                    <input type="text"   placeholder="Zip" name="zip" id="zip">
                    </div>
                    <div class="County">
                    <input type="text"  placeholder="County" name="county" id="county">
                    </div>
                    <div class="Country">
                    <input type="text"  placeholder="Country" name="country" id="country">
                    </div>
                    
                    <br>
                    
                    By creating an account you are agree to our <a href="#" class="text-warning" data-toggle="modal" data-target="#t_and_c_m"><b>terms &amp; conditions</b></a> including our Cookie Use.
                    <br><br>
                </div>
                 <div class="col-lg-12 d-flex justify-content-center">
                <button type="submit" name="submit" class="registerbtn" ><b>Register</b></button>
                 </div><br>
            <div class="signin">
                <p>Already have an account? <a href="Login.php" class="text-success"><i>Sign In</i></a></p>
            </div>
        </div>
        </form>
        <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
			<h6><strong>CONDITIONS OF USE</strong></h6>
			<p>Welcome to our online store! The Fashion Shop and its associates provide their services to you subject to the following conditions. 
			   If you visit or shop within this website, you accept these conditions. Please read them carefully. </p>
			<h6><strong>PRIVACY</strong></h6>
			<p> Please review our Privacy Notice, which also governs your visit to our website, to understand our practices. </p>
			<h6><strong>COPYRIGHT</strong></h6>
			<p>All content included on this site, such as text, graphics, logos, button icons, images, data compilations, and software, 
			   is the property of The Fashion Shop or its content suppliers and protected by international copyright laws. The 
			   compilation of all content on this site is the exclusive property of The Fashion Shop, with copyright authorship for 
			   this collection by The Fashion Shop, and protected by international copyright laws.</p>
			<h6><strong>SITE POLICIES, MODIFICATION, AND SEVERABILITY</strong></h6>
			<p>Please review our other policies, such as our Shipping and Returns policy, posted on this site. These policies also govern your
   			   visit to The Fashion Shop. We reserve the right to make changes to our site, policies, and these Conditions of Use at 
			   any time. If any of these conditions shall be deemed invalid, void, or for any reason unenforceable, that condition shall 
			   be deemed severable and shall not affect the validity and enforceability of any remaining condition.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal" onclick="agree();">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div>

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
            <span class="copyright" >Copyright &copy;  The Fashion Shop 2019</span>
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
        var agreed = false;
	
	function agree() {
		agreed = true;
	}
        
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
     
            var a = document.forms["registerForm"]["uName"].value;
            var b = document.forms["registerForm"]["eMail"].value;
            var c = document.forms["registerForm"]["pWord"].value;
            var d = document.forms["registerForm"]["cpWord"].value;
            var e = document.getElementById("day");
            var strDay = e.options[e.selectedIndex].value;
            var f = document.getElementById("month");
            var strMonth = f.options[f.selectedIndex].value;
            var g = document.getElementById("year");  
            var strYear = g.options[g.selectedIndex].value;
            var h = document.forms["registerForm"]["phoneNum"].value;
            var i = document.forms["registerForm"]["street"].value;
            var j = document.forms["registerForm"]["city"].value;
            var k = document.forms["registerForm"]["state"].value;
            var l = document.forms["registerForm"]["zip"].value;
            var m = document.forms["registerForm"]["county"].value;
            var n = document.forms["registerForm"]["country"].value;
            
                if (a == "" && b == "" && c == "" && d == "" && strDay=="0" && strMonth=="0" && strYear=="0" 
                    && h == "" && i == "" && j == "" && k == "" && l == "" && m == "" && n == "") {
                  alert("All fields must be filled out");
                  return false;
                }else if (a == "") {
                  alert("Username must be filled out");
                  return false;
                }else if (b == "") {
                  alert("Email must be filled out");
                  return false;
                }else if (c == "") {
                  alert("Password must be filled out");
                  return false;
                }else if (d == "") {
                  alert("Confirm Password must be filled out");
                  return false;
                }else if (strDay=="0") {
                  alert("Birthday: Day must be filled out");
                  return false;
                }else if (strMonth == "0") {
                  alert("Birthday: Month must be filled out");
                  return false;
                }else if (strYear == "0") {
                  alert("Birthday: Year must be filled out");
                  return false;
                }else if (h == "") {
                  alert("Phone Number must be filled out");
                  return false;
                }else if (i == "") {
                  alert("Address: Street must be filled out");
                  return false;
                }else if (j == "") {
                  alert("Address: City must be filled out");
                  return false;
                }else if (k == "") {
                  alert("Address: State must be filled out");
                  return false;
                }else if (l == "") {
                  alert("Address: Zip must be filled out");
                  return false;
                }else if (m == "") {
                  alert("Address: County must be filled out");
                  return false;
                }else if (n == "") {
                  alert("Address: Country must be filled out");
                  return false; 
                }
                
                if(agreed) {
                    return true;
		} else {
			alert('Please agree to the terms and conditions to continue');
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
        
        function myFunction2() {
            var y = document.getElementById("cpWord");
           
            if (y.type === "password") {
              y.type = "text";
            } else {
              y.type = "password";
            }
        }
        
        var myInput = document.getElementById("pWord");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        var myInput2 = document.getElementById("eMail");
        var symbol = document.getElementById("symbol");
        var dot = document.getElementById("dot");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
          document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
          document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
          // Validate lowercase letters
          var lowerCaseLetters = /[a-z]/g;
          if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
          } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
          }

          // Validate capital letters
          var upperCaseLetters = /[A-Z]/g;
          if(myInput.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
          } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
          }

          // Validate numbers
          var numbers = /[0-9]/g;
          if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
          } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
          }

          // Validate length
          if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
          } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
          }
        }
        
         // When the user clicks on the email field, show the message box
        myInput2.onfocus = function() {
          document.getElementById("message2").style.display = "block";
        }

        // When the user clicks outside of the email field, hide the message box
        myInput2.onblur = function() {
          document.getElementById("message2").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput2.onkeyup = function() {
          // Validate at sign 
          var atSign = /[@]/g;
          if(myInput2.value.match(atSign)) {  
            symbol.classList.remove("invalid");
            symbol.classList.add("valid");
          } else {
            symbol.classList.remove("valid");
            symbol.classList.add("invalid");
          }

          // Validate dot sign
          var dotSign = /[.]/g;
          if(myInput2.value.match(dotSign)) {  
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
</html>
