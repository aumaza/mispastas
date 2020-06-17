<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

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

	$background = 'background="../../img/background.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%"';
	$id = $_GET['id'];
	
	?>

<html><head>
	<meta charset="utf-8">
	<title>Localidades - Registro Actualizado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/actions/list-add.png" />
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
	
	
	
</head>
<body <?php echo $background ?>>

<div class="container-fluid"><br>
      <div class="row">
      <div class="col-md-12 text-center">
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $nombre ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br><hr>


            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        

<?php

      if($conn){
		$id = mysqli_real_escape_string($conn,$_POST["id"]);
		$cod_loc = mysqli_real_escape_string($conn,$_POST["cod_loc"]);
		$cod_loc = strtoupper($cod_loc);
		$localidad = mysqli_real_escape_string($conn,$_POST["localidad"]);
		$localidad = strtoupper($localidad);
		
		
		
		 $sqlInsert = "UPDATE localidades set cod_loc = '$cod_loc', descripcion = '$localidad' where id = '$id'";
		  mysqli_select_db('mis_pastas');
		  $q = mysqli_query($conn,$sqlInsert);
		  
		  if(!$q){
 
			echo '<div class="alert alert-danger" role="alert">';
			echo 'Could not enter data: ' . mysqli_error();
			echo "</div>";
			echo '<hr> <a href="nuevoRegistro.php"><input type="button" value="Volver" class="btn btn-primary"></a>'; 
			}else{
   
			      echo '<div class="alert alert-success" role="alert">';
			      echo "Registro Actualizado Exitosamente!!";
			      echo "</div>";
			      echo '<hr> <a href="../main/main.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
			      } 
		    
		
		    }else{
			  echo '<div class="alert alert-danger" role="alert">';
			  echo 'Could not Connect to Database: ' . mysqli_error($conn);
			  echo "</div>";
			 }

	//cerramos la conexion
	
	mysqli_close($conn);

    
?>
</div>
</div>
</div>




</body>
</html>

