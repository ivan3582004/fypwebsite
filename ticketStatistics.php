<?php require'base/header.php';?>
Not finish
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<div class="container">
	
	<canvas id="myChart" width="400" height="400"></canvas>
		
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
				data: [12, 19, 3, 5, 2, 3, 4],
				backgroundColor: 'rgba(255, 99, 132, 1)'
			},{
				label: 'BBC',
				data: [12, 19, 3, 5, 2, 3, 9],
				backgroundColor: 'rgba(54, 162, 235, 1)'
			},{
				label: 'CBC',
				data: [12, 19, 3, 5, 2, 3, 9],
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