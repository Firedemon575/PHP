<?php
$u = $_POST['usuario'];
$n = $_POST['nombre'];
$c = $_POST['clave'];
$codificada = md5($c);

$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "marketing";

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "insert into usuarios values('$u','$n','$codificada')";
$resultado = $conexion->query($sql);

$l = mysqli_affected_rows($conexion);

if ($l == 1)
    header("Location: inicio.html");
else
    echo "<center><h1>No se ha podido insertar el registro</h1></center>";
?>
