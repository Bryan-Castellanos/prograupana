<?php
//Ejemplo de conexión a base de datos MySQL con PHP.

//Guardamos en viariables los parámetros de la base de datos
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "prograupana";

//Creamos la conexión a la base de datos. Usamos la función mysqli_connect()
$conexion = mysqli_connect($servidor, $usuario, $password) or die ("No se ha podido conectar");

//Después de que creamos la conexión seleccionamos la base de datos
$db = mysqli_select_db($conexion, $basededatos) or die ("No se encontro la base de datos");

//Realizamos la consulta y guardamos el contenido en una variable $resultado
$consulta = "SELECT * FROM alumno";
$resultado = mysqli_query($conexion, $consulta) or die ("Algo salio mal en la consulta");

//Mostramos el resultado
//Encabezado de la tabla
echo "<table border='1'>";
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido</th>";
        echo "<th>Carrera</th>";
        echo "<th>Fecha de nacimiento</th>";
    echo "</tr>";

    //Ciclo para mostrar el contenido de la base de datos en la tabla
    while($columna = mysqli_fetch_array($resultado)){
        echo "<tr>";
            echo "<td>" . $columna['id_alumno'] . "</td><td>" . $columna['nombre_alumno']
            . "</td><td>" . $columna['apellido_alumno'] . "</td><td>" . $columna['carrera_alumno']
            . "</td><td>" . $columna['fecha_nac_alumno'] . "</td>";
        echo "</tr>";
    }

echo "</table>";

//Cerramos nuestra conexión a la base de datos
mysqli_close($conexion);
?>