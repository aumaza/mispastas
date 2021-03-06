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
	
	$id = $_GET['id'];
        $sql = "select * from pedidos where id = '$id'";
	mysqli_select_db('mis_pastas');
	$resp = mysqli_query($conn,$sql);
	$line = mysqli_fetch_assoc($resp);
      
     
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Pedidos - Cambio de Estado</title>
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
    <h2>Pedido - Cambiar Estado</h2>
    <a href="../main/main.php"><button class="btn btn-default"><img src="../../icons/actions/arrow-left.png" /><strong> Volver</strong></button></a>
  </div>
</div><br>
      
	  <div class="container">
	      <div class="row">
	      <div class="col-sm-12">
	  <div class="panel panel-success" >
	      <div class="panel-heading">
	      <span class="pull-center "><img src="../../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> Veridique los datos del pedido antes de Finalizar.-
	      </div>
	      <br>
	  
	   <form action="form_update_estado.php" method="POST">
	   <input type="hidden" class="form-control" name="id" value="<?php echo $line['id']; ?>" readonly required>
	    
	   <div class="container">
	   <div class="row">
	  <div class="col-sm-5">
	   <div class="input-group">
	      <span class="input-group-addon">Descripción</span>
	      <input id="text" type="text" class="form-control" name="descripcion" value="<?php echo $line['producto']; ?>" readonly required>
	    </div></div>
	    
	    <div class="container">
	   <div class="row">
	   <div class="col-sm-5">
	    <div class="input-group">
	     <span class="input-group-addon">Importe $</span>
	      <input id="text" type="text" class="form-control" name="importe" value="<?php echo $line['precio']; ?>" readonly required>
	    </div></div></div></div><hr>
	    
	   <div class="container">
	   <div class="row">
	   <div class="col-sm-5">
	    <div class="input-group">
	     <span class="input-group-addon">Cantidad</span>
	      <input id="number" type="text" class="form-control" name="cantidad" value="<?php echo $line['cantidad']; ?>" readonly required>
	    </div></div></div></div><hr>
	 	  
	  <div class="container">
	  <div class="row">
	  <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Nombre y Apellido</span>
	      <input id="text" type="text" class="form-control" name="cl_nombre" value="<?php echo $line['cliente']; ?>" readonly required>
	    </div></div>
	    
	    <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Email</span>
	      <input id="email" type="text" class="form-control" name="cl_email" value="<?php echo $line['email']; ?>" readonly required>
	    </div></div></div></div><hr>
	    
	    <div class="container">
	  <div class="row">
	  <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Celular</span>
	      <input id="text" type="text" class="form-control" name="cl_celular" value="<?php echo $line['celular']; ?>" readonly required>
	    </div></div>
	    
	    <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Dirección</span>
	      <input id="text" type="text" class="form-control" name="cl_direccion" value="<?php echo $line['direccion']; ?>" readonly required>
	    </div></div></div></div><hr>
	    
	    <div class="container">
	  <div class="row">
	  <div class="col-sm-5">
	  <div class="input-group">
	     <span class="input-group-addon">Localidad</span>
	      <input id="text" type="text" class="form-control" name="cl_localidad" value="<?php echo $line['localidad']; ?>" readonly required>
	    </div></div></div></div><hr>
	    
	  
	   <div class="container">
	  <div class="row">
	   <div class="col-sm-5">
	    <div class="input-group">
	    <span class="input-group-addon">Estado</span>
	    <select class="browser-default custom-select" name="estado" required>
	    <option value="" disabled selected>Seleccionar</option>
	    <option value="stand-by" <?php if($line['estado'] == 'stand-by') echo 'selected'; ?>>Stand-By</option>
	    <option value="Aprobado" <?php if($line['estado'] == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
	    <option value="Rechazado" <?php if($line['estado'] == 'Rechazado') echo 'selected'; ?> >Rechazado</option>
	    <option value="Entregado" <?php if($line['estado'] == 'Entregado') echo 'selected'; ?> >Entregado</option>
	    </select>
	  </div>
	  </div>
	  </div>
	  </div><hr>
	    
	     
	  
	  <div class="container">
	   <div class="row">
	   <div class="col-sm-12" align="center">
	  <div class="form-group">
	    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Finalizar</button>
	    </div>
	  </div></div></div>
	 </form> 
	  
	  
	  
	  
	  
	  </div>
	  </div>
	  </div>
	



</body>
</html>