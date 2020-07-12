<?php include "functions/functions.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Theme Made By slackzone -->
  <title>Manduca - Tienda de Pastas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="icons/emblems/emblem-new.png" />
  <?php skeleton(); ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
<script >
	function limitText(limitField, limitNum) {
       if (limitField.value.length > limitNum) {
          
           alert("Ha ingresado más caracteres de los requeridos, deben ser: \n" + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
       
       if(limitField.value.lenght < limitNum){
	  alert("Ha ingresado menos caracteres de los requeridos, deben ser:  \n"  + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
}
</script>
  
  <style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #f4511e;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #f4511e;
    font-size: 50px;
  }
  .logo {
    color: #f4511e;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
  }
  .carousel-indicators li {
    border-color: #f4511e;
  }
  .carousel-indicators li.active {
    background-color: #f4511e;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #f4511e; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #f4511e !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #f4511e;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #f4511e;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  input { 
    text-align: center; 
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Manduca / Tienda de Pastas</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">SOBRE NOSOTROS</a></li>
        <li><a href="#services">SERVICIOS</a></li>
        <li><a href="#portfolio">PRODUCTOS</a></li>
        <li><a href="#pricing">CARTA</a></li>
        <li><a href="#contact">REGISTRATE</a></li>
        <li><a href="#password">OLVIDE MI PASSWORD</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>INGRESO</h1> 
  <p>Ingresá tus Datos</p>
  <div class="container">
  <div class="row">
  <div class="col-sm-12">
  <form action="formLogin.php" method="POST">
  <div class="form-group">
    <label for="usuario">Usuario:</label>
    <input type="text" class="form-control" id="usuario" name="user" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pass" required>
  </div>
   <button type="submit" class="btn btn-default">Ingresar</button>
</form> 
</div></div></div></div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>SOBRE NOSOTROS</h2><br>
      <h4>Somos una empresa familiar dedicada a la realización de pastas caseras.</h4>
      <h4>Una tradición familiar que se remonta hasta nuestros abuelos, los cuales nos han trasmitido el conocimiento en la realización de pastas.</h4>
      <br>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-cutlery logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>NUESTROS VALORES</h2><br>
      <h4><strong>MISION:</strong> Nuestra misión es poder entregar un producto de calidad, desde la preparación del mismo hasta su entrega.</h4>
      <h4><strong>VISION:</strong> Nuestra visión, es poder llegar a la mesa de cada familiar con un producto creado y entregado con pasión.</h4>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICIOS</h2>
  <h4>Qué ofrecemos?</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>ENTREGA</h4>
      <p>Entrega de un producto realizado a conciencia..</p>
      </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>AMOR</h4>
      <p>Ponemos en cada detalle el corazón..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>TRABAJO BIEN HECHO</h4>
      <p>Deseamos que nuestro trabajo deleite su mesa..</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      <p>Creemos que una sana alimentación hace la diferencia..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFICADO</h4>
      <p>Certificamos que nuestros productos están basados en la calidad..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">TRABAJO DURO</h4>
      <p>Todo buen producto conlleva un duro trabajo, pasión y entrega..</p>
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>PRODUCTOS</h2><br>
  <h4>Nuestras Creaciones</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="pics/img-01.png" alt="Paris" width="400" height="300">
        <p><strong>Sorrentinos</strong></p>
        </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="pics/img-02.png" alt="New York" width="400" height="300">
        <p><strong>Ravioles</strong></p>
        </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="pics/img-06.png" alt="San Francisco" width="400" height="300">
        <p><strong>Panzotis y Ravioles</strong></p>
        </div>
    </div>
  </div><br>
  
  <h2>Que piensan nuestros clientes?</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>Productos realizados con ingredientes de calidad</h4>
      </div>
      <div class="item">
        <h4>Calidad y Entrega siempre de primer nivel!!</h4>
      </div>
      <div class="item">
        <h4>Ideal para agazajar a la familia</h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Carta</h2>
    <h4>Elija uno y a disfrutar!!!</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel paneL text-center">
        <div class="panel-heading">
          <h1>Sorrentinos</h1>
        </div>
        <div class="panel-body">
          <p><strong>Realizados con:</strong></p>
          <p><strong>Verduras seleccionadas</strong></p>
          <p><strong>Ingredientes de primera Calidad</strong></p>
        </div>
        <div class="panel-footer">
          <h3>$350</h3>
          <h4>Caja (15 Unidades)</h4>
          </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel paneL text-center">
        <div class="panel-heading">
          <h1>Ravioles de Ricota</h1>
        </div>
        <div class="panel-body">
          <p><strong>Realizados con:</strong></p>
          <p><strong>Verduras seleccionadas</strong></p>
          <p><strong>Ingredientes de primera Calidad</strong></p>
        </div>
        <div class="panel-footer">
          <h3>$200</h3>
          <h4>Caja (24 Unidades)</h4>
          </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel text-center">
        <div class="panel-heading">
          <h1>Canelones</h1>
        </div>
        <div class="panel-body">
          <p><strong>Realizados con:</strong></p>
          <p><strong>Verduras seleccionadas</strong></p>
          <p><strong>Ingredientes de primera Calidad</strong></p>
          </div>
        <div class="panel-footer">
          <h3>$80</h3>
          <h4>por unidad</h4>
          </div>
      </div>      
    </div>    
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">REGISTRATE</h2><hr>
  <div class="row">
    <div class="col-sm-5">
      <h3>Ingresá tus datos, estos servirán luego para poder comprar y recibir tus pedidos</h3>
      </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
      <h2 class="text-center">Datos de Cliente</h2><hr>
      <form action="registro/registro.php" method="POST">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name1" name="nombre1" onKeyDown="envy();" placeholder="Nombre y Apellido" type="text" required>
	   <script>
	    function envy(){
		var text = document.getElementById("name1").value;
		document.getElementById("name2").value = text;
	    }
	    </script>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" onKeyDown="envyText();" placeholder="Email" type="email" required>
          <script>
	    function envyText(){
		var text = document.getElementById("email").value;
		document.getElementById("user").value = text;
	    }
	    </script>
        </div>
      </div>
      <div class="row">
      <div class="col-sm-6 form-group">
          <input class="form-control" id="localidad" name="direccion" placeholder="Dirección" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="localidad" name="localidad" placeholder="Localidad" type="text" required>
        </div>
      </div>
      <div class="row">
      <div class="col-sm-6 form-group">
          <input class="form-control" id="telefono" name="telefono" placeholder="Teléfono" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="celular" name="celular" placeholder="Celular" type="text" required>
        </div>
      </div>
      <h2 class="text-center">Datos de Usuario</h2><hr>
        <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name2" name="nombre2" placeholder="Nombre y Apellido" type="text" readonly required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="user" name="usuario" placeholder="Usuario" type="text" readonly required>
        </div>
      </div>
      <div class="row">
      <div class="col-sm-6 form-group">
          <input class="form-control" id="password1" name="password1" onKeyDown="limitText(this,10);" placeholder="Password" type="password" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="password2" name="password2" onkeydown="validate(event);" onKeyDown="limitText(this,10);" placeholder="Repetir Password" type="password" required>
        <script>
        function validate(e){
        
        var KeyID = e.keyCode;
        
            if (KeyID == 9){
        
         var pass2 = document.getElementById("password2").value;
        
        if(pass2 != " "){
        var pass1 = document.getElementById("password1").value;
          
        }else{
	  alert("Debe repetir la contraseña");
        }
        
        if(pass2 == pass1){
	  alert("Genial!!...Puede Continuar!");
         }else{
	    alert("Las contraseñas no coinciden! Reintente");
	    document.getElementById("password2").value = "";
	    document.getElementById("password1").value = "";
         }
         }
       
       }
        </script>
        
        </div>
       </div>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" onclick="validateOnClick();" type="submit">Registrarse</button>
          
          <script>
          function validateOnClick(){
        
              
         var pass2 = document.getElementById("password2").value;
        
        if(pass2 != " "){
        var pass1 = document.getElementById("password1").value;
          
        }else{
	  alert("Debe repetir la contraseña");
        }
        
        if(pass2 == pass1){
	  alert("Genial!!...Puede Continuar!");
         }else{
	    alert("Las contraseñas no coinciden! Reintente");
	    document.getElementById("password2").value = "";
	    document.getElementById("password1").value = "";
         }
         
       
       }
        </script>
          
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Container (Password Section) -->
<div id="password" class="container-fluid bg-grey">
  <h2 class="text-center">BLANQUEAR PASSWORD</h2><hr>
  <div class="row">
    <div class="col-sm-5">
      <h3>Ingresá tu usuario, que es el mail que ingresaste en el momento del registro</h3>
      </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
      <h2 class="text-left">Usuario</h2><hr>
        <div class="row">
        <form action="registro/form_reset_pass.php" method="POST">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="user" name="user" placeholder="Usuario" type="text" required>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-left" type="submit">Blanquear</button>
        </div>
     </div>
     </form>
  </div>
  </div><br>



<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p><strong>Desarrollo:</strong> Slackzone Development - <strong>Email:</strong> develslack@gmail.com</p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
