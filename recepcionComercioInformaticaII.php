<?php
include("conecComercioInformatica.php");
    

    //2- Recoger datos del formulario
    $nombre = $_REQUEST['fnombre'];
    $descripcion = $_REQUEST['fdescripcion'];
    $precio = $_REQUEST['fprecio'];
    $cantidad = $_REQUEST['fcantidad'];

    echo $nombre.$descripcion.$precio.$cantidad;

    //3-Crear consulta sql: Insertar datos en tabla alumnos (en terminal seria insert into (nombre, apellidos, ciudad, edad, curso) values('Marco', 'Polo', 'Cartagena', 17, 'WEB');)

     $sql = "INSERT INTO productos (nombre,descripcion,precio,cantidad) values('$nombre','$descripcion','$precio','$cantidad')"; //atencion: si uso aqui '$_REQUEST[fnombre]', no tengo que declarar variable arriba
    //echo $sql;//chivatillo

    // PHP en runtime → puede funcionar perfectamente
// Editor → no “ve” que include("conne.php") define $conexion
// Estructuraremos diferente
// Executar consulta

    $result= mysqli_query($conexion, $sql); //ejecuta consulta sql en la conexion $conexion
    // Comprobar resultat
    if($result){
        echo "<p style ='color:red'> Producto registrado correctamente</p>";
    }else{
        echo"<p style ='color:red'> Error: no se ha podido registrar correctamente</p>" ; //. mysqli_error($conexion); OJO! si no queremos que mensajes de error técnicos le aparezcan al usuario, hay que retirar esto de .mysqli_error. El error se genera a nivel back cuando por ejemplo aqui introducimos mal el nombre de un campo p.e. descri en vez descripción
    }
   

    mysqli_close($conexion); //remember to close the connection at the end! I close it here 'cause the connection only works inside the catch



