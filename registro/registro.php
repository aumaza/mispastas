<?php include "../connection/connection.php"; 

        

?>

<html><head>
	<meta charset="utf-8">
	<title>Registro</title>
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

	
	<script>

      $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });

  </script>
	
</head>
<body background="../img/img-1.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<!-- User and system info -->
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center"><br>
	
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

		    <div class="alert alert-success" role="alert">
                     <h1><strong><u>Importante</u>: </strong></h1>
                     <p>Preste atención al ingresar sus datos, ya que algunos de estos serán utilizados para poder realizar la entrega de su pedido de manera correcta.</p>
                     <hr>
                     </div>
                    <hr>

<div class="panel panel-info" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> Registro</h2>
  </div>
    <div class="panel-body">
    
    
     <form action="registro_user.php" method="post">
         
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido" required>
  </div>
 
   <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input  type="email" class="form-control" name="email" placeholder="E-Mail" required>
  </div>
  
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
    <input  type="text" class="form-control" name="telefono" placeholder="1144444444" required>
  </div>
  
   <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
    <input  type="text" class="form-control" name="celular" placeholder="1544444444" required>
  </div>
  
   <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
    <input  type="text" class="form-control" name="direccion" placeholder="Ingrese su Dirección" required>
  </div>
  
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
              <select class="browser-default custom-select" name="localidad">
              <option value="" disabled selected>Localidad</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM localidades order by descripcion ASC";
              mysqli_select_db($dbase);
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                    }
                }
                }

                mysqli_close($conn);

                ?>
                </select>
                </div>
  <br>
  
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-12" align="left">
   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span>  Continuar</button>
   </div>
  </div>
</form> 

    
    </div>
    <br>
    
    
    
    
    

</div>
</div>
</div>
</div>


</body>
</html>