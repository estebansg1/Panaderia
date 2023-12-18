<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$proveedor = array(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "editar") {
    if (isset($_POST["rut_proveedor"])) {
        $rut_proveedor = $_POST["rut_proveedor"];

        $check_sql = "SELECT * FROM proveedor WHERE rut_proveedor='$rut_proveedor'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows == 1) {
            $proveedor = $check_result->fetch_assoc();

            $nombre_p = $_POST["nombre_p"];
            $telefono1_p = $_POST["telefono1_p"];
            $telefono2_p = $_POST["telefono2_p"];
            $numero_calle_p = $_POST["numero_calle_p"];
            $calle_p = $_POST["calle_p"];
            $ciudad_p = $_POST["ciudad_p"];
            $colonia_p = $_POST["colonia_p"];

            $sql = "UPDATE proveedor SET nombre_p='$nombre_p', telefono1_p='$telefono1_p', telefono2_p='$telefono2_p', numero_calle_p='$numero_calle_p', calle_p='$calle_p', ciudad_p='$ciudad_p', colonia_p='$colonia_p' WHERE rut_proveedor='$rut_proveedor'";

            if ($conn->query($sql) === TRUE) {
                echo "Proveedor actualizado con éxito.";
            } else {
                echo "Error al actualizar el proveedor: " . $conn->error;
            }
        } else {
            echo "Proveedor no encontrado.";
        }
    } else {
        echo "Falta el identificador del proveedor.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["rut_proveedor"])) {
    $rut_proveedor = $_GET["rut_proveedor"];
    $sql = "SELECT * FROM proveedor WHERE rut_proveedor='$rut_proveedor'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $proveedor = $result->fetch_assoc();
    } else {
        echo "Proveedor no encontrado.";
        exit();
    }
} 

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proveedor</title>
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
        .container {
            width: 50%;
            height: 80%;
            padding: 16px;
            margin-top: 5%; 
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
        <a href="proveedor.php">← Regresar</a>
        <h1>Editar Proveedor:</h1>
        <form action="" method="POST">
            <input type="hidden" name="action" value="editar">
            <input type="hidden" name="rut_proveedor" value="<?php echo $proveedor['rut_proveedor']; ?>">
            
            <label for="nombre_p">Nombre:</label>
            <input type="text" name="nombre_p" value="<?php echo $proveedor['nombre_p']; ?>">

            <label for="telefono1_p">Teléfono 1:</label>
            <input type="text" name="telefono1_p" value="<?php echo $proveedor['telefono1_p']; ?>">

            <label for="telefono2_p">Teléfono 2:</label>
            <input type="text" name="telefono2_p" value="<?php echo $proveedor['telefono2_p']; ?>">

            <label for="numero_calle_p">Número de Calle:</label>
            <input type="text" name="numero_calle_p" value="<?php echo $proveedor['numero_calle_p']; ?>">

            <label for="calle_p">Calle:</label>
            <input type="text" name="calle_p" value="<?php echo $proveedor['calle_p']; ?>">

            <label for="ciudad_p">Ciudad:</label>
            <input type="text" name="ciudad_p" value="<?php echo $proveedor['ciudad_p']; ?>">

            <label for="colonia_p">Colonia:</label>
            <input type="text" name="colonia_p" value="<?php echo $proveedor['colonia_p']; ?>">
            
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
