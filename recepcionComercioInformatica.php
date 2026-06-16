<?php
//1- Conectar a DB ComercioInformatica
mysqli_report(MYSQLI_REPORT_OFF  | MYSQLI_REPORT_STRICT); //_ERROR gives info about errors//_STRICT does not show the phrase, does not return false but,launches an exception (mysqli_sql_exception)

//I can write all the variables here or I can have another file call variableComercioInformatica and do include here
include("variables2.php");

try {
    $conexion = mysqli_connect($servidor, $user, $pass, $db);
    echo "<p style ='color:green'> Conexión satisfactoria!</p>";
    //here one can do:
    //insert into
    //update...

    //2- Recoger datos del formulario
    $nombre = $_REQUEST['fnombre'];
    $descripcion = $_REQUEST['fdescripcion'];
    $precio = $_REQUEST['fprecio'];
    $cantidad = $_REQUEST['fcantidad'];

    echo $nombre . $descripcion . $precio . $cantidad;

    //3-Insertar datos en tabla alumnos (en terminal seria insert into (nombre, apellidos, ciudad, edad, curso) values('Marco', 'Polo', 'Cartagena', 17, 'WEB');)

    $sql = "INSERT INTO productos (nombre,descripcion,precio,cantidad) values('$nombre','$descripcion','$precio','$cantidad')"; //atencion: si uso aqui '$_REQUEST[fnombre]', no tengo que declarar variable arriba
    echo $sql;

    mysqli_query($conexion, $sql); //ejecuta consulta sql en la conexion $conexion


    mysqli_close($conexion); //remember to close the connection at the end! I close it here 'cause the connection only works inside the catch

} catch (mysqli_sql_exception $error) {
    echo "<p style ='color:red'> Problemas en la conexión! </p>";
    echo $error->getMessage(); //If, I change a variable and input it wrongly, the exception will be launched and this message error showsobjet.method en php sintax is object -> method 'cause . is used for concatenation
    switch ($error->getCode()) {
        case 1045:
            echo "Error en usuari o contrasenya";
            break;
        case 1049:
            echo "La base de dades no existe";
            break;
        case 1146:
            echo "La tabla no existe";
            break;
        case 1062:
            echo "Registro duplicado";
            break;
        default:
            echo "Error: " . $error->getMessage();
    }; //los errores tienen un código pre determinado
}
//echo "hola";
