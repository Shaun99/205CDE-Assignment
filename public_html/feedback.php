<?php
    session_start();
    
    if(isset($_SESSION['uName']) && $_SESSION['uName'] == "Shaun") {
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer Feedback - The Fashion Shop</title>

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
                        <a class="nav-link js-scroll-trigger text-center" href="login.php"><?php echo isset($_SESSION['uName']) ? "Logged in as ". $_SESSION['uName'] : "Login"; ?></a>
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
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <div class="intro-lead-in"> Database - Customer Feedback </div>
                <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">Admin Control Panel</div>
                <div class="intro-lead-in">Strictly for Authorised Only</div>
                <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="view.php">Back to View Database</a>
            </div>
        </div>
    </header><br>

<?php 
    if(isset($_GET['msg'])) {
            echo '<div>';
                echo '<div class="row">';
                    echo '<div class="col-lg-11">';
                        echo '<div class="bg-success" style="border-radius: 5px; margin-left: 30px;">';
                            echo '<p class="p-1 pl-3" style="color:#FFF;">'. $_GET['msg'] .' <a href="feedback.php" class="float-right pr-3">Close</a></p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }

    //Connect and select:
    $dbc = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($dbc,"the_fashion_shop");
	
    //Define thr query
    $query = 'SELECT * FROM contact_us ORDER BY name DESC';
	
    //Run the query
    if($r = mysqli_query($dbc,$query)){
		
        //Retieve and run the record
        while($row = mysqli_fetch_array($r)){
            print  '<div class="row mb-5 feedback-form-2">
                        <div class="col-md-12">
                            <div class="container4">
                            <a href="deleteFeedback.php?id='. $row['id'] .'" onclick="return confirm(\'Are you sure you want to remove this feedback?\');" title="Remove">
                                <i class="fas fa-times fa-2x" style="color:darkred;"></i>
                                </a>
                            </div><br>
                           <p>
                            <h5>&nbsp;<i class="fa fa-user"></i>&nbsp;Name : '.$row['name'].'</h5>
                            <h5>&nbsp;<i class="fa fa-envelope"></i>&nbsp;Email : '.$row['email'].'</h5>
                            <h5>&nbsp;<i class="fa fa-phone"></i>&nbsp;Phone Number : '.$row['phone'].'<br/></h5>
                            <h5>&nbsp;<i class="fas fa-comment-dots"></i>&nbsp;Message : '.$row['message'].'<br/></h5>';

                            print "<hr style=\"height:1px;background-color:#273515;\">
                            </p> 
                        </div>
                    </div>";
        }
    }else{
            header('location: add.php?error=Could not retrieve the data because:<br/>'.mysqli_error($dbc). '. The query being run was: '.$query.'');
            exit();
    }//end of query
	
        mysqli_close($dbc);
?>  
<br/><br/>
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
    
    var element = document.getElementById('time');	
	
	setInterval(function() {
		var date = new Date();
		element.innerHTML = (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()) + "<br/>";
		element.innerHTML += ((date.getHours() < 10) ? "0" + date.getHours() : date.getHours()) + ":" + ((date.getMinutes() < 10) ? "0" + date.getMinutes() : date.getMinutes()) + ":" + ((date.getSeconds() < 10) ? "0" + date.getSeconds() : date.getSeconds());
	}, 1000);
</script>

</body>
</html>
<?php } else { ?>
<script>alert('Access Denied. Only for Authorised User.');</script>
<?php } ?>