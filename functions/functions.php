<?php

/*
* Funcion para montar skeleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/mispastas/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/mispastas/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/Chart.js/Chart.css" >
	<link rel="stylesheet" href="/mispastas/skeleton/Chart.js/Chart.min.css" >

	<script src="/mispastas/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/mispastas/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/mispastas/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/mispastas/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/mispastas/skeleton/js/dataTables.select.min.js"></script>
	<script src="/mispastas/skeleton/js/dataTables.buttons.min.js"></script>
	
	<script src="/mispastas/skeleton/Chart.js/Chart.js"></script>
	<script src="/mispastas/skeleton/Chart.js/Chart.min.js"></script>
	<script src="/mispastas/skeleton/Chart.js/Chart.bundle.js"></script>
	<script src="/mispastas/skeleton/Chart.js/Chart.bundle.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />';


}

/*
* Funcion para agregar clientes al sistema
*/
function addCliente($nombre,$email,$dir,$loc,$tel,$cel,$conn){
  
  $sql = "insert into clientes ".
	  "(nombre,email,direccion,localidad,telefono,celular)".
	  "VALUES ".
	  "('$nombre','$email','$dir','$loc','$tel','$cel')";
		
		mysqli_select_db('mis_pastas');
		$retval = mysqli_query($conn,$sql);
		
		if(!$retval){
			echo "<br>";
			echo '<div class="container">';
			echo '<div class="alert alert-danger" role="alert">';
			echo '<img src="../icons/status/task-attention.png"  class="img-reponsive img-rounded"> Could not enter data: ' . mysqli_error($conn);
			echo "</div>";
			echo "</div>";
			//echo '<meta http-equiv="refresh" content="4;URL=http:../logout.php"/>';
			}else{
			      echo "<br>";
			      echo '<div class="container">';
			      echo '<div class="alert alert-success" role="alert">';
			      echo '<img src="../icons/actions/games-endturn.png"  class="img-reponsive img-rounded"> Cliente Registro con Exito!!';
			      echo "</div>";
			      echo "</div>";      
			      echo ' <audio  autoplay><source src="../sounds/KDE-K3B-Insert-Medium.ogg" type="audio/ogg" /></audio>';
			      //echo '<meta http-equiv="refresh" content="4;URL=http:../logout.php"/>';
			      } 
		   

}


/*
* Funcion para agregar usuarios al sistema
*/

function agregarUser($nombre,$user,$pass1,$pass2,$role,$conn){

	mysqli_select_db('mis_pastas');	

	$sqlInsert = "INSERT INTO usuarios ".
		"(nombre,user,password,role)".
		"VALUES ".
      "('$nombre','$user','$pass1','$role')";
		


	if(strcmp($pass2, $pass1) == 0){
		mysqli_query($conn,$sqlInsert);	
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo '<img src="../icons/actions/games-endturn.png"  class="img-reponsive img-rounded"> Usuario Creado Satisfactoriamente';
		echo "</div>";
		echo "</div>";	
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo '<img src="../icons/status/task-attention.png"  class="img-reponsive img-rounded"> Las Contraseñas no Coinciden. Intente Nuevamente!';
		echo "</div>";
		echo "</div>";
	}
}

/*
* Funcion para editar la contraseña de los usuarios al sistema
*/

function updatePass($id,$pass1,$pass2,$conn){

	

    	$sql = "UPDATE usuarios set password = '$pass1' WHERE id = '$id'";
    	mysqli_select_db('mis_pastas');
    	
    	
    	if(strcmp($pass2, $pass1) == 0){
    		
		      mysqli_query($conn,$sql);
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Password Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			
	   	}else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			
			

    	}

    
}

/*
* Funcion para cambiar los permisos de los usuarios al sistema
*/

function cambiarPermisos($user,$role,$conn){

  $sql = "UPDATE usuarios set role = '$role' where user = '$user'";
  mysqli_select_db('mis_pastas');
  
  if($user){
    mysqli_query($conn,$sql);
    echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Rol Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
  
	  }else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo "El usuario no existe. Intente Nuevamente!";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
 
}

