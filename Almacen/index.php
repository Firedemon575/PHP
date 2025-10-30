<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        #ban {
            background-color: #007acc;
            color: white;
            font-size: 40px;
            padding: 30px 0;
        }
        select, input[type="submit"] {
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #007acc;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005f99;
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #007acc;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #e0f7fa;
        }
    </style>
</head>
<body>

<div id="ban">PRODUCTOS COVIRAN</div>

<form method="get" action="">
    <select name="pro">
        <option value="">-- Selecciona un producto --</option>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "almacen");
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $resultado_select = mysqli_query($conexion, "SELECT producto FROM productos ORDER BY producto");
        $pro = $_GET['pro'];

        while ($fila = mysqli_fetch_assoc($resultado_select)) {
            $selected = ($fila['producto'] == $pro) ? "selected" : "";
            echo "<option value='{$fila['producto']}' $selected>{$fila['producto']}</option>";
        }
        ?>
    </select>
    <input type="submit" value="Mostrar">
</form>

<?php
if ($pro) {
    $sql = "SELECT * FROM productos WHERE producto = '$pro'";
} else {
    $sql = "SELECT * FROM productos";
}
$resultado = mysqli_query($conexion, $sql);
$total = mysqli_num_rows($resultado);

echo "<p>Resultados encontrados: $total</p>";
echo "<table>";
echo "<tr><th>Codigo</th><th>Producto</th><th>Precio</th></tr>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>{$fila['codigo']}</td>";
    echo "<td>{$fila['producto']}</td>";
    echo "<td>{$fila['precio']}</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conexion);
?>
</body>
</html>
