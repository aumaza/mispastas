<?php include "../../connection/connection.php";
      

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
	
	$id = $_GET['id'];
	
	
	
?>

<html style="height: 100%"><head>
	<meta charset="utf-8">
	<title>Subir Imagen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/actions/arrow-up-double.png" />
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
<body background="../../img/background.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

  <!-- User Info -->
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center"><br>
	<a href="../main/main.php"><button><span class="glyphicon glyphicon-chevron-left"></span> Volver</button></a>
        
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $nombre ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%A %d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br><hr>
	<!-- End User Info -->
	
	
<body >
<div class="section"><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-8">
                    
                    <div class="alert alert-success" role="alert">
                     <h1><strong>Seleccione Imágen</strong></h1>
                     </div>

                                       
<div class="section"><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-8">
<form action="form_update_image.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
	  <div class="row">
	    <div class="col-xs-8">
	      <div class="panel panel-default">
		<div class='panel-heading'>
		<strong>Seleccione el Archivo a Subir:</strong>
		<br>
	      <input type="file" name="file" class="btn btn-default"><br>
	      <button type="submit" class="btn btn-warning navbar-btn" name="submit"><span class="glyphicon glyphicon-cloud-upload"></span> Subir</button>
	      
	    </form>
	  
	   </div>
	    
     </div>
   </div>
</div>
</div>
</div>
</div>
</div>





</body>
</html>

