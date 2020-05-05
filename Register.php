<?php require'base/header.php';?>
<div class="container" id="effect">
	<form action="Controllers/addAccount.php" method="Post">

	<div >
	    <h3>Account</h3>
	    <hr/>
	<div class="row">

	    <b class="col-sm-2">Display Name:</b>
	    <input type="text" placeholder="Display name on the site" name="Username"  class="col-sm-3" required>*(no space inclued)
	</div>
	<div class="row">

	    <b class="col-sm-2">AccountID:</b>
	    <input type="text" placeholder="AccountID" name="AccountID" class="col-sm-3" required>*
	</div>
	<div class="row">
	    <b class="col-sm-2">Password:</b>
	    <input type="password" placeholder="Password" name="pwd"  class="col-sm-3" required>*
	</div>
	<div class="row">
	    <b class="col-sm-2">Password comfirm:</b>
	    <input type="password" placeholder="Enter your password again" name="pwdc" class="col-sm-3" required>*
	</div>
	<div class="row">
	 <b class="col-sm-2">Email:</b>
	 <input type="email" placeholder="Email" name="Email" class="col-sm-3" required>*
	 </div>
	    
	<div class="row">
	    <b class="col-sm-2">ICON:</b>
	    <div class="custom-file col-sm-3">
	        <input type="file" class="custom-file-input" id="customFile">
	        <label class="custom-file-label" for="customFile">Choose file</label>
	      </div>
	</div>
	<h3>Personal</h3>
	  <hr/>
	<div class="row">
	    <b class="col-sm-2">Firstname:</b>
	    <input  type="text" placeholder="First Name" name="Firstname" class="col-sm-3" required>
	</div>
	<div class="row">
	    <b class="col-sm-2">Lastname:</b>
	    <input  type="text" placeholder="Last Name" name="Lastname" id="ln" class="col-sm-3" required>
	</div>


	<div class="row">
	    <b class="col-sm-2">Gender:</b>
	<div class="col-sm-3">
	    <div class="custom-control custom-radio">
	        <input type="radio" class="custom-control-input"  name="Gender" checked value="M">
	        <label class="custom-control-label" for="customRadio">M</label>
	    </div>
	    <div class="custom-control custom-radio">
	        <input type="radio" class="custom-control-input"  name="Gender" value="F">
	        <label class="custom-control-label" for="customRadio1">F</label>
	    </div>
	    </div>
	</div>


	  <h3>Contact</h3>
	  <hr/>

	<div class="row">
	    <b class="col-sm-2">Tel:</b>
	    <input type="Number" placeholder="Tel" name="Tel"  class="col-sm-3">
	</div>

	<br/>






	<div class="row">
		<button type="submit" class="btn btn-primary"   >Register</button>
		<button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'" value="Back">Back</button>
	</div><br />
	</form>
	</div>
</div>

<?php require'base/footer.php';?>
