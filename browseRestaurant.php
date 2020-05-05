<?php require'base/header.php';?>
<div class="container">
	<div class="input-group mb-3">

		<div class="input-group-prepend">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#seachRestaurant">
				Filter</button>
			</form>
		</div>
		<input type="text" class="form-control" placeholder="Search" name="Name">
		<button class="btn btn-success" type="submit">Search</button>
		<!-- The Modal -->
		<div class="modal fade" id="seachRestaurant">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
					<h4 class="modal-title">Reataurant Filter</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<label for="Statis">Statis</label>
						<select name="Statis" class="custom-select">
							<option selected value="">Select one</option>
							<option value="O">Opening</option>
							<option value="F">Full</option>
							<option value="C">Close</option>
						</select>
						<label for="FoodType">Food Type</label>
						<select name="FoodType" class="custom-select">
							<option selected value="">Select one</option>
							<?php
							require("Modle/conn.php");
							$sql2 = "SELECT FoodType FROM restaurant GROUP BY FoodType";
							$rs2 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
							while($rc2 = mysqli_fetch_assoc($rs2)) {
								echo "<option value='".$rc2['FoodType']."'>".$rc2['FoodType']."</option>";
							}
							mysqli_close($conn);
							?>
						</select>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
		<!-- The Modal -->
	</div>
	<?php
		require("Modle/conn.php");
		$sql = "Select * from restaurant r,shop s where r.ShopID = s.ShopID";
		if(isset($_POST['Name'])&&$_POST['Name']!=""){
			$sql.=" AND s.Name LIKE '%".$_POST['Name']."%'";
		}
		if(isset($_POST['Statis'])&&$_POST['Statis']!=""){
			$sql.=" AND s.Statis = '".$_POST['Statis']."'";
		}
		if(isset($_POST['FoodType'])&&$_POST['FoodType']!=""){
			$sql.=" AND r.FoodType = '".$_POST['FoodType']."'";
		}
		$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		while($rc = mysqli_fetch_assoc($rs)) {
	?>
			<a href="restaurantInfo.php?SID=<?=$rc['ShopID']?>">
			<div class="restaurantList">
			    <table>
			        <tr>
			            <td>
			                <img src="img\shop\R\<?=$rc['ShopID'];?>.jpg" class="sample"></td>
			                <td class=" font-weight-bold text-body">

			                        <h1> Reataurant Name:<br /> <?=$rc['Name']?><br />
			                        Food type:<br /><?=$rc['FoodType']?></h1>
			                    </td>
			        </tr>
			    </table>

			    <hr />
			</div>
		    </a>
			<?php
		}//}
	mysqli_close($conn);
	?>
</div>
<?php require'base/footer.php';?>