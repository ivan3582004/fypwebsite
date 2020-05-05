<?php require 'base/header.php'; ?>
<div class="container" id="effect">
  <form action="Controllers/addShop.php" method="Post">
    <div>
      <h3>Shop</h3>
      <hr />
      <div class="row">

        <b class="col-sm-2">Shop Name:</b>
        <input type="text" placeholder="Shop Name" name="Name" class="col-sm-3" required>*
      </div>
      <div class="row">

        <b class="col-sm-2">Operator Group:</b>
        <select name="OperatorGroup" class="custom-select col-sm-3" required>*
          <option disabled selected>Custom Select a Group</option>
          <!--Group List-->
          <?php
          require("Modle/conn.php");
          $sql = "SELECT * FROM operatorgroup og, opertor o, account a WHERE og.OpertorID = o.OpertorID and o.AccountID = a.AccountID and a.AccountID = '" . $_SESSION['AccountID'] . "'";
          $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          while ($rc = mysqli_fetch_assoc($rs)) {
          ?>
            <option value="<?= $rc['OperatorGroupID'] ?>"><?= $rc['OperatorGroupID'] ?></option>
          <?php
          }
          ?>
        </select>*
      </div>
      <div class="row">

        <b class="col-sm-2">Shop Type:</b>
        <select name="Type" class="custom-select col-sm-3" id="shoptype" onchange="expl()" required>*
          <option disabled selected>Custom Select Type of shop</option>
          <option value="restaurant">Restaurant</option>
		  <option disabled value="restaurant">Service</option>
		  

        </select>*
      </div>
	  <div id="resttype" style="display:none;">
      <div class="row" >
	  
        <b class="col-sm-2">Restaurant type:</b>
        <input list="foodlist" placeholder="Type of food" name ="FoodType" class="custom-select col-sm-3">*
        <datalist id="foodlist">
          <?php
          require("Modle/conn.php");
          $sqll = "SELECT FoodType FROM restaurant GROUP BY FoodType";
          $rss = mysqli_query($conn, $sqll) or die(mysqli_error($conn));
          while ($rcc = mysqli_fetch_assoc($rss)) {
            echo "<option label='" . $rcc["FoodType"] . "'value='" . $rcc["FoodType"] . "'>";
          }
          mysqli_close($conn);
          ?>
        </datalist>
      </div>
	  </div>
	  
      <script>
        function expl() {
          if (document.getElementById("shoptype").value == "restaurant") {
            document.getElementById("resttype").style = "display: inline;";
          } else {
            document.getElementById("resttype").style = "display: none;";
          }
        }
      </script>
      <div class="row">
        <b class="col-sm-2">ICON:</b>
        <div class="custom-file col-sm-3">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
      </div>
      <h3>Contact</h3>
      <hr />

      <div class="row">
        <b class="col-sm-2">Email:</b>
        <input type="email" placeholder="Email" name="Email" class="col-sm-3" required>*
        <b class="col-sm-2">Tel:</b>
        <input type="tel" placeholder="Tel" name="Tel" class="col-sm-3" required>*
      </div>
      <div class="row">

        <b class="col-sm-2"> Address:</b>
        <input type="text" placeholder="Address" name="Address" class="col-sm-8" required>*
      </div>

      <br />






      <div class="row">
        <button type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'" value="Back">Back</button>
      </div>
  </form>
</div>
</div>

<?php require 'base/footer.php'; ?>