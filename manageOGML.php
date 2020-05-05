<?php require'base/header.php';?>
<div class="container">
	<h1>Manage My Operator Group : <?php echo $_GET["OGID"]; ?></h1><hr />
	<form action="Controllers/addOGMember.php" method="Post">
		<b class="col-sm-2">Add new member :</b>
		<select name="OpertorID" class="custom-select col-sm-3" required>*
			<option disabled selected>Select a Operator</option>
			<!--Operator List-->
			<?php
				require("Modle/conn.php");
				$sql = "SELECT * FROM opertor";
				$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
				while ($rc = mysqli_fetch_assoc($rs)){
			?>
				<option value="<?= $rc['OpertorID']?>"><?= $rc['AccountID']?></option>
			<?php
				}
			?>
		</select>
		<input type="hidden" name="OGID" value="<?php echo$_GET['OGID']?>">
		<button type="" class="btn btn-primary" onclick="location.href='addOperatorGroup.php';"  >Add Member</button><br /><br />
	</form>
	<?php
		require("Modle/conn.php");
		$sql = "SELECT a.AccountID, o.OpertorID FROM operatorgroupmemberlist ogml, opertor o, account a WHERE ogml.OpertorID = o.OpertorID AND o.AccountID = a.AccountID AND ogml.OperatorGroupID = '".$_GET["OGID"]."'";
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
			echo "<td><a href='Controllers/removeOGMember.php?OGID=".$_GET["OGID"]."&OPID=".$rc['OpertorID']."'>Remove member</a></td></tr>";
		}
		echo "</table>";
	?>
</div>
<?php require'base/footer.php';?>