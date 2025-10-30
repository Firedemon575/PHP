<?php
// Recibir producto desde el formulario
$pro = $_GET['pro'] ?? '';

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "almacen");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta simple
$sql = "SELECT * FROM productos WHERE producto LIKE '$pro%'";
$resultado = mysqli_query($conexion, $sql);

// Mostrar número de resultados
echo "<p>Resultados encontrados: " . mysqli_num_rows($resultado) . "</p>";

// Mostrar tabla sencilla
echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>";
echo "<tr><th>ID</th><th>Producto</th><th>Precio</th></tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>{$fila['codigo']}</td>";
    echo "<td>{$fila['producto']}</td>";
    echo "<td>{$fila['precio']}</td>";
    echo "</tr>";
}

echo "</table>";

// Cerrar conexión
mysqli_close($conexion);
?>
