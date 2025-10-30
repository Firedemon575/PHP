<?php
$u = $_POST['usuario'];
$c = $_POST['clave'];
$codificada = md5($c);

$host = "localhost";     
$usuario = "root";       
$contrasena = "";        
$base_datos = "marketing";

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Comprobar usuario (tabla correcta + espacio antes de WHERE)
$sql = "select * from usuarios where usuario='$u'"; 
$resultado = $conexion->query($sql);
$l = $resultado->num_rows;  

if ($l == 1) {  
    $fila = $resultado->fetch_array(); 
    // El orden de columnas es: usuario, nombre, clave
    if ($fila[2] == $codificada)  
        header("Location: listado.php"); 
    else
        echo "<center><h1>Bienvenido</h1></center>";
} 
else {
    echo "<center><h1>No existe usuario o la clave es incorrecta</h1></center>"; 
}
?>
