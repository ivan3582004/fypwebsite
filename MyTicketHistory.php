<?php require'base/header.php';?>
<div class="container">
	<?php
	require("Modle/conn.php");
	$sql = "SELECT t.TicketID,s.Name,tr.NumOfSeat,t.Date FROM ticketinforestaurant tr, ticket t , account a, customer c , shop s WHERE tr.TicketID = t.TicketID and a.AccountID=c.AccountID and t.CustomerID = c.CustomerID and s.ShopID= t.ShopID and a.accountID = '".$_SESSION['AccountID']."' ";
	$sql .= "order by t.Date";
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
			echo "</tr>";
			echo '</thead>';
			$f = false;
		}

		echo "<tr>";
		foreach($rc as $key => $value){
			echo "<td>".$value."</td>";
		}
		echo "</tr>";


	}
	echo "</table>";
	?>
</div>
<?php require'base/footer.php';?>