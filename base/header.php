<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['msg'])){
	echo "<script type='text/javascript'>alert('".$_SESSION['msg']."');</script>";
	unset($_SESSION['msg']);
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>FYP</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!--css-->
  <link rel="stylesheet" type="text/css" href="css/layout.css">
   <!--jquery-->
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark  sticky-top">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
		<!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Shop
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="browseRestaurant.php">Restaurant</a>
       
      </div>
    </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
	
	  <!--Customer-->
	  <?php 
	  
	  if (isset($_SESSION['Permission'])){
		  
		  if ($_SESSION['Permission']=='C'){
			  ?>
			  <li class="nav-item">
				<a class="nav-link" href="favorite.php">Favorite</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="MyTicketHistory.php">MyTicketHistory</a>
			  </li>
			  <?php
		  }
		  
		  
		  
		  if ($_SESSION['Permission']=='O'){
			  ?>
			  <!--operator-->
			  <li class="nav-item">
				<a class="nav-link" href="manageOperatorGroup.php">Operator Group</a>
			  </li>
			  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Manage Shop
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="manageShop.php">Restaurant</a>      
      </div>
    </li>
				
			 
			  
			  <?php
		  }
		?>
		?>
		<li class="nav-item">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle ="dropdown">
                  Hi <?=$_SESSION['Username']?>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="Pofile.php">Profile <img class="icon" src="img/icon/8.jpg"></a>
                  <a class="dropdown-item" href="Controllers/logout.php"> Logout <img class="icon" src="img/icon/7.jpg"></a>
    
                </div>
              </div>
            </li>

	  <?php
	  }else{
	  ?>
	  <li class="nav-item">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Login
  </button>   
  <button type="button" class="btn btn-primary" onClick="document.location.href='Register.php'">
    Register
  </button>
      </li>
	  <?php
	  }
	  ?>	  
    </ul>
  </div>  
</nav>


<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<div class="modal-body">
		   <form action="Controllers/login.php" method="post">
			  <div class="form-group">
				<label for="email">Account:</label>
				<input type="text" class="form-control" placeholder="Enter Account" id="ac" name="ac">
			  </div>
			  <div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
			  </div>
			  <div class="form-group form-check">
				<label class="form-check-label">
				  <input class="form-check-input" type="checkbox"> Remember me
				</label>
			  </div>
			  
		 </div>      
        <!-- Modal footer -->
        <div class="modal-footer">
		 <button type="submit" class="btn btn-primary">Submit</button>
		</form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- The Modal -->


	<div class="jumbotron text-center" style="margin-bottom:0">
  <h2>Home</h2>
</div>



<div class="container" style="margin-top:30px">

