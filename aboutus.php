<?php
session_start();
?>

<html>

  <head>
    <title> About | Food Hub </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/aboutus.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>

  

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Food Hub</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="aboutus.php">About</a></li>
            
          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart 
            (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
            </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              
          
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>

            </ul>
            </li>
          </ul>

<?php
}
?>
        </div>

      </div>
    </nav>

    <div class="wide">
        
        <div class="tagline"><font color="red"><strong>Order now!</strong></font>, Limited discount period!<br><font color="green"><strong><em>what are you waiting for?</em></strong></font></div>
    </div>

    <div class="paragraph1">
      <h1>TEAM FoodHub(Rahul,Nehana and Pooja)</h1>
      <h3><p>Food Hub was founded in 2020. We care about quality, craft and taste.</h3>
    </div>

    <div class="col-xs-12 line"><hr></div>

    <div class="col-md-10" style="float: none; margin: 0 auto;">
        <div class="paragraph2">
          <h1><center>SOME FEATURES OF THIS PROJECT:</center></h1>
          <p><br>
          <div class="goldcolor">
          <h2>1. Multiple customer sign ins </h2>
          </div>
          <h3>The customer database stores details of all our customers</h3> 
          </p>
          <p><br>
          <div class="goldcolor">
          <h2>2. Dynamic food deletion,addition updation through manager</h2>
          </div>
          <h3>Easy interface to add food details</h3> 
          </p>
          <p><br>
          <div class="goldcolor">
            <h2>3. multiple food items to choose from</h2>
            </div>
            <h3>customer can choose any food item and of any quantity</h3>
          </p>
          <p><br>
          <div class="goldcolor">
            <h2>4.Cash on delivery with token generation</h2>
            </div>
            <h3>token generated has payment details which can be paid directly to the delivery person</h3>
          </p>
          <p><br>
          <div class="goldcolor">
            <h2>5. Real time order tracking.</h2>
            </div>
            <h3>Know at what stage your order is anytime before it gets delivered!</h3>
          </p>
        </div>
    </div>

    
         </body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Food Hub 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>