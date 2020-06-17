<?php  include "../../functions/functions.php";
       include "../../connection/connection.php";

	session_start();
	$varsession = $_SESSION['user'];
	
	$sql = "SELECT nombre FROM usuarios where user = '$varsession'";
	mysqli_select_db('mis_pastas');
        $retval = mysqli_query($conn,$sql);
        
        while($fila = mysqli_fetch_array($retval)){
	  $nombre = $fila['nombre'];
	  
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
?>

<html style="height: 100%" lang="es"><head>
	<meta charset="utf-8">
	<title>Mis Pastas - Panel Usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/emblems/emblem-new.png" />
	<link rel="stylesheet" href="/mispastas/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/mispastas/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/css/jquery.dataTables.min.css" >

	<script src="/mispastas/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/mispastas/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/mispastas/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/mispastas/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/mispastas/skeleton/js/dataTables.select.min.js"></script>
	<script src="/mispastas/skeleton/js/dataTables.buttons.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
	
	<!-- Data Table Script -->
<script>

      $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
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
      .avatar {
	vertical-align: middle;
	horizontal-align: right;
	width: 60px;
	height: 60px;
	border-radius: 60%;
      }
      </style>
	
</head>
<body  background="../../img/background.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">
<br>
<!--User and System Information -->
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center">
	<a href="../../logout.php"><button><span class="glyphicon glyphicon-log-out"></span> Salir</button></a>
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $nombre ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %b de %Y"); ?> </button>
	</div>
	</div>
	</div><hr>
<!-- end user and system information -->


<div class="container-fluid">

<div class="row">
<div class="col-xs-12"><br>

<!-- Dashboard -->
<div class="container-fluid">
    <div class="row">
      <nav class="col-xs-2" id="myScrollspy">
      <div class="panel panel-warning" >
      <div class="panel-heading"><span class="pull-center "><img src="../../icons/categories/preferences-desktop.png"  class="img-reponsive img-rounded"> Panel Usuario</div><br>
	
          <form action="main.php" method="POST">
          <div class="btn-group-vertical" >
          <form action="main.php" method="POST">
	    <button type="submit" class="btn btn-default" name="A"><span class="pull-center "><img src="../../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Mis Datos</button>
	    <button type="submit" class="btn btn-default" name="B"><span class="pull-center "><img src="../../icons/apps/knotes.png"  class="img-reponsive img-rounded"> Mis Pedidos</button>
	    <button type="submit" class="btn btn-default" name="C"><span class="pull-center "><img src="../../icons/actions/view-catalog.png"  class="img-reponsive img-rounded"> Catálogo</button>
	  </div> 
	  </form>
       
        </div>
      </nav>
     
     <div class="col-xs-10">
      <div class="row">
	<nav class="col-xs-12" id="myScrollspy">
	 
	    
	
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
	
	
	
	</nav>
      
     </div>
     </div>
    </div>
  </div>
<!-- end dashboard -->

</div>



</div>

</div>


</body>
</html>