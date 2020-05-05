<?php require'base/header.php';?>
<div class="container">
	<h1>My Shop</h1><hr />
	<button type="" class="btn btn-primary" onclick="location.href='addShop.php';"  >Add Shop</button><br /><br />

	<?php
	require("Modle/conn.php");
	$sql = "SELECT s.ShopID,s.Name,s.Address,s.Statis,s.Email,s.Email FROM operatorgroupmemberlist ogml, OperatorGroup og, Opertor o, account a, shop s WHERE og.OperatorGroupID = ogml.OperatorGroupID and o.OpertorID = ogml.OpertorID and a.AccountID=o.AccountID and s.OperatorGroupID = og.OperatorGroupID and a.AccountID = '".$_SESSION['AccountID']."'";
	$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	$f = true;
	echo "<table  class='table'>";
	while($rc = mysqli_fetch_assoc($rs)) {

		if($f){
			echo '<thead class="thead-dark">';
			echo "<tr>";
			foreach($rc as $key => $value){
				echo "<th>".$key."</th>";
			}
			echo "<th></th></tr>";
			echo '</thead>';
			$f = false;
		}

		echo "<tr>";
		foreach($rc as $key => $value){
			echo "<td>".$value."</td>";
		}
		echo "<td><a href='managePage.php?SID=".$rc['ShopID']."'>Manage</a></td></tr>";

	}
	echo "</table>";
	?>
</div>
<?php require'base/footer.php';?>