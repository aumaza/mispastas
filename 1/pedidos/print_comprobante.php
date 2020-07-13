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
	$date = strftime("%d de %b de %Y");
	$id = $_GET['id'];
	$ql = "select * from pedidos where estado = 'Aprobado' and cliente = '$nombre' and id = '$id'";
	mysqli_select_db('mis_pastas');
	$retval = mysqli_query($conn,$ql);
	$row = mysqli_fetch_assoc($retval);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Comprobante de Compra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/png" href="../../icons/emblems/emblem-new.png" />
  <?php skeleton();?>
  
  <style>
  div {
  background-color: lightgrey;
  height: 15px;
  width: 750px;
  border: 1px solid green;
  }
  h1{
    color: grey;
    text-align: center;
  }
  
  
  
  
  </style>
  
</head>
<body background="pay.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: repeat; background-position: center center; background-size: cover; height: 100%">

<div>
<h1>Comprobante de Pago</h1>
<p text-align="center" style="color:blue;">Manduca - Tienda de Pastas</p>
</div>
<p><strong>Fecha:</strong> <?php echo $date; ?></p>
<hr><br>
<h2>Datos del Producto</h2><hr>
<p><strong>Producto:</strong> <?php echo $row['producto'];?></p>
<p><strong>Cantidad:</strong> <?php echo $row['cantidad'];?></p>
<p><strong>Importe:</strong> <?php echo $row['precio'];?></p><hr>

<h2>Datos del Cliente</h2><hr>
<p><strong>Cliente:</strong> <?php echo $row['cliente'];?></p>
<p><strong>Email:</strong> <?php echo $row['email'];?></p><br><br><br><br>











</body>
</html>
  
  
  
  
  
  
  
  
  
  
  