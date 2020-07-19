<?php include "../../connection/connection.php";
      include "../../functions/functions.php";
      
      session_start();
	$varsession = $_SESSION['user'];
	
	$sql = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('t_shirts');
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $nombre = $row['nombre'];
	}
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
	
	$total = 0;
	$sql = "select * from pedidos where estado = 'stand-by' and cliente = '$nombre'";
	mysqli_select_db('mis_pastas');
	$ret = mysqli_query($conn,$sql);
	while($line = mysqli_fetch_array($ret)){
	      $total++;
	}
	
	$entregado = 0;
	$ql = "select * from pedidos where estado = 'Entregado' and cliente = '$nombre'";
	mysqli_select_db('mis_pastas');
	$val = mysqli_query($conn,$ql);
	while($line = mysqli_fetch_array($val)){
	      $entregado++;
	}
	
	$date = strftime("%Y-%m-%d");
	$nuevo = 0;
	$q = "select * from pedidos where estado = 'stand-by' and cliente = '$nombre' and fecha = '$date'";
	mysqli_select_db('mis_pastas');
	$resval = mysqli_query($conn,$q);
	while($linea = mysqli_fetch_array($resval)){
	      $nuevo++;
	}
	
	
	$count = 0;
	$query = "select * from pedidos where estado = 'Aprobado' and cliente = '$nombre'";
	mysqli_select_db('mis_pastas');
	$res = mysqli_query($conn,$query);
	while($fila = mysqli_fetch_array($res)){
	      $count++;
	}
	$msg1 = "Aún no tiene Pedidos Aprobados"; 
	$msg2 = "Tiene ".$count. " pedido/s Aprobado/s";

      
      
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Panel del Usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/png" href="../../img/mispastas32x32.png" />
  <?php skeleton();?>
  
  <!-- Data Table Script -->
<script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
  </script>
  <!-- END Data Table Script -->
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
 .avatar {
  vertical-align: middle;
  horizontal-align: right;
  width: 60px;
  height: 60px;
  border-radius: 60%;
}
   
  </style>
  <!-- refresca la pagina cada 20 segundos  -->
  <meta http-equiv="refresh" content="20" />  
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <button type="button" class="btn btn-default navbar-btn"><img src="../../icons/actions/chronometer.png"  class="img-reponsive img-rounded"> Pedidos en Espera <span class="badge"><?php echo $total ?></span></button> 
       <button type="button" class="btn btn-default navbar-btn"><img src="../../icons/actions/rating.png"  class="img-reponsive img-rounded"> Pedidos Nuevos <span class="badge"><?php echo $nuevo ?></span></button>
       <button type="button" class="btn btn-default navbar-btn"><img src="../../icons/actions/games-endturn.png"  class="img-reponsive img-rounded"> Pedidos Aprobados <span class="badge"><?php echo $count ?></span></button>
       <button type="button" class="btn btn-default navbar-btn"><img src="../../icons/actions/im-aim.png"  class="img-reponsive img-rounded"> Pedidos Recibidos <span class="badge"><?php echo $entregado ?></span></button>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../../logout.php"><img class="img-reponsive img-rounded" src="../../icons/actions/go-previous-view.png" /> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
	      <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	      <?php 
		if($count == 0){
		      echo '<div class="alert alert-success alert-dismissible">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			      <img class="img-reponsive img-rounded" src="../../icons/emotes/face-uncertain.png" /><strong> '.$msg1.'</strong>
			    </div>';
		  }else{
		      echo '<div class="alert alert-success alert-dismissible">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			      <img class="img-reponsive img-rounded" src="../../icons/emotes/face-smile.png" /><strong> '.$msg2.'</strong>
			      <audio autoplay>
			      <source src="../../sounds/KDE-Im-Sms.ogg" type="audio/ogg" />
			      </audio>
			    </div>';
		      }
      
		?>
		</div>
		</div>
		</div>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <div class="btn-group-vertical">
      <form action="main.php" method="POST">
	<button type="submit" class="btn btn-default btn-sm" name="A"><img class="img-reponsive img-rounded" src="../../icons/actions/user-group-properties.png" /> Mis Datos</button><hr>
	<button type="submit" class="btn btn-default btn-sm" name="B"><img class="img-reponsive img-rounded" src="../../icons/status/wallet-open.png" /> Mis Pedidos</button><hr>
	<button type="submit" class="btn btn-default btn-sm" name="C"><img class="img-reponsive img-rounded" src="../../icons/status/mail-tagged.png" /> Productos</button>
	</form>
      </div> 
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Bienvenido/a <?php echo $nombre ?></h1>
      <p>Seleccione la opción a realizar desde el Panel a su Izquierda</p>
      <hr><br>
   <?php
	
	if($conn){
	
	  if(isset($_POST['A'])){
	  
		  loadUser($nombre,$conn);
	  	  
	  }
	  if(isset($_POST['B'])){
	  
		  loadUserAsk($nombre,$conn);
	  
	  }
	  if(isset($_POST['C'])){
	  
		  productos($conn);
	  
	  }
	  }else{
	  
	      echo '<div class="alert alert-danger" role="alert">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Error de Conección. ' .mysqli_error($conn); 
	      echo '</div>';
	
	}
	
	?>
   
   
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p align="left"><img class="img-reponsive img-rounded" src="../../icons/actions/meeting-attending.png" /> <strong>Usuario:</strong> <?php echo $nombre ?></p>
      </div>
      <div class="well">
        <p align="left"><img class="img-reponsive img-rounded" src="../../icons/actions/view-calendar-day.png" /> <?php echo "<strong>Fecha Actual:</strong> ". strftime("%d de %b de %Y"); ?></p>
      </div>
      <div class="well">
        <p align="left"><img class="img-reponsive img-rounded" src="../../icons/apps/clock.png" /> <?php echo "<strong>Hora Actual:</strong> " . date("H:i"); ?></p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p><img src='../../img/mispastas.png' alt='Avatar' class='avatar' >  Manduca - Tienda de Pastas</p>
</footer>


		
		<!-- Modal QR-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Scanea el código QR sólo si aún no lo realizaste para este pedido, si ya realizaste esta operación anteriormente, sólo deberás esperar a que el pedido figure como "Aprobado"</h4>
      </div>
      <div class="modal-body" >
      <div class="container">    
	<div class="row" >
         <div class="col-sm-4">
	  <div class="panel panel-default">
	  <div class="panel-heading" align="center">QR</div>
	  <div class="panel-body"><img src="../../img/qr_mp.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Gracias!</div>
      </div>
    </div>
    </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>

  </div>
</div>
<!-- En MOdal -->

</body>
</html>
