<?php include "../connection/connection.php"; 
      
	
	if($conn){
	
		mysqli_select_db('sirhal_web');
	
		$nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$direccion = mysqli_real_escape_string($conn,$_POST["direccion"]);
		$localidad = mysqli_real_escape_string($conn,$_POST["localidad"]);
		$telefono = mysqli_real_escape_string($conn,$_POST["telefono"]);
		$celular = mysqli_real_escape_string($conn,$_POST["celular"]);
		
		$sql = "INSERT INTO clientes " .
		"(nombre,email,direccion,localidad,telefono,celular)".
		"VALUES ".
		"('$nombre','$email','$direccion','$localidad','$telefono','$celular')";
		
		$retval = mysqli_query($conn,$sql);
	}else{
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Error '.mysqli_error($conn);
	      echo "</div>";
	}
	
?>

<html><head>
	<meta charset="utf-8">
	<title>Usuarios - Nuevo Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../icons/status/task-complete.png" />
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
	
</head>
<body background="../img/img-1.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<!-- User and system info -->
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center"><br>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
<!-- end user and system info -->
	<hr>
	
<!-- main body -->
<div class="container"><br>
<div class="row">
<div class="col-sm-10">

<?php
  
  if(!$retval){
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Se produjo un error'.mysqli_error($conn);
	      echo "</div>";
    }else{
	
	  echo '<div class="alert alert-success" role="alert" align="center">';
	  echo '<span class="pull-center "><img src="../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Sus datos se han Guardado, Ahora deberá crear un usuario.';
	  echo "</div>";
    
    }


?>

<div class="panel panel-info" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> Nuevo Usuario</h2>
  </div>
    <div class="panel-body">
    
    
     <form action="form_user.php" method="post">
     
    
         
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido">
  </div>
 
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="user" placeholder="User Name">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="pass1" placeholder="Password" >
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input  type="password" class="form-control" name="pass2" placeholder="Repita Password">
  </div>
   <br>
 
 <div class="form-group">
   <div class="col-sm-offset-2 col-sm-12" align="left">
   <button type="submit" class="btn btn-success" name="A"><span class="glyphicon glyphicon-ok"></span>  Agregar</button>
   <a href="users.php"><input type="button" value="Volver" class="btn btn-primary"></a>
   <a href="../main.php"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>
  </div>
  </div>
</form> 
    </div>
    <br>
    
    
    
    
    

</div>
</div>
</div>
</div>


</body>
</html>