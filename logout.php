<?php 
    session_start(); //Libera las variables de entorno
    session_destroy(); //Destruye la sesión
  
    header('location: index.html'); //Redirecciona al inicio
?>