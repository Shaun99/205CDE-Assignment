<?php
    session_start();
    //Connect and select
    $dbc = mysqli_connect('localhost','root','');
    mysqli_select_db($dbc, 'the_fashion_shop');

    if(isset($_GET['id']) && is_numeric($_GET['id'])){
            //Define query
            $query = "SELECT * FROM item WHERE item_id ='". $_GET['id'] ."'";

            if ($r = mysqli_query($dbc, $query)){ //Run the query
                    $row = mysqli_fetch_array($r); //Retrieve the information
            }
            else{
                    print '<p style ="color:red;">Could not retrieve the website entry because:<br/>'.mysqli_error($dbc);
            }
    }
    else if (isset($_POST['submitted'])){
        
            //Define the query
            $query = "UPDATE item SET name='{$_POST['name']}', price='{$_POST['price']}', 
                      description='{$_POST['description']}', category='{$_POST['category']}', image='{$_FILES['image']['name']}' WHERE item_id='{$_POST['id']}'";

            //Execute the query
            $r = mysqli_query($dbc, $query);

            //Report on the result
            if (mysqli_affected_rows($dbc) ==1){
                    header('location: add.php');
                    exit();
                    print '<p> The website entry has been updated.</p>';
            } else {
                    print '<p style="color: red;">Could not edit the website entry because: '. mysqli_error($dbc).
                    '<br/>';
            }
    }
    else {

            print '<p style="color:red;">This page has been accessed in error.</p>';
    }

    mysqli_close($dbc);
    
    if(isset($_SESSION['uName']) && $_SESSION['uName'] == "Shaun") {
		
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Product - The Fashion Shop</title>
    
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
                <div class="intro-lead-in"> Edit Product </div>
                <div class="intro-heading text-uppercase" style="font-family:'Lithos Pro Regular';">Admin Control Panel</div>
                    <div class="intro-lead-in">Strictly for Authorised Only</div>
                <a class="btn btn-warning btn-xl text-uppercase js-scroll-trigger" href="add.php">Back to View Product</a>
            </div>
        </div>
    </header>

    <br/><br/>
    
   <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="well well-sm">
              <form class="form-horizontal" action="edit.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <div class="note6">Edit Product</div>
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
                             <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                               <button type="submit" name="submitted" class="btn btn-primary btn-lg text-dark">Update Entry</button>
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