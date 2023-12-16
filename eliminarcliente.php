<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM cliente WHERE rut_cliente = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente no encontrado.";
        exit();
    }
} else {
    echo "Solicitud no válida.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Cliente</title>
    <!-- Estilos aquí -->
</head>
<body>
    <!-- Encabezado aquí -->

    <div class="container">
        <h1>Eliminar Cliente:</h1>
        <p>¿Seguro que desea eliminar al cliente <?php echo $cliente["nombre_c"] . " " . $cliente["apellido_paterno_c"]; ?>?</p>
        <button><a href="procesareliminacion.php?id=<?php echo $cliente["rut_cliente"]; ?>">Eliminar</a></button>
    </div>
</body>
</html>
