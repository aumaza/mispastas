<?php include "../connection/connection.php"; 
      include "../functions/functions.php";
?>
      

<html><head>
	<meta charset="utf-8">
	<title>Registro Finalizado</title>
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
	
	
	
</head>
<body background="../img/img-1.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<div class="container-fluid"><br>
      <div class="row">
      <div class="col-md-12 text-center">
	
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

	if(!$conn)
	{
	
	  echo '<div class="alert alert-danger" role="alert">';
	  echo 'Could not enter data: ' . mysqli_error($conn);
	  echo "</div>";
	  echo '<hr> <a href="../logout.php"><input type="button" value="Reintente" class="btn btn-danger"></a>';
	
	}else{
	  
		$nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
		$user = mysqli_real_escape_string($conn,$_POST["user"]);
		$pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
		$pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
		$role = 1; 
		agregarUser($nombre,$user,$pass1,$pass2,$role,$conn);
	
	    echo '<div class="alert alert-success" role="alert">';
	    echo "Registro Exitoso!!<br>";
	    echo "Por Favor ingrese con su usuario y contraseña";
	    echo "</div>";
	    echo '<hr> <a href="../logout.php"><input type="button" value="Ingresar" class="btn btn-success"></a>';
	}



	//cerramos la conexion
	
	mysqli_close($conn);

    
?>
</div>
</div>
</div>




</body>
</html>

