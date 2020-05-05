<?php require'base/header.php';?>
<div class="container">
<?php
	require("Modle/conn.php");
	$sql = "SELECT * FROM shop s,restaurant r WHERE s.ShopID = r.ShopID  and s.ShopID = '".$_GET['SID']."'";					
	$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
	
	while($rc = mysqli_fetch_assoc($rs)) {
?>


        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home"><?=$rc['Name']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Get Ticket</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu3">Address</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Comment</a>
                </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="tab-pane active"><br>
                <div id="rname">
                    
                </div>
                
                <div id="id01" class="modal">

                    <form class="modal-content animate">

                        <div>
                            <label for="uname"><b>Restaurant name</b></label>
                            <input type="text" placeholder="Enter estaurant name" id="uname">

                            <label for="psw"><b>Food type</b></label>
                            <input type="text" placeholder="Enter Food type" id="ft">
                            <label for="uname"><b>Telephone</b></label>
                            <input type="number" placeholder="Enter Telephone" id="tele">
                            <label for="uname"><b>Email</b></label>
                            <input type="text" placeholder="Enter Address" id="emaill">
                            <label for="uname"><b>Address</b></label>
                            <input type="text" placeholder="Enter Address" id="address">
                            <button type="submit" onclick="modify();">Modify</button>
                        </div>

                        <div style="background-color:#f1f1f1">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'"
                                class="cancelbtn">Cancel</button>
                        </div>
                    </form>
                </div>


                <table>
                    <tr>
                        
                        <td>
							<?php
							
								require("Modle/conn.php");
								$aid = 0;
								if(isset($_SESSION['AccountID'])){$aid = $_SESSION['AccountID'];}
								$sql3 = "SELECT * FROM shop s,restaurant r, favoritelist f,customer c WHERE s.ShopID = r.ShopID and s.ShopID = f.ShopID and c.CustomerID = f.CustomerID and r.ShopID = '".$_GET['SID']."' and c.AccountID = '".$aid."'";					
								$rs3 = mysqli_query($conn, $sql3) or die (mysqli_error($conn));
								if(mysqli_num_rows($rs3) <= 0){
									
							?>
							
                            <a href="Controllers/addFavorite.php?SID=<?=$rc['ShopID']?>" data-toggle="tooltip" title="Click to add favorite!"><img src="img\icon\10.jpg" class="icon " /></a>
							<?php
								}else{
							?>
                            <a href="Controllers/removeFavorite.php?SID=<?=$rc['ShopID']?>" data-toggle="tooltip" title="Click to remove from favorite!"><img src="img\icon\11.jpg" class="icon " /></a>
							<?php
								}
								
							?>
                        </td>
						<script>
						$(document).ready(function(){
						  $('[data-toggle="tooltip"]').tooltip();
						});
						</script>
                    </tr>
                </table>



                <hr />
                <center><img src="img\shop\R\<?=$rc['RestaurantID']?>.jpg" class="banr"></center>
                <table>
                    <th colspan="3">Description</th>
                    <tr class="text-justify">
                        <td width=10%></td>
                        <td width=80%>
                            A restaurant (French: [ʁɛstoʁɑ̃] (About this soundlisten)), or an eatery,
                            is a business that prepares and serves food and drinks to customers in exchange for money.
                            Meals are generally served and eaten on the premises,
                            but many restaurants also offer take-out and food delivery services.
                            Restaurants vary greatly in appearance and offerings, including a wide variety of
                            cuisines and service models ranging from inexpensive fast food restaurants and cafeterias,
                            to mid-priced family restaurants, to high-priced luxury establishments.
                        </td>
                        <td width=10%></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Food type : </td>
                        <td><?=$rc['FoodType']?></td>
                    </tr>
                    <tr>
                        <td>Tel</td>
                        <td>
                            <div id="tell"><?=$rc['Tel']?></div>
                        </td>
                    </tr>


                    <tr>
                        <td>Email</td>
                        <td>
                            <div id="email"><?=$rc['Email']?></div>
                        </td>
                    </tr>


                    <tr>
                        <td>Address</td>
                        <td>
                            <div id="addrs"><?=$rc['Address']?></div>
                        </td>
                    </tr>
                </table>
            </div>
			
            <div id="menu1" class="tab-pane fade"><br>
				
				
                <?php
					require("Modle/conn.php");
					$sql = "SELECT a.Username,tr.NumOfSeat,t.sequence FROM ticketinforestaurant tr, ticket t , account a, customer c , shop s WHERE tr.TicketID = t.TicketID and a.AccountID=c.AccountID and t.CustomerID = c.CustomerID and s.ShopID= t.ShopID and s.shopID = '".$_GET['SID']."' and t.statis = 'W' order by t.sequence ";
					$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
					
				?>	
				<!--Get ticket-->
				<div class="card">
				  <div class="card-body">
					<h4 class="card-title">Get ticket</h4>
					<?php
					if(isset($_SESSION['AccountID'])){
					require("Modle/conn.php");
					$sql2 = "SELECT * FROM ticket t, customer c, account a where t.CustomerID = c.CustomerID and a.AccountID = c.AccountID and t.shopID = '".$_GET['SID']."' and a.AccountID = '".$_SESSION['AccountID']."' and t.statis = 'W'";
					$rs2 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
					if ($rc2 = mysqli_fetch_assoc($rs2)) {
					?>
					<p class="card-text">Your sequence is <b><?=$rc2['sequence']?></b></p>
					
					<?php
					}else{
					?>
					<p class="card-text"><b><?=mysqli_num_rows($rs)?></b> people are waiting.</p>
					<form action = 'Controllers/getTicket.php' method ="post">
					<input type="hidden" name = "SID" value = "<?=$_GET['SID']?>">
					<input type="Number" class="form-control" placeholder="Number of Seat" name= "nos" required>
					<br/>
					<button type="submit" class="btn btn-primary">Get Ticket</button>
					</form>
					<?php
					}}else{
						?>
						<p class="card-text"><b><?=mysqli_num_rows($rs)?></b> people are waiting.</p>
						<p class="card-text">Login to get ticket</p>
						
						<?php
					}
					?>
				  </div>
				</div>
				<br/>
				
				
				<!--Waiting list-->
				<?php
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
            <div id="menu2" class="tab-pane fade"><br>
                <div class="mt-3">
                    <br />
					
                    
                       <!--Comment-->
					   <?php
					   require("Modle/conn.php");
					$sql = "SELECT * FROM comment c, Account a WHERE a.AccountID = c.AccountID and ShopID = ".$_GET['SID'];
					$rs = mysqli_query($conn, $sql) or die (mysqli_error($conn));
					while($rc = mysqli_fetch_assoc($rs)) {
					   ?>
					   <div class="media border p-3">
                        <div class="media-body">
							
                            <h4><?=$rc['Username']?> <small><i><?=$rc['Date']?><?=$rc['Time']?></i></small></h4>
                            <p><?=$rc['Comment']?></p>
                           
                        </div>
						</div>
						<?php
					}
					?>
						 <!--Comment-->
                    
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
					<!--Leave Comment-->
					<form method = "post" action = "Controllers/leaveComment.php?SID=<?=$_GET['SID']?>">
                    <textarea class="form-control" rows="5" id="comment" name="Comment"></textarea><br />
					<input type="submit" value="Send" class="btn btn-primary"/>
					</form>
					<!--Leave Comment-->
                  </div>
            </div>

            <div id="menu3" class="tab-pane fade">
                    <style>
                            /* Set the size of the div element that contains the map */
                           #map {
                             height: 400px;  /* The height is 400 pixels */
                             width: 100%;  /* The width is the width of the web page */
                            }
                         </style>
               
                <!--The div element for the map -->
	            <br />
                <div id="map"></div>
                <script>
            // Initialize and add the map
            function initMap() {
              // The location of Uluru
              var uluru = {lat: 25.344, lng: 131.036};
              // The map, centered at Uluru
              var map = new google.maps.Map(
                  document.getElementById('map'), {zoom: 4, center: uluru});
              // The marker, positioned at Uluru
              var marker = new google.maps.Marker({position: uluru, map: map});
            }
                </script>
                <!--Load the API from the specified URL
                * The async attribute allows the browser to render the page while the API loads
                * The key parameter will contain your own API key (which is not needed for this tutorial)
                * The callback parameter executes the initMap() function
                -->
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD62F_LWfzCe4kGDyKyTwGYn2yy5rUTd-M&callback=initMap">
                </script>
            </div>
        </div>
        <br/>
<?php
	}mysqli_close($conn);
?>
</div>
<?php require'base/footer.php';?>