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
	$ql = "select * from pedidos where estado = 'Aprobado'";
	mysqli_select_db('mis_pastas');
	$retval = mysqli_query($conn,$ql);
	

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Listado de Entregas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/png" href="../../icons/emblems/emblem-new.png" />
  <?php skeleton();?>
  
  <style>
	    
	     
	    body {
	    background-color: grey;
	    
	    }
	    h1{
		text-align: center;
		color: grey;
		
	    }
	    
	    h2{
	      text-align: center;
	      color: grey;
	      }
	    table, th, td {
		     border: 1px solid black;
		     border-collapse: collapse;
		     padding: 15px;
		     text-align: center;
		     border-spacing: 5px;
		    
	      }
	      div{
		padding-top: 10px;
		padding-right: 100px;
		padding-bottom: 50px;
		padding-left: 50px;
	      }
	      
	      
	    
	    </style>
  
  
  
  
  </style>
</head>
<body>
<h1>Listado de Entregas</h1><hr>
<strong>Fecha:</strong> <?php echo $date;?>
<hr>

<div>
	  <?php 
	      echo "<table style='width:100%'>";
              echo "<tr>
		    <th><strong>Producto</strong></th>
		    <th><strong>Cantidad</strong></th>
		    <th><strong>Importe</strong></th>
		    <th><strong>Cliente</strong></th>
		    <th><strong>Dirección</strong></th>
		    <th><strong>Localidad</strong></th>
		    <th><strong>Celular</strong></th>
		    </tr>";
		    //</table>";
	  

	while($fila = mysqli_fetch_array($retval)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td>".$fila['producto']."</td>";
			 echo "<td>".$fila['cantidad']."</td>";
			 echo "<td>".$fila['precio']."</td>";
			 echo "<td>".$fila['cliente']."</td>";
			 echo "<td>".$fila['direccion']."</td>";
			 echo "<td>".$fila['localidad']."</td>";
			 echo "<td>".$fila['celular']."</td>";
			 echo "</tr>"; 
			 }
			 echo "</table>";
	  ?>
	  <hr>
	  <p>MANDUCA - Tienda de Pastas</p><hr><br>
	
	 
	</div>



</body>
</html>