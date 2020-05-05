<?php require'base/header.php';?>
<div class="container">
<!--function-->
<?php
	function writeInfo($sql,$table) {
		require("Modle/conn.php");
		$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		while($rc = mysqli_fetch_assoc($rs)) {
			foreach($rc as $key => $value){
	?>
		    <div class="row">
		        <div class="col-sm-8"><?=$key?>: <?=$value?></div>
		        <div class="col">
			        <button data-toggle="collapse" data-target="#<?=$key?>" class="btn btn-primary">Edit <img src="img\icon\3.jpg" class="icon" /></button>
		        </div>
		    </div>
		    <div id="<?=$key?>" class="collapse">
		        <h5>Edit <?=$key?></h5>
		        <hr />
				<form action="Controllers/editShop.php?SID=<?=$_GET['SID']?>" method="post">
					<input type="hidden" name="COL" value="<?=$key?>">
					<input type="hidden" name="Table" value="<?=$table?>">
					<?=$key?>:	<input class="form-control" type="text" name="<?=$key?>" required><br />
						<button type="submit" class="btn btn-primary">Change</button>
				</form>
		    </div>
<?php
}}}
?>
<?php
function writeInfo_only($sql,$table) {
	require("Modle/conn.php");
	$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	while($rc = mysqli_fetch_assoc($rs)) {
		foreach($rc as $key => $value){
?>
        <div class="row">
            <div class="col-sm-8"><?=$key?>: <?=$value?></div>
        </div>
<?php
}}}
?>
<!--/function-->

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Shop Info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Handle arrangement</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home">
  <br/>
	 <h3>Information</h3>
        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Shop's Info
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        <div class="card-body">
						<h4>Shop</h4>
						<hr />
						<?php
						writeInfo("SELECT Name FROM shop where shopID = '".$_GET['SID']."'","Shop");
						writeInfo_only("SELECT OperatorGroupID FROM shop where shopID = '".$_GET['SID']."'","Shop")
						?>
						<br/>
                            <h4>Contact</h4>
                            <hr />
						<?php
						writeInfo("SELECT Tel, Email, Address FROM shop where shopID = '".$_GET['SID']."'","Shop");
						?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            Restaurant's Info
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
							<?php
						writeInfo("SELECT r.Foodtype FROM shop s, restaurant r where s.ShopID = r.ShopID and s.ShopID = '".$_GET['SID']."'","restaurant");
						?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <br/>
  <div class="tab-pane fade" id="menu1">
  <br/>
  <!--controller-->
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Controller</h4>
	  <?php
		require("Modle/conn.php");
		$sql = "SELECT t.TicketID, a.Username, a.Tel FROM ticket t, customer c, account a WHERE c.CustomerID = t.CustomerID and c.AccountID = a.AccountID and shopID= ".$_GET['SID']." and Statis = 'P'";
		$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		if($rc = mysqli_fetch_assoc($rs)) {
			echo '<p class="card-text">Processing Ticket Info</p>';
			foreach($rc as $key => $value){
				echo '<p class="card-text">'.$key.' : '.$value.'</p>';
			}
	?>
	
	
			<button type='button' class='btn btn-primary' onClick='document.location.href="Controllers/CompletTicket.php?SID=<?=$_GET['SID']?>"'>Complet</button> 
			<button type='button' class='btn btn-primary' onClick='document.location.href="Controllers/SkipTicket.php?SID=<?=$_GET['SID']?>"'>Delet</button>
			<button type='button' class='btn btn-secondary' onClick='document.location.href="Controllers/undoNextTicket.php?SID=<?=$_GET['SID']?>"'>Back</button>
	<?php
		}else{
	?>
      <p class="card-text">Some example text. Some example text.</p>
	    <button type='button' class='btn btn-primary' onClick='document.location.href="Controllers/NextTicket.php?SID=<?=$_GET['SID']?>"'>Next</button><br /><br />
	  <div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="switch1">
    <label class="custom-control-label" for="switch1">off/on</label>
	</div>
	<?php
		}
	?>
	
	 
  
      
    </div>
  </div>
  
  
  <br/>
 				<!--Waiting list-->
				<?php
				require("Modle/conn.php");
					$sql = "SELECT t.TicketID, a.Username,tr.NumOfSeat,t.sequence FROM ticketinforestaurant tr, ticket t , account a, customer c , shop s WHERE tr.TicketID = t.TicketID and a.AccountID=c.AccountID and t.CustomerID = c.CustomerID and s.ShopID= t.ShopID and s.shopID = '".$_GET['SID']."' and t.statis = 'W' order by t.sequence ";
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
							echo "<th/></tr>";
							echo '</thead>';
							$f = false;
						}
						
						echo "<tr ";
						if (isset($_GET['CR'])){
							if ($_GET['CR']==$rc['TicketID']){
								echo "class='table-success'";
							}
						}
						echo ">";
						foreach($rc as $key => $value){				
							echo "<td>".$value."</td>";				
						}
						?>
						<td>
						<button type='button' class='btn btn-primary' onClick='document.location.href="Controllers/upSequence.php?TID=<?=$rc['TicketID']?>&SID=<?=$_GET['SID']?>"'>Up</button> 
						<button type='button' class='btn btn-primary' onClick='document.location.href="Controllers/downSequence.php?TID=<?=$rc['TicketID']?>&SID=<?=$_GET['SID']?>"'>Down</button>
						</td>
						</tr>
						<?php
						
						
					}
					echo "</table>";
?>
<!--Waiting list-->
</div>
  <div class="tab-pane fade" id="menu2"><br/>
  
  </div>
</div>

</div>
<?php require'base/footer.php';?>