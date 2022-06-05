<?php
session_start();

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); //Redirecting to myrestaurant Page
}

require 'connection.php';
$conn = Connect();






?>


<html>

  <head>
    <title> DBMS | Food Hub </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/foodlist.css">
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
            <li><a href="aboutus.php">About</a></li>
            
            
            <form class="navbar-form navbar-left" action="foodlist.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
            

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
            <li class="active" ><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a></li>
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

 

<div class="jumbotron">
  <div class="container text-center">
    <h1>Food Hub</h1>      
    <p>choose the food item and mention the quantity </p>
  </div>
</div>




<div class="container" style="width:95%;">
    
<?php
if(isset($_POST['search'])){
    $searchq=$_POST['search'];
    $sql="SELECT * FROM FOOD WHERE NAME LIKE '%$searchq%'";
    $query = mysqli_query($conn,$sql) or die("couldnt search");
 
    
    
   
    
    $count=mysqli_num_rows($query);
    if($count>0){
       while($row = mysqli_fetch_assoc($query)){
           
           $myresult = "SELECT RESTAURANTS.name FROM RESTAURANTS WHERE $row[R_ID]=RESTAURANTS.R_ID";
        $R_myresult = mysqli_query($conn,$myresult);
    $R_namers=mysqli_fetch_assoc($R_myresult);
   
      
           
           
           

?>
<div class="col-md-4">

<form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
<div class="mypanel" align="center";>
<img src="<?php echo $row["images_path"]; ?>" class="img-responsive" max-width:10%>
<h5 class="text-info"><?php echo $row["name"]; ?></h5>
<h5 class="text-info"><?php echo $row["description"]; ?></h5>
<h5 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5>
<h5 class="text-info"><?php echo $R_namers["name"]; ?></h5>
<h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
<input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
<input type="hidden" name="hidden_rname" value="<?php echo $R_namers["name"]; ?>">
<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
</div>
</form>
      
     
</div>
 <?php
    }}else{
        
           echo '<script>alert("food is unavailable")</script>';
           echo '<script>window.location="foodlist.php"</script>';
        }
    }
    ?>

<!-- Display all Food from food table -->
<?php
if(!isset($_POST['search'])){

$sql = "SELECT * FROM FOOD ORDER BY F_ID";
$result = mysqli_query($conn, $sql);

$R_namesql = "CALL `restselect`();";
$R_nameresult = mysqli_query($conn,$R_namesql);

 
if (mysqli_num_rows($result) > 0)
{

  while($row = mysqli_fetch_assoc($result)){
   $R_namers=mysqli_fetch_assoc($R_nameresult);
   

?>
<div class="col-md-4">

<form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
<div class="mypanel" align="center";>
<img src="<?php echo $row["images_path"]; ?>" class="img-responsive" max-width:10%>
<h5 class="text-info"><?php echo $row["name"]; ?></h5>
<h5 class="text-info"><?php echo $row["description"]; ?></h5>
<h5 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5>
<h5 class="text-info"><?php echo $R_namers["name"]; ?></h5>
<h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
<input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
<input type="hidden" name="hidden_rname" value="<?php echo $R_namers["name"]; ?>">
<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
</div>
</form>
      
     
</div>

<?php
  }
}
}
else
{
    $sql = "SELECT * FROM FOOD ORDER BY F_ID";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0){
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.We will solve this problem shortly.</h1> </label>
        
      </center>
       
    </div>
  </div>

  <?php
    }

}

?>

</div>
   
</body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Food Hub 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>

</html>