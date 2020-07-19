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
	<title>Productos - Registro Actualizado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../img/mispastas32x32.png" />
	<?php skeleton();?>
	
	
	
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
		$descripcion = mysqli_real_escape_string($conn,$_POST["descripcion"]);
		$descripcion = strtoupper($descripcion);
		$precio = mysqli_real_escape_string($conn,$_POST["precio"]);
				
		
		 $sqlInsert = "UPDATE productos set descripcion = '$descripcion', precio = '$precio' where id = '$id'";
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