/*
* Funcion para mostrar los datos de usuario.-
*/

function loadUser($nombre,$conn){


if($conn)
{
	$sql = "SELECT * FROM clientes where nombre = '$nombre'";
    	mysqli_select_db('mis_pastas');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila

	echo '<div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Mis Datos</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>E-mail</th>
                    <th class='text-nowrap text-center'>Dirección</th>
                    <th class='text-nowrap text-center'>Localidad</th>
                    <th class='text-nowrap text-center'>Teléfono</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['telefono']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../usuario/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
			 echo '<a href="../usuario/editPassword.php?nombre='.$fila['nombre'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh"></span> Cambiar Password</a>';
			 echo "</td>";
		}

		echo "</table>";
		echo "<br><br><hr>";
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar los datos de usuarios.-
*/

function loadUsers($conn){


if($conn)
{
	$sql = "SELECT * FROM clientes";
    	mysqli_select_db('mis_pastas');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/meeting-attending.png"  class="img-reponsive img-rounded"> Clientes</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre y Apellido</th>
                    <th class='text-nowrap text-center'>E-mail</th>
                    <th class='text-nowrap text-center'>Dirección</th>
                    <th class='text-nowrap text-center'>Localidad</th>
                    <th class='text-nowrap text-center'>Teléfono</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['nombre']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['telefono']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br><br><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Clientes:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar los pedidos de usuario.-
*/

function loadUserAsk($nombre,$conn){


if($conn)
{
	$sql = "SELECT * FROM pedidos where cliente = '$nombre'";
    	mysqli_select_db('mis_pastas');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/status/wallet-open.png"  class="img-reponsive img-rounded"> Mis Pedidos</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Producto</th>
                    <th class='text-nowrap text-center'>Cantidad</th>
                    <th class='text-nowrap text-center'>Importe</th>
                    <th class='text-nowrap text-center'>Cliente</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Dirección</th>
                    <th class='text-nowrap text-center'>Localidad</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th class='text-nowrap text-center'>Estado</th>
		    <th class='text-nowrap text-center'>Actualización Estado</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['producto']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td align=center>".$fila['precio']."</td>";
			 echo "<td align=center>".$fila['cliente']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['localidad']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td align=center>".$fila['estado']."</td>";
			 echo "<td align=center>".$fila['update_est']."</td>";
			 echo "<td class='text-nowrap'>";
			 if($fila['estado'] == 'stand-by'){
			 echo ' <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-qrcode"></span> QR</button>';
			 }if($fila['estado'] == 'Aprobado'){
			 echo '<a href="../pedidos/comprobante.php?id='.$fila['id'].'" class="btn btn-success btn-sm" target="blank"><span class="glyphicon glyphicon-print"></span> Comprobante</a>';
			 }
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br><br><hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Pedidos:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar los pedidos de usuario.-
*/

function loadAsk($conn){


if($conn){

	//total vendido ultimo message
	$ql = "SELECT sum(precio) as total FROM pedidos WHERE estado = 'Aprobado' and update_est >= DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND update_est <= NOW()";
	mysqli_select_db('mis_pastas');
	$resval = mysqli_query($conn,$ql);
	while($row = mysqli_fetch_array($resval)){
	      $total = $row['total'];
	}
	//total importe en stand-by
	$q = "select sum(precio) as total from pedidos where estado = 'stand-by'";
	mysqli_select_db('mis_pastas');
	$ret = mysqli_query($conn,$q);
	while($row = mysqli_fetch_array($ret)){
	      $tot = $row['total'];
	}
	
	//selecciona todos los pedidos
	$sql = "SELECT * FROM pedidos";
    	mysqli_select_db('mis_pastas');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/status/wallet-open.png"  class="img-reponsive img-rounded"> Pedidos</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Fecha Pedido</th>
                    <th class='text-nowrap text-center'>Producto</th>
                    <th class='text-nowrap text-center'>Cantidad</th>
                    <th class='text-nowrap text-center'>Importe</th>
                    <th class='text-nowrap text-center'>Cliente</th>
                    <th class='text-nowrap text-center'>Dirección</th>
                    <th class='text-nowrap text-center'>Celular</th>
                    <th class='text-nowrap text-center'>Estado</th>
		    <th class='text-nowrap text-center'>Actualización Estado</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['fecha']."</td>";
			 echo "<td align=center>".$fila['producto']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td align=center>".$fila['precio']."</td>";
			 echo "<td align=center>".$fila['cliente']."</td>";
			 echo "<td align=center>".$fila['direccion']."</td>";
			 echo "<td align=center>".$fila['celular']."</td>";
			 echo "<td align=center>".$fila['estado']."</td>";
			 echo "<td align=center>".$fila['update_est']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../pedidos/cambiarEstado.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Actualizar Estado</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../pedidos/listado.php" target="blank"><button type="button" class="btn btn-default"><span class="pull-center "><img src="../../icons/actions/im-aim.png"  class="img-reponsive img-rounded"> Listado Entregas</button></a><br><hr>';
		echo "<hr>";
		echo '<button type="button" class="btn btn-success">Total Vendido último mes:  $' .$total; echo '</button>';
		echo "<hr>";
		echo '<button type="button" class="btn btn-success">Total importe en Stand-By:  $' .$tot; echo '</button>';
		echo "<hr>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Pedidos:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para mostrar localidades.-
*/

function addLocalidad($conn){


if($conn)
{
	$sql = "SELECT * FROM localidades";
    	mysqli_select_db('mis_pastas');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-warning" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/actions/flag-blue.png"  class="img-reponsive img-rounded"> Localidades';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Cod. Localidad</th>
                    <th class='text-nowrap text-center'>Localidad</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['cod_loc']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../localidades/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
			 echo '<a href="#" data-href="../localidades/eliminar.php?id='.$fila['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Borrar</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>"; 
		echo '<a href="../localidades/nuevoRegistro.php"><button type="button" class="btn btn-default"><span class="pull-center "><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Localidad</button></a><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}

/*
* Funcion para mostrar productos.-
*/


function addProductos($conn){


if($conn)
{
	$sql = "SELECT * FROM productos";
    	mysqli_select_db('mis_pastas');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/status/mail-tagged.png"  class="img-reponsive img-rounded"> Productos';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Imagen</th>
		    <th class='text-nowrap text-center'>Descripción</th>
                    <th class='text-nowrap text-center'>Precio</th>
                    
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center><img src='$fila[imagen]' alt='Avatar' class='avatar' ></td>"; 
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['precio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../productos/addImage.php?id='.$fila['id'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-cloud-upload"></span> Cargar Imagen</a>';
			 echo '<a href="../productos/editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
			 echo '<a href="#" data-href="../productos/eliminar.php?id='.$fila['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Borrar</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<a href="../productos/nuevoRegistro.php"><button type="button" class="btn btn-default"><span class="pull-center "><img src="../../icons/actions/list-add.png"  class="img-reponsive img-rounded"> Agregar Producto</button></a><br><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}


/*
* Funcion para lista productos.-
*/

function productos($conn){


if($conn)
{
	$sql = "SELECT * FROM productos";
    	mysqli_select_db('mis_pastas');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../../icons/status/mail-tagged.png"  class="img-reponsive img-rounded"> Productos';
	echo '</div><br>';

            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>ID</th>
		    <th class='text-nowrap text-center'>Imagen</th>
		    <th class='text-nowrap text-center'>Descripción</th>
                    <th class='text-nowrap text-center'>Precio</th>
                    
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center><img src='$fila[imagen]' alt='Avatar' class='avatar' ></td>"; 
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['precio']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="../pedidos/newPedido.php?id='.$fila['id'].'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-shopping-cart"></span> Hacer Pedido</a>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';
		echo '</div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);


}

function editUser($id,$conn){

  $sql = "select * from clientes where id = '$id'";
      mysqli_select_db('agenda_sirhu');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
      

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Editar Mis Datos</h2><hr>
	        <form action="../usuario/formUpdate.php" method="POST">
	        <input type="hidden" id="id" name="id" value="' . $fila['id'].'" />
	        <div class="form-group">
		  <label for="nombre">Nombre y Apellido:</label>
		  <input type="text" class="form-control" id="nombre" name="nombre" value="'.$fila['nombre'].'" onkeyup="this.value=Text(this.value);" onKeyDown="limitText(this,40);" onKeyUp="limitText(this,40);" required>
		</div>
		<div class="form-group">
		  <label for="email">Email:</label>
		  <input type="email" class="form-control" id="email" name="email" value="'.$fila['email'].'" onKeyDown="limitText(this,40);" onKeyUp="limitText(this,40);" required>
		</div>
		<div class="form-group">
		  <label for="pwd">Dirección:</label>
		  <input type="text" class="form-control" id="direccion" name="direccion" value="'.$fila['direccion'].'" onKeyUp="limitText(this,70);" required>
		</div>
		<div class="form-group">
		  <label for="pwd">Localidad:</label>
		  <input type="text" class="form-control" id="localidad" name="localidad" value="'.$fila['localidad'].'" onkeyup="this.value=Text(this.value);" onKeyDown="limitText(this,60);" onKeyUp="limitText(this,60);" required>
		</div>
		<div class="form-group">
		  <label for="pwd">Teléfono:</label>
		  <input type="text" class="form-control" id="telefono" name="telefono" value="'.$fila['telefono'].'" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10);" required>
		</div>
		<div class="form-group">
		  <label for="pwd">Celular:</label>
		  <input type="text" class="form-control" id="celular" name="celular" value="'.$fila['celular'].'" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10);" required>
		</div>
		
		<button type="submit" class="btn btn-success" name="A">Editar</button>
	      </form> <br>
	      <a href="../main/main.php"><input type="button" value="Volver" class="btn btn-primary"></a>
	      
	    </div>
	    </div>
	</div>';

}


function updateUser($id,$nombre,$email,$tel,$cel,$dir,$loc,$conn){

		
	mysqli_select_db('agenda_sirhu');
	$sqlInsert = "update clientes set nombre = '$nombre', email = '$email', telefono = '$tel', celular = '$cel',
	direccion = '$dir', localidad = '$loc' where id = '$id'";
           
	$res = mysqli_query($conn,$sqlInsert);


	if($res){
		//mysqli_query($conn,$sqlInsert);
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Registro Actualizado Exitosamente. Aguarde un Instante que será Redireccionado';
		echo "</div>";
		echo "</div>";	
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Hubo un error al actualizar el registro!. Aguarde un Instante que será Redireccionado" .mysqli_error($conn);
		echo "</div>";
		echo "</div>";
	}
}


function editPassUser($nombre,$conn){

$sql = "select * from usuarios where nombre = '$nombre'";
      mysqli_select_db('mis_pastas');
      $res = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($res);
    

      echo '<div class="container">
	    <div class="row">
	    <div class="col-sm-8">
	      <h2>Cambiar Password</h2><hr>
	      
	      <form action="update_password.php" method="post">
	      <input type="hidden" id="id" name="id" value="' . $fila['id'].'" />
	  
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	    <input id="text" type="text" class="form-control" value="' . $fila['nombre'].'" name="nombre" value="" onkeyup="this.value=Text(this.value);" readonly required>
	  </div>
	
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	    <input id="text" type="text" class="form-control" name="user" onKeyDown="limitText(this,20);" onKeyUp="limitText(this,20);" value="' . $fila['user'].'" readonly required>
	  </div>
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	    <input id="password" type="password" class="form-control" name="pass1" onKeyDown="limitText(this,15);" onKeyUp="limitText(this,15);" placeholder="Password" >
	  </div>
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	    <input  type="password" class="form-control" name="pass2" onKeyDown="limitText(this,15);" onKeyUp="limitText(this,15);" placeholder="Repita Password" >
	  </div>
	  <br>
	
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-12" align="left">
	  <button type="submit" class="btn btn-success" name="A"><span class="glyphicon glyphicon-pencil"></span>  Cambiar Password</button>
	  <a href="../main/main.php"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>
	  </div>
	  </div>
	</form> 
	      
	      </div>
	      </div>
	      </div>';



}


/*
** Funcion para generar archivo de password
*/


function gentxt($usuario,$password){
  
  $fileName = "gen_pass/$usuario.pass.txt"; 
  //$mensaje = $password;
  
  if (file_exists($fileName)){
  
  //echo "Archivo Existente...";
  //echo "Se actualizaran los datos...";
  $file = fopen($fileName, 'w+') or die("Se produjo un error al crear el archivo");
  
  fwrite($file, $password) or die("No se pudo escribir en el archivo");
  
  fclose($file);
  echo '<div class="container">
	<div class="row">
	<div class="col-md-6">';
	echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
  echo "<hr>";
  echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
  echo '</div>
	</div>
	</div>';
  
  
  }else{
  
      //echo "Se Generará archivo de respaldo..."
      $file = fopen($fileName, 'w') or die("Se produjo un error al crear el archivo");
      fwrite($file, $password) or die("No se pudo escribir en el archivo");
      fclose($file);
      
      
      echo '<div class="container">
	    <div class="row">
	    <div class="col-md-6">';
        echo '<div class="alert alert-info" role="alert">';
	echo "Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente.";
	echo "</div>";
        echo "<hr>";
        echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
        echo '</div>
	      </div>
	     </div>';
  
  }
  
  
}


/*
** Funcion para generar password aleatorio
*/

function genPass(){
    //Se define una cadena de caractares.
    //Os recomiendo desordenar las minúsculas, mayúsculas y números para mejorar la probabilidad.
    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@";
    //Obtenemos la longitud de la cadena de caracteres
    $stringLong = strlen($string);
 
    //Definimos la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, puedes poner la longitud que necesites
    //Se debe tener en cuenta que cuanto más larga sea más segura será.
    $longPass=10;
 
    //Creamos la contraseña recorriendo la cadena tantas veces como hayamos indicado
    for($i=1 ; $i<=$longPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos = rand(0,$stringLong-1);
 
        //Vamos formando la contraseña con cada carácter aleatorio.
        $pass .= substr($string,$pos,1);
    }
    return $pass;
}

/*
** Funcion para blanquear password
*/

function resetPass($conn,$usuario){

  $password = genPass();
  
  $sql = "UPDATE usuarios SET password = '$password' where user = '$usuario'";
  
  $retval = mysqli_query($conn,$sql);
 
  
  if($retval){
    echo '<div class="container">
      <div class="row">
      <div class="col-md-12">';
    
    echo '<div class="alert alert-success" role="alert">';
    echo "Su Password fue blanqueada con Exito!";
    echo "<br>";
    gentxt($usuario,$password);
    //echo 'Y es la siguiente: '.$password;
    echo "</div>";
    echo '</div>
	  </div>
	  </div>';
    
  }else{
    
    echo '<div class="container">
      <div class="row">
      <div class="col-md-12">';
    echo '<div class="alert alert-danger" role="alert">';
    echo "Error al Blanquear Password";
    echo "</div>";
     echo '</div>
	  </div>
	  </div>';
    
  }
  
   
 /* // Se envia mail al usuario para notificarlo
  $to = $email;
  $subject = "Blanqueo de Password";
  $message = "Su nueva Password es:  '.$password.' ingrese con su usuario para poder actualizarlo de inmediato"; 
  
  $send = mail($to,$subjet,$message);
  
  if($send){
  echo '<div class="container">
      <div class="row">
      <div class="col-md-12">';
    echo '<div class="alert alert-success" role="alert">';
    echo "Se le ha enviado el nuevo Password a su casilla de Correo Electrónico";
    echo "</div>";
    echo '</div>
	  </div>
	  </div>';
  }else{
    
     echo '<div class="container">
      <div class="row">
      <div class="col-md-12">';
    echo '<div class="alert alert-danger" role="alert">';
    echo "Hubo un error al intentar enviar el Correo";
    echo "</div>";
    echo '</div>
	  </div>
	  </div>';
  }*/
 
  
}


?>

