<?php 
//conectamos con la base de datos
error_reporting(E_ALL);

$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "megamarket";
$conexion = mysqli_connect($servidor, $usuario, $contraseña,$base_de_datos);

//Verificar si se han enviado los datos
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$descripcion=$_POST['descripcion'];

 // Preparamos la consulta SQL para insertar un nuevo producto
    $sql = "INSERT INTO productos (nombre, precio, cantidad, descripcion) VALUES ('$nombre', $precio, $cantidad, '$descripcion')";
 // Ejecutamos la consulta SQL
    }
    if(mysqli_query($conexion, $sql)){
        echo "Producto agregado correctamente";
    // Redirigimos al usuario a la página de búsqueda de productos
    } else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }
// Cerramos la conexión con la base de datos
mysqli_close($conexion);
header("Location: market.html");
?>