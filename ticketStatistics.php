<?php require'base/header.php';?>
<h1>Need test</h1>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<div class="container">
	
	<canvas id="myChart" width="400" height="400"></canvas>

	<?php
		require("Modle/conn.php");
		//echo 'Shop ABC<br>';
		for($i = 0; $i < 7; $i++){
			$date = date("Y-m-d",strtotime("-" . $i . " days"));
			if ($result = mysqli_query($conn, "SELECT * FROM ticket WHERE ShopID = '1' AND Date = '" . $date . "'")) {
				$abc[$i] = mysqli_num_rows($result);
				//echo $date . ": " . $abc[$i] . " ticket<br>";				
				mysqli_free_result($result);
			}
		}
		//echo 'Shop BBC<br>';
		for($i = 0; $i < 7; $i++){
			$date = date("Y-m-d",strtotime("-" . $i . " days"));
			if ($result = mysqli_query($conn, "SELECT * FROM ticket WHERE ShopID = '2' AND Date = '" . $date . "'")) {
				$bbc[$i] = mysqli_num_rows($result);
				//echo $date . ": " . $bbc[$i] . " ticket<br>";				
				mysqli_free_result($result);
			}
		}
		//echo 'Shop CBC<br>';
		for($i = 0; $i < 7; $i++){
			$date = date("Y-m-d",strtotime("-" . $i . " days"));
			if ($result = mysqli_query($conn, "SELECT * FROM ticket WHERE ShopID = '3' AND Date = '" . $date . "'")) {
				$cbc[$i] = mysqli_num_rows($result);
				//echo $date . ": " . $cbc[$i] . " ticket<br>";				
				mysqli_free_result($result);
			}
		}
		mysqli_close($conn);
	?>

	<script>
		var d = new Date();
		var day = new Array(7);
		day[0] = d.toJSON().slice(0,10).replace(/-/g,'/');
		for(i=1; i<7; i++){
			d.setDate(d.getDate() - 1);
			day[i] = d.toJSON().slice(0,10).replace(/-/g,'/');
		}

		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [day[0], day[1], day[2], day[3], day[4], day[5], day[6]],
				datasets: [{
					label: 'ABC',
					data: [<?php echo $abc[0] ?>, <?php echo $abc[1] ?>, <?php echo $abc[2] ?>, <?php echo $abc[3] ?>, <?php echo $abc[4] ?>, <?php echo $abc[5] ?>, <?php echo $abc[6] ?>],
					backgroundColor: 'rgba(255, 99, 132, 1)'
				},{
					label: 'BBC',
					data: [<?php echo $bbc[0] ?>, <?php echo $bbc[1] ?>, <?php echo $bbc[2] ?>, <?php echo $bbc[3] ?>, <?php echo $bbc[4] ?>, <?php echo $bbc[5] ?>, <?php echo $bbc[6] ?>],
					backgroundColor: 'rgba(54, 162, 235, 1)'
				},{
					label: 'CBC',
					data: [<?php echo $cbc[0] ?>, <?php echo $cbc[1] ?>, <?php echo $cbc[2] ?>, <?php echo $cbc[3] ?>, <?php echo $cbc[4] ?>, <?php echo $cbc[5] ?>, <?php echo $cbc[6] ?>],
					backgroundColor: 'rgba(255, 206, 86, 1)'
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>

</div>
<?php require'base/footer.php';?>