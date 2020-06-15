<?php

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
		echo 'Usuario Creado Satisfactoriamente';
		echo "</div>";
		echo "</div>";	
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
		echo "</div>";
		echo "</div>";
	}
}


function updatePass($user,$pass1,$pass2,$conn){

	

    	$sql = "UPDATE usuarios set password = '$pass1' WHERE user = '$user'";
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




?>

