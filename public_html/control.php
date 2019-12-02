<?php
    session_start();
    
    //Check for submission
    //Handle the form 
    //Connect and select:
    if (isset($_POST['submitted'])){

                $dbc = mysqli_connect ('localhost','root','');
                mysqli_select_db($dbc,"the_fashion_shop");
                $problem = FALSE;
                $target = "item/".basename($_FILES['image']['name']);

        //Validate the form data
        if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['description']) && isset($_POST['category']) && !empty($_FILES['image']['name'])){
                $name = trim($_POST['name']);
                $price = trim($_POST['price']);
                $desp = trim($_POST['description']);
                $category = trim($_POST['category']);
                $image = trim($_FILES['image']['name']);
        }
        else{  
            header('location: control.php?error=Please submit the name, price, description, category and image of the product.');
                exit();
                $problem = TRUE;
        }

        if(!$problem){
            //Define thr query
            $query = "INSERT INTO item(item_id, name, description, price, category, image) 
                          VALUES ('', '$name', '$desp', '$price', '$category', '$image')";

            //Execute the query
            if(@mysqli_query($dbc,$query)){
                    header ('location: control.php?msg= The website entry has been added! Click <a href="add.php">here</a> to view.');
                    exit();
                
            }
            else{
                    header('location: control.php?error=Could not add the entry because:<br/>'.mysqli_error($dbc).'');
                    exit();
            }
        }
        mysqli_close($dbc);
        }//End of form submission
    
    if(isset($_SESSION['uName']) && $_SESSION['uName'] == "Shaun") {
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Control - The Fashion Shop</title>
    
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
                <div class="intro-lead-in"> Settings </div>
                <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">Admin Control Panel</div>
                    <div class="intro-lead-in">Strictly for Authorised Only</div>
                <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="view.php">View Database</a>
            </div>
        </div>
    </header>

    <br/><br/>
      
    <?php
        if(isset($_GET['error'])) {
                echo '<div class="bg-danger" style="border-radius: 5px; padding:4px 2px 0px 2px; margin: 0px 50px 0px 50px;">';
                        echo '<p class="p-1 pl-3" style="color:#FFF;">'. $_GET['error'] .' <a href="control.php" class="float-right pr-3">Close</a></p>';
                echo '</div>';
        } elseif(isset($_GET['msg'])) {
                echo '<div class="bg-success" style="border-radius: 5px; padding:4px 2px 0px 2px; margin: 0px 50px 0px 50px;">';
                        echo '<p class="p-1 pl-3" style="color:#FFF;">'. $_GET['msg'] .' <a href="control.php" class="float-right pr-3">Close</a></p>';
                echo '</div>';
        }
    ?>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="well well-sm">
              <form class="form-horizontal" action="control.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <div class="note2">Add Product</div>
                <div class="form-content">
                       <!-- Name input-->
                       <div class="form-group">
                         <label class="col-md-3 control-label" for="name">Name:</label>
                         <div class="col-md-12">
                               <input id="name" name="name" type="text" placeholder="Enter product name" class="input-white" >
                         </div>
                       </div>

                       <!-- Price input-->
                       <div class="form-group">
                         <label class="col-md-3 control-label" for="price">Price:</label>
                         <div class="col-md-12">
                                <input type="text" class="input-white" id="price" name="price" placeholder="Enter product price" />
                         </div>
                       </div>

                       <!-- Message body -->
                       <div class="form-group">
                         <label class="col-md-3 control-label" for="description">Description:</label>
                         <div class="col-md-12">
                               <textarea class="form-control" id="description" name="description" placeholder="Enter product description..." rows="5"></textarea>
                         </div>
                       </div>

                       <!-- Category body -->
                       <div class="form-group">
                         <label class="col-md-3 control-label" for="description">Category:</label>
                         <div class="col-md-12">
                               <select name="category" class="form-control">
                                       <option value="0">Men</option>
                                       <option value="1">Women</option>
                                       <option value="2">Shoes &amp; Accessories</option>
                               </select>
                         </div>
                       </div>
                         <label class="col-md-2 control-label" for="description">Upload Image:</label>

                         <input type="file" name="image"><br/><br/>

                       <!-- Form actions -->
                       <div class="form-group">
                         <div class="col-md-12 text-center">
                               <button type="submit" name="submitted" class="btn btn-primary btn-lg text-dark">Post Entry</button>
                         </div>
                       </div>
               </div>
              </fieldset>
              </form>
                </div>
            </div>
        </div>
    </div>
        
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

<!-- Custom scripts for this template -->
<script src="js/agency.min.js"></script>
    
<script>
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