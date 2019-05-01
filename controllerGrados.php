<?php
try {

    $conexion = new PDO('mysql:host=localhost;dbname=alumnos', "root", "acceso02");
        
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}



switch($_POST['opc'])
{

 case "guardar":    
 try{
          $sql = $conexion->prepare("INSERT INTO grados(fecha_grado,gActual_grado,lugar_grado,id_alumno)
          VALUES('".$_POST['fecha']."','".$_POST['gActual']."','".$_POST['lugar']."','".$_POST['idAlumno']."')");       
          $sql->execute();         
          header("location:index.php");   
    }
    
    catch (PDOException $e) {
    print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
    die();
    } 
    break;

    
case "eliminar":
try{
         $sql = $conexion->prepare("DELETE FROM grados WHERE id_grado =".$_POST['clave']);       
         $sql->execute();         
         //header("location:index.php");   
   }
     catch (PDOException $e) {
   print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
   die();
} 
break;


case "modificar-form":
    try{
             $sql = $conexion->prepare("SELECT * FROM alumno WHERE id_alumno=".$_POST['clave']);       
             $sql->execute();         
             if($fila = $sql->fetch())
             {  
    ?>
          <form action="controller.php" method="post" id="modificar">
                     <input type="text" value="modificar" name="opc" hidden>
                     <input type="text" value="<?php echo $_POST['clave']?>" name="clave" hidden>
                   <div class="form-group">
                     <label for="nombre" class="text-left">Nombre</label>
                     <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['nombre_alum']?>" placeholder="nombre">
                     
                   </div>
                   <div class="form-group">
                     <label for="apellido">Apellido</label>
                     <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $fila['apellido_alum']?>" placeholder="Apellido">
                   </div>
                   <div class="form-group">
                     <label for="edad">Edad</label>
                     <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $fila['edad_alum']?>" placeholder="Edad">
                   </div>
                   <div class="form-group">
                     <label for="record">Record</label>
                     <input type="text" class="form-control" id="record" name="record" value="<?php echo $fila['record']?>" placeholder="Record">
                   </div>
                  
                   <button type="submit" class="btn btn-info">Modificar</button>
                 </form>
    <?php
   }
     }
         catch (PDOException $e) {
       print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
       die();
   }
    break;  
    
   case "modificar":
     try{
             $sql = $conexion->prepare("UPDATE alumno SET nombre_alum='".$_POST['nombre']."',apellido_alum='".$_POST['apellido']."',edad_alum='".$_POST['edad']."',record='".$_POST['record']."' WHERE id_alumno=".$_POST['clave']);       
             $sql->execute();         
             header("location:index.php");   
       }
         catch (PDOException $e) {
       print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
       die();
   }
    break;


}

?>


