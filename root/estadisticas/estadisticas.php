<?php include "../../connection/connection.php";
      include "../../functions/functions.php";
   

	session_start();
	$varsession = $_SESSION['user'];
	
	$sq = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('mis_pastas');
	$retval = mysqli_query($conn,$sq);
	while($row = mysqli_fetch_array($retval)){
	      $nombre = $row['nombre'];
	}
	
	$qu = "select * from clientes where nombre = '$nombre'";
	mysqli_select_db('mis_pastas');
	$res = mysqli_query($conn,$qu);
	$linea = mysqli_fetch_assoc($res);
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
	
      //cliente con más pedidos
      $sql = "select cliente, count(cliente) as cantidad from pedidos where estado = 'Aprobado' group by cliente limit 0, 1";
      mysqli_select_db('mis_pastas');
      $retval = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($retval)){
	  $cliente = $row['cliente'];
	  $cantidad = $row['cantidad'];
	}
	
	//producto mas pedido
	$q = "select producto, count(producto) as cantidad from pedidos where estado = 'Aprobado' group by producto limit 0, 1";
	mysqli_select_db('mis_pastas');
	$res = mysqli_query($conn,$q);
	while($row = mysqli_fetch_array($res)){
	    $prod = $row['producto'];
	    $cant = $row['cantidad'];
	}
	
	//total monto vendido último mes
	$ql = "SELECT sum(precio) total FROM pedidos WHERE estado = 'Aprobado' and update_est >= DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND update_est <= NOW()";
	mysqli_select_db('mis_pastas');
	$resval = mysqli_query($conn,$ql);
	while($row = mysqli_fetch_array($resval)){
	    $total = $row['total'];
	}


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Pedidos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../img/mispastas32x32.png" />
	<?php skeleton();?>
  
  
  <!-- block mouse left-button   -->
  <script>
      $(document).bind("contextmenu",function(e) {
    e.preventDefault();
    });
  </script>
<!-- block F12 development mode -->
  <script>
      $(document).keydown(function(e){
	if(e.which === 123){
	  return false;
	}
    });
  </script>
  

  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
     footer {
    background-color: #2d2d30;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }
  .avatar {
  vertical-align: middle;
  horizontal-align: right;
  width: 100px;
  height: 100px;
  border-radius: 80%;
  }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Manduca - Tienda de Pastas</h1>      
    <h2>Estadísticas</h2>
    <a href="../main/main.php"><button class="btn btn-default"><img src="../../icons/actions/arrow-left.png" /><strong> Volver</strong></button></a>
  </div>
</div><br>

	  <div class="container-fluid">
	      <div class="row">
	      <div class="col-sm-12">
	  <div class="panel panel-success" >
	      <div class="panel-heading">
	      <span class="pull-center "><img src="../../icons/actions/view-statistics.png"  class="img-reponsive img-rounded"> Estadísticas
	      </div>
	      <br>
	  
	   <div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">Cliente con más Pedidos</div>
        <div class="panel-body"><canvas id="myChart" width="600" height="600"></canvas>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['<?php echo $cliente;?>'],
        datasets: [{
            label: '<?php echo $cliente;?>',
            data: [<?php echo $cantidad;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
  
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Producto más Pedido</div>
        <div class="panel-body">
        <canvas id="myChart1" width="600" height="600"></canvas>
<script>
var ctx = document.getElementById('myChart1');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['<?php echo $prod;?>'],
        datasets: [{
            label: '<?php echo $prod;?>',
            data: [<?php echo $cant;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading">Monto total vendido último mes</div>
        <div class="panel-body">
        
        <canvas id="myChart2" width="600" height="600"></canvas>
<script>
var ctx = document.getElementById('myChart2');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['$'],
        datasets: [{
            label: 'Total',
            data: [<?php echo $total;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</div><br>

</div><br><br>
	  
	  
	  
	  
	  
	  </div>
	  </div>
	  </div>
	



</body>
</html>