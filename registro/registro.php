
<?php  include '../connection/connection.php'; ?>
<?php  include "../functions/functions.php"; ?>


<html><head>
	<meta charset="utf-8">
	<title>Registro de Usuarios</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php skeleton();?>
	
</head>
<body>
<br>
  <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                     <h1><strong>Registro de Usuarios</strong></h1>
                     </div>
                    <hr>
                    </div>
                </div>
            </div>
        </div>
        
       <?php
        
       if($conn){
       		mysqli_select_db('mis_pastas');
       		
       		//capturamos datos de usuario primero
       		$nombre2 = mysqli_real_escape_string($conn,$_POST["nombre2"]);
       		$user = mysqli_real_escape_string($conn,$_POST["usuario"]);
       		$pass1 = mysqli_real_escape_string($conn,$_POST["password1"]);
       		$pass2 = mysqli_real_escape_string($conn,$_POST["password2"]);
       		$role = 1;
       		
       		if($pass2 != $pass1){
		  echo "Las contraseñas no Coinciden";
		  exit();
       		}else{
       		
		    agregarUser($nombre2,$user,$pass1,$pass2,$role,$conn);
       		}
       		
       		// capturamos datos del cliente
       		$nombre = mysqli_real_escape_string($conn,$_POST["nombre1"]);
       		$email = mysqli_real_escape_string($conn,$_POST["email"]);
       		$dir = mysqli_real_escape_string($conn,$_POST["direccion"]);
       		$loc = mysqli_real_escape_string($conn,$_POST["localidad"]);
       		$tel = mysqli_real_escape_string($conn,$_POST["telefono"]);
       		$cel = mysqli_real_escape_string($conn,$_POST["celular"]);
       		addCliente($nombre,$email,$dir,$loc,$tel,$cel,$conn);
		}else{
		    mysqli_error($conn);
		    }

  //cerramos la conexion
  
  mysqli_close($conn);


?>
<div class="container">
<div class="row">
<div class="col-md-12">
<meta http-equiv="refresh" content="4;URL=http:../logout.php"/>
</div>
</div>
</div>


</body>
</html>
