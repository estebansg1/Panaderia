<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Lógica para la edición
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "editar") {
    if (isset($_POST["rut_cliente"])) {
        $rut_cliente = $_POST["rut_cliente"];

        $id_venta = $_POST["id_venta"];
        $fecha_venta = $_POST["fecha_venta"];
        $monto_final_venta = $_POST["monto_final_venta"];
        $descuento_venta = $_POST["descuento_venta"];
        $rot_cliente = $_POST["rot_cliente"];

        // Actualizar la información del venta en la base de datos
        $sql = "UPDATE venta SET id_venta='$id_venta', fecha_venta='$fecha_venta', monto_final_venta='$monto_final_venta', descuento_venta='$descuento_venta);

        if ($conn->query($sql) === TRUE) {
            echo "venta actualizado con éxito.";
        } else {
            echo "Error al actualizar el venta: " . $conn->error;
        }
    } else {
        echo "Falta el identificador del la venta.";
    }id_venta'= '$id_venta', fecha_venta='$fecha_venta', monto_final_venta='$monto_final_venta', descuento_venta='$descuento_venta', rot_cliente'=$rot_cliente',) WHERE rut_venta='$rut_venta'";
}

// Obtener los datos de la venta para mostrar en el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["rut_venta"])) {
    $rut_venta = $_GET["rut_venta"];
    $sql = "SELECT * FROM venta WHERE rut_venta='$rut_venta'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $venta = $result->fetch_assoc();
    } else {
        echo "venta no encontrado.";
        exit();
    }
} 

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar venta</title>
    <style>
        body {
            background-image: url('img/panaderiafondo1.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 7%;
            padding: 10px;
            background-color: #2c1507;
            box-shadow: 0 0 40px rgb(0, 0, 0);
        }
        .headerlink {
            top: 0;
            right: 0;
            margin-top: 23px;
            position:fixed;
        }
        .headerlink a{
            text-decoration: none;
            color: white;
            font-size: 18px;
            margin: 0 15px;
        }
        header img {
            width: 150px;
            cursor: pointer;
        }
        .container {
            width: 50%;
            height: 100%;
            padding: 16px;
            margin-top: 15%; 
            background-color: #eccf8d;
        }
        .container h1 {
            text-align: center;
            color: #2c1507;
        }
        button {
            background-color: white;
            color: black;
            padding: 8px 10px;
            width: 100%;
            border-radius: 20px;
            border-color: gray;
            text-align: center;
            font-size: medium;
        }
        label {
            font-size: large;
        }
        input {
            border-radius: 8px;
            width: 100%;
            height: 25px;
            border-color: lightgray;
            border-width: 0.02cap;
            background-color: #fff9e7;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color:#2c1507;
        }
        h3{
          margin: 8px;
        }
        select{
            border-radius: 8px;
            width: 50%;
            height: 25px;
            border-color: lightgray;
            border-width: 0.02cap;
            background-color: #fff9e7;
            margin-bottom: 20px;
        }
    </style>
    </head>
<body>
    <div class="container">
    <a href="venta.php">← Regresar</a>
        <h1>Editar venta:</h1>
        <form action="" method="POST">
            <input type="hidden" name="action" value="editar">
            <input type="hidden" name="rut_venta" value="<?php echo $venta['rut_venta']; ?>">
            
            <label for="id_venta">Nombre:</label>
            <input type="text" name="id_venta" value="<?php echo $venta['id_venta']; ?>">

            <label for="fecha_venta">Apellido Paterno:</label>
            <input type="text" name="fecha_venta" value="<?php echo $cliente['fecha_venta']; ?>">

            <label for="monto_final_venta">Apellido Materno:</label>
            <input type="text" name="monto_final_venta" value="<?php echo $cliente['monto_final_venta']; ?>">

            <label for="descuento_venta">Teléfono 1:</label>
            <input type="text" name="descuento_venta" value="<?php echo $cliente['descuento_venta']; ?>">

            <label for="rot_cliente">Teléfono 2:</label>
            <input type="text" name="rot_cliente" value="<?php echo $cliente['rot_cliente']; ?>">
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>

