<?php require'base/header.php';?>
<div class="container" id="effect">
	<form action="Controllers/addOperatorGroup.php" method="Post">
		<div>
			<h3>Add Operator Group</h3>
			<hr />
			<div class="row">
				<b class="col-sm-2">Operator Group ID:</b>
				<input type="text" placeholder="Operator Group ID" name="OGId" class="col-sm-3" required>*
			</div>
			<div class="row">
				<b class="col-sm-2">Operator ID:</b>
				<select name="OperatorID" class="custom-select col-sm-3" required>*
					<option disabled selected>Select a Operator ID</option>
					<!--Operator List-->
					<?php
					require("Modle/conn.php");
					$sql = "SELECT * FROM opertor";
					$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
					while ($rc = mysqli_fetch_assoc($rs)){
					?>
						<option value="<?= $rc['OpertorID']?>"><?= $rc['OpertorID']?></option>
					<?php
					}
					?>
				</select>
			</div>
			<br />
			<div class="row">
				<button type="submit" class="btn btn-primary">Add</button>
				<button type="button" class="btn btn-secondary" onclick="window.location.href='manageOperatorGroup.php'" value="Back">Back</button>
			</div>
			<br />
		</div>
	</form>
</div>

<?php require'base/footer.php';?>