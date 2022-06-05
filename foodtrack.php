
<html>
    <head>
        <meta charset="UTF-8">
        <title> Track Order | Food Hub </title>
    </head>
    <body>
        
        
        <?php
session_start();
?>

<html>

  <head>
    <title> Track Order | Food Hub </title>
    <style>
        
      
      .blink{
          color: black;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
          animation-name: blinker1;
          animation-duration: 1s;
         animation-timing-function: linear;
         animation-iteration-count: 3;
         animation-fill-mode: both;
         animation-delay: 1s;
      }
      .blink1{
          color: black;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
          animation-name: blinker;
          animation-duration: 2s;
         animation-timing-function: linear;
         animation-iteration-count: 3;
         animation-fill-mode: both;
         animation-delay: 6s;
      }
       .blink2{
          color: black;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
          animation-name: blinker;
          animation-duration: 2s;
         animation-timing-function: linear;
         animation-iteration-count: 3;
         animation-fill-mode: both;
         animation-delay: 14s;
      }
       .blink3{
          color: black;
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
          animation-name: blinker;
          animation-duration: 2s;
         animation-timing-function: linear;
         animation-iteration-count: 3;
         animation-fill-mode: both;
         animation-delay: 20s;
      }
      .blink_img {
            animation-name: blinky;
          animation-duration: 1s;
         animation-timing-function: linear;
         animation-iteration-count: 3;
         animation-fill-mode: both;
         animation-delay: 1s;
         }
         .blink_img1 {
             animation-name: blinky;
          animation-duration: 2s;
         animation-timing-function: linear;
         animation-iteration-count: 3;
         animation-fill-mode: both;
         animation-delay: 6s;
         }
       .blink_img2 {
           animation-name: blinky;
           animation-duration: 2s;
         animation-timing-function: linear;
         animation-iteration-count: 3;
         animation-fill-mode: both;
         animation-delay: 14s;
        }
        .blink_img3 {
            animation-name: blinky;
          animation-duration: 2s;
         animation-timing-function: linear;
         animation-iteration-count: 3;
         animation-fill-mode: both;
         animation-delay: 20s;
           }
      @keyframes blinker1 {
          50%{
              opacity: 0;
          }
        0% {color: black;}
        100% {color: green;}
        }
        @keyframes blinker {
          50%{
              opacity: 0;
          }
        0% {color: black;}
        50% {color: yellow;}
        100% {color: green;}
        }
        @keyframes blinky {
        50% { opacity: 0; }
        }
      
        
        
    </style>
  
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">

  <link rel="stylesheet" type = "text/css" href ="css/foodtrack.css">

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
            <li class="active" ><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
           

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
              else{
                echo "0";
                }
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
        <br><br><br><br><br><br>
        
        
        <div class="col-xs-3"><span class="blink_img">
            <img src="images/ok.jpeg" height='250px'></span>
        </div>
       
 
        <div class="col-xs-3"><span class="blink_img1">
            <img src="images/cook.jpeg" height='250px' ></span>
        </div>
        <div class="col-xs-3"><span class="blink_img2">
                <img src="images/order ready.jpeg"></span>
        </div>
        <div class="col-xs-3"><span class="blink_img3">
                <img src="images/served.jpeg" height='260px'  ></span>
        </div>
        
        <div class="col-xs-3">
         <p class ="blink"> Order Confirmed  </p>
        </div>
        
        <div class="col-xs-3">
              <p class="blink1" >Order <br> Being Prepared  <br>  </p>
          </div>
        
        
        <div class="col-xs-3">
            <p class="blink2"> Order <br> out for delivery <br>  </p>
        </div>
        
       
        
        <div class="col-xs-3">
            <p class="blink3"> Order<br> Picked Up  <br>  </p>
        </div>
        
        
        
        
        
          
        
        

       
     
        
 
        
        
        
        
        
  </div>

     

        <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  

  
</body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> FOOD HUB 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>
        
    </body>
</html>