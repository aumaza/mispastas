<?php include "../../connection/connection.php";
      include "../../functions/functions.php";
      

        session_start();
	$varsession = $_SESSION['user'];
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
	
	
      
	
?>

<html><head>
	<meta charset="utf-8">
	<title>Usuarios - Editar Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/emblems/emblem-new.png" />
	<?php skeleton();?>

	
	
</head>
<body background="../../img/img-1.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<!-- User and system info -->
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center"><br>
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
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
    $id = $_GET['id'];
   
    if($conn){
	   
	   $id = mysqli_real_escape_string($conn,$_POST['id']);
	   $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
	   $email = mysqli_real_escape_string($conn,$_POST['email']);
	   $tel = mysqli_real_escape_string($conn,$_POST['telefono']);
	   $cel = mysqli_real_escape_string($conn,$_POST['celular']);
	   $dir = mysqli_real_escape_string($conn,$_POST['direccion']);
	   $loc = mysqli_real_escape_string($conn,$_POST['localidad']);
	   $loc = strtoupper($loc);
	   updateUser($id,$nombre,$email,$tel,$cel,$dir,$loc,$conn);
	 }else{
	    mysqli_error($conn);
	  }
	  
    
    ?>
    
</div>
</div>
</div>
<meta http-equiv="refresh" content="4;URL=http:../main/main.php "/>

</body>
</html>