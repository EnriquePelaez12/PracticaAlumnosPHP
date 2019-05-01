
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="styles/css/bootstrap.min.css">    
	<link rel="stylesheet" href="styles/css/style.css">
	<link rel="stylesheet" href="styles/css/font-awesome.min.css">
</head>
  <body>
  <!-- Menu -->
    <header>          
       <div class="container-fluid menu" >
         <nav class="navbar navbar-expand-lg container">
            <a class="navbar-brand text-light bg-gray" href="#"><img src="styles/img/logo.png" class="img-fluid" width="60" alt="Multiversos">Raikings Amateur Mexico</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <input class="btn btn-danger" type="button" value="buscar" onclick="location.href='http://localhost/practicas/alumnos/grados.php'"/> 


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">               
              </ul>              
            </div>
          </nav>
      </div>            
    </header>
<!-- Fin Menu -->

<!-- Bienvenida -->
<div class="container-fliud fondo">
	<div class="container">
	  <div class="row align-items-center text-center text-light py-2">
	  	<div class="col-md-12">
	  		<h1 class="display-4">Raikings Amateur Mexico</h1>
		<p class="lead">Sucribete y regalanos un like (también síguenos en nuestras redes sociales)!</p>
    <a href="https://www.youtube.com/channel/UC1kLEcbegB5C83vyqCoc_4A?view_as=subscriber" style="font-size: 20px; color:#c0392b; " target="_blank" title="Youtube/Multiversos646" ><img src="styles/img/Youtube.png" width="60" alt="Youtube"></a>
     <a href="https://www.facebook.com/multiversos646/" style="font-size: 20px; color:#3498db; " target="_blank" title="Facebook/Multiversos646"><img src="styles/img/Facebook.png" width="60" alt=""></a>
      <a href="https://www.instagram.com/multiversos646/?hl=es" style="font-size: 20px; color:#fff; " target="_blank" title="Instagram/Multiversos646"><img src="styles/img/Instagram.png" width="60" alt=""></a>
       <a href="https://twitter.com/Multiversos646" style="font-size: 20px; color:#fff; " target="_blank" title="Twitter/Multiversos646"><img src="styles/img/Twitter.png" width="60" alt=""></a>
        <a href="https://twitter.com/Multiversos646" style="font-size: 20px; color:#fff; " target="_blank" title="Patreon/Multiversos646"><img src="styles/img/Patreon2.png" width="60" alt=""></a>
	  	</div>
	  </div>	
	</div>  
</div><!-- fin Bienvenida -->

<!-- CRUD -->
<div class="container-fluid bg-light ">
<div class="container py-5" >
    <div class="row">
      <div class="col-md-3 ">
          <div class="card ml-auto sombra">
              <div class="card-body">
                <h4 class="card-title text-center">Ingresar usuarios</h4>

                <form action="controller.php" method="post" id="guarda">
                  <input type="text" value="guardar" name="opc" hidden>
                <div class="form-group">
                  <label for="nombre" class="text-left">Nombre del Alumno</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                  
                </div>
                <div class="form-group">
                  <label for="apellido">Apellido</label>
                  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                </div>
                <div class="form-group">
                  <label for="edad">Edad</label>
                  <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad">
                </div>
                <div class="form-group">
                  <label for="record">record</label>
                  <input type="text" class="form-control" id="record" name="record" placeholder="Record">
                </div>
               
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>

              </div>
            </div>
      </div>
      <!-- Area donde se listan los datos -->
      <div class="col-md-9 ">
          <div class="card mr-auto sombra">
              <div class="card-body">
                <h4 class="card-title text-center">Acá se mostrarán los datos</h4>               
                <ul class="list-group">

                <?php

                try {
                      $conexion = new PDO('mysql:host=localhost;dbname=alumnos', "root", "acceso02");
                          
                  } catch (PDOException $e) {
                      print "¡Error!: " . $e->getMessage() . "<br/>";
                      die();
                  }

                  try
                  {
                  $sql = $conexion->prepare("SELECT * FROM alumno");
                  $sql->execute();
                  while ( $fila = $sql->fetch()) {
                    ?>
                  <li class="list-group-item">

                    id = <?php echo $fila['id_alumno']?>, 
                    nombre = <?php echo $fila['nombre_alum']?>, 
                    apellido = <?php echo $fila["apellido_alum"]?>, 
                    edad = <?php echo $fila['edad_alum']?>,
                    Record = <?php echo $fila['record']?>

                      <span class="fa-stack  float-right eliminar" id="<?php echo $fila['id_alumno']?>" style="color:red; cursor: pointer;" title="Eliminar Registro">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                      </span>

                      <span class="fa-stack  float-right modificar" id="<?php echo $fila['id_alumno']?>" style="color:blue; cursor: pointer ;" title="Actualizar Registro">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                      </span>
                  </li>                    
                    
                    <?php
                  }
                }
                catch(Exception $ex)
                {
                    print "¡Error!: " . $ex->getMessage() . "<br/>";
                      die();
                }
                ?>
                </ul>
              </div>
            </div>
      </div>
    </div> 
   
       
</div>
</div>
<!-- Fin CRUD -->

<!-- Modal -->
<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body datos">       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>      
      </div>
    </div>
  </div>
</div>
<!-- fin Modal -->


<footer class="footer">
    <div class="container text-center text-white">
      <span class="text-muted empresa"></span>
    </div>
</footer>
    <script src="styles/js/jquery-3.2.1.min.js"></script>
    <script src="styles/js/popper.min.js"></script>
    <script src="styles/js/bootstrap.min.js"></script>
    <!-- <script src="js/scrollreveal.min.js"></script> -->
    <script src="styles/js/helper.js"></script>
    <script>

       $(".eliminar").click(function(){
        var clave = $(this).attr("id");
        $.ajax({
          url : "controller.php",
          data : "opc=eliminar&clave="+clave,
          type : "post",
          success: function()
          {
            location.reload();
          }
        })
      });
       
       $(".modificar").click(function(){
        var clave = $(this).attr("id");
         $.ajax({
          url : "controller.php",
          data : "opc=modificar-form&clave="+clave,
          type : "post",
          success: function($datos)
          {
            $(".datos").html($datos);
          }
        })
        $('#modificar').modal('show');
      });
    </script>
  </body>
</html>
