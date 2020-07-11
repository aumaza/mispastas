<?php  include "../../functions/functions.php"; ?>
<?php  include "../../connection/connection.php"; 

	session_start();
	$varsession = $_SESSION['user'];
	
	$sql = "select nombre from usuarios where user = '$varsession'";
	mysqli_select_db('mis_pastas');
	$res = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($res)){
	      $nombre = $row['nombre'];
	}
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}

	
	

?>


<html><head>
	<meta charset="utf-8">
	<title>Usuarios - Actualizar Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/emblems/emblem-new.png" />
	<?php skeleton();?>
	
</head>
<body background="../../img/img-1.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center">
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $nombre; ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br>

  <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div>
        
       <?php
        
       if($conn){
       
	mysqli_select_db('mis_pastas');
	  	
	     if (isset($_POST['A'])){
			    
			    $id = mysqli_real_escape_string($conn,$_POST["id"]);
                            $user = mysqli_real_escape_string($conn,$_POST["user"]);
                            $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
                            $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
                                                        
                             updatePass($id,$pass1,$pass2,$conn);
                        

                             }
                             }else {
                                    mysqli_error($conn);
                                   }

  //cerramos la conexion
  
  mysqli_close($conn);


?>
<div class="container">
<div class="row">
<div class="col-md-12">
<meta http-equiv="refresh" content="3;URL=http:../main/main.php "/>
</div>
</div>
</div>


</body>
</html>
