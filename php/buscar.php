<link rel="stylesheet" href="style.css">
<?php
  // Conexión a la base de datos MySQL
    error_reporting(E_ALL);
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "megamarket";
    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

  // Procesamiento de la búsqueda
        if (isset($_POST["buscar"])) {
        $busqueda = $_POST["buscar"];
        $consulta = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";
        $resultado = mysqli_query($conexion, $consulta);
    // Mostrar resultados de la búsqueda
    echo"<table>";
    echo"<tr>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Descripción</th>
    </tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["precio"] . "</td>";
        echo "<td>" . $fila["cantidad"] . "</td>";
        echo "<td>" . $fila["descripcion"] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
    }

  // Cierre de la conexión a la base de datos MySQL
    mysqli_close($conexion);
?>