<?php require'base/header.php';?>
<div class="container" id="effect">
<form action="Controllers/addShop.php" method="Post">

<div >
    <h3>Shop</h3>
    <hr/>
<div class="row">
  
    <b class="col-sm-2">Shop Name:</b>
    <input type="text" placeholder="Shop Name" name="Name"  class="col-sm-3" required>*
</div>
<div class="row">
  
    <b class="col-sm-2">Operator Group:</b>
    <select name="OperatorGroup" class="custom-select col-sm-3">
    <option selected>Custom Select a Group</option>
	<!--Group List-->
	<?php
		require("Modle/conn.php");
		$sql = "SELECT * FROM operatorgroup og, opertor o, account a WHERE og.OpertorID = o.OpertorID and o.AccountID = a.AccountID and a.AccountID = '".$_SESSION['AccountID']."'";
		$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		while($rc = mysqli_fetch_assoc($rs)) {
	?>
    <option value="<?=$rc['OperatorGroupID']?>"><?=$rc['OperatorGroupID']?></option>
    <?php
		}
	?>
  </select>*
</div>
<div class="row">
  
    <b class="col-sm-2">Shop Type:</b>
    <select name="Type" class="custom-select col-sm-3">
    <option selected>Custom Select Type of shop</option>
    <option value="reataurant">Reataurant</option>
    
  </select>*
</div>

<div class="row">
    <b class="col-sm-2">ICON:</b>
    <div class="custom-file col-sm-3">
        <input type="file" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
</div> 


  
  <h3>Contact</h3>
  <hr/>
 
<div class="row">
    <b class="col-sm-2">Email:</b>
    <input type="email" placeholder="Email" name="Email" class="col-sm-3">
    <b class="col-sm-2">Tel:</b>
    <input type="Number" placeholder="Tel" name= "Tel"  class="col-sm-3">
</div>
<div class="row">
   
    <b class="col-sm-2"> Address:</b>
    <input type="Number" placeholder="Address" name="Address" class="col-sm-8">
</div>

<br/>

 
        


    
<div class="row">
 <button type="submit" class="btn btn-primary"   >Add</button>
  <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'" value="Back">Back</button>
  </div>
</form>
</div>
</div>

<?php require'base/footer.php';?>
