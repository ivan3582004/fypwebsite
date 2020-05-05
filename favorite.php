<?php require'base/header.php';?>
<div class="container">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link active" data-toggle="tab" href="#reataurant">Reataurant</a>
	  </li>
	</ul>

	<!-- Tab Reataurant -->
	<div class="tab-content">
		<!-- Tab panes -->
		<div class="tab-pane container active" id="reataurant">
		<?php
		require("Modle/conn.php");
		$sql = "SELECT * FROM favoritelist f, Shop s,restaurant r, customer c WHERE f.ShopID = s.ShopID and s.ShopID= r.ShopID and c.CustomerID = f.CustomerID and c.AccountID = '".$_SESSION['AccountID']."'";
		$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));

		while($rc = mysqli_fetch_assoc($rs)) {
		?>
			<a href="restaurantInfo.php?SID=<?=$rc['ShopID']?>">
				<div class="restaurantList">
					<table>
						<tr>
						<td><img src="img\shop\R\<?=$rc['ShopID'];?>.jpg" class="sample"></td>
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
		}
		?>
		</div>
		<!-- Tab Reataurant -->
	</div>
	<br />
</div>
<?php require'base/footer.php';?>