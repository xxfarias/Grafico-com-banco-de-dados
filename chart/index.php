<?php
	/* Conexão com o banco de dados */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'db';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$data1 = '';
	$data2 = '';

	// Consulta para obter dados da tabela 
	$sql = "SELECT * FROM `datasets` ";
    $result = mysqli_query($mysqli, $sql);

	// Loop de dados retornados
	while ($row = mysqli_fetch_array($result)) {

		$data1 = $data1 . '"'. $row['data1'].'",';
		
	}

	$data1 = trim($data1,",");
	$data2 = trim($data2,",");
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title> Grafico de visualizações </title>

		<style type="text/css">			
			body{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: white;
			    text-align: center;
			    background: #555652;
			}

			.container {
				color: #ffffff;
				background: #ffffff;
				border: #555652 1px solid;
				padding: 10px;
			}
			h1{
				color:#081B1F;
			}
		</style>

	</head>

	<body>	   
	    <div class="container">	
	    <h1>Visualizações</h1>       
			<canvas id="chart" style="width: 100%; height: 65vh; background: #ffff; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<script>
				var ctx = document.getElementById("chart").getContext('2d');
				var gradient = ctx.createLinearGradient(0,0,20, 600);
									gradient.addColorStop(1, '#ffffff');
									gradient.addColorStop(0, '#5cffca');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [
					'Janeiro',
					'Fevereiro',
					'Março',
					'Abril',
					'Maio',
					'Junho',
					'Julho',
					'Agosto',
					'Setembro',
					'Outubro',
					'Novembro',
					'Dezembro'],
		            datasets: 
		            [{
		                label: 'Visualizações',
		                data: [<?php echo $data1; ?>],
		                backgroundColor:gradient,
		                borderWidth: 3,
						borderColor:gradient,
		            },

		            ]
		        },
		     
		        options: {
					responsive: true,
					radius: 10,
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index',hoverRadius:10,},
		            legend:{display: true, position: 'top', labels: {fontColor: '#ffffff', fontSize: 16}}
		        }
				
				
				
				
		    });
			</script>
	    </div>
	    
	</body>
</html>