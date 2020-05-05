<?php require'base/header.php';?>
<div class="container">
	<h1>My Operator Group</h1><hr />
	<button type="" class="btn btn-primary" onclick="location.href='addOperatorGroup.php';"  >Add Group</button><br /><br />

	<?php
	require("Modle/conn.php");
	$sql = "SELECT og.OperatorGroupID FROM operatorgroup og, opertor o, account a WHERE og.OpertorID = o.opertorID and o.accountID = a.AccountID and a.accountID = '".$_SESSION['AccountID']."'";
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
		echo "<td><a href='manageOGML.php?OGID=".$rc['OperatorGroupID']."'>Manage</a></td></tr>";

	}
	echo "</table>";
	?>
</div>
<?php require'base/footer.php';?>