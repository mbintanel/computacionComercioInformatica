<?php
//1- Conectar a DB ComercioInformatica
mysqli_report(MYSQLI_REPORT_OFF); //_ERROR gives info about errors//_STRICT does not show the phrase, does not return false but,launches an exception. In this case i don't need it since I'm using a "die" not a "try catch"(mysqli_sql_exception), i don't want that back messages appear for the user!

//I can write all the variables here or I can have another file call variableComercioInformatica and do include here
include("variables2.php");

    $conexion = @mysqli_connect($servidor, $user, $pass, $db) or die ("<p style ='color:red'> Problemas de conexión </p>"); //la @ oculta excepciones/warnings xa que no salgan al usuario!
    echo "<p style ='color:green'> Conexión satisfactoria!</p>"; //con el die, te ahorras un try/catch




?>