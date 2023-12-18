<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$cliente = array(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "editar") {
    if (isset($_POST["rut_cliente"])) {
        $rut_cliente = $_POST["rut_cliente"];

        $check_sql = "SELECT * FROM cliente WHERE rut_cliente='$rut_cliente'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows == 1) {
            $cliente = $check_result->fetch_assoc();

            $nombre_c = $_POST["nombre_c"];
            $apellido_paterno_c = $_POST["apellido_paterno_c"];
            $apellido_materno_c = $_POST["apellido_materno_c"];
            $telefono1_c = $_POST["telefono1_c"];
            $telefono2_c = $_POST["telefono2_c"];
            $numero_calle_c = $_POST["numero_calle_c"];
            $calle_c= $_POST["calle_c"];
            $ciudad_c = $_POST["ciudad_c"];
            $colonia_c = $_POST["colonia_c"];

            $sql = "UPDATE cliente SET nombre_c='$nombre_c', apellido_paterno_c='$apellido_paterno_c', apellido_materno_c='$apellido_materno_c', telefono1_c='$telefono1_c', telefono2_c='$telefono2_c', numero_calle_c='$numero_calle_c', calle_c='$calle_c', ciudad_c='$ciudad_c', colonia_c='$colonia_c' WHERE rut_cliente='$rut_cliente'";

            if ($conn->query($sql) === TRUE) {
                echo "Cliente actualizado con éxito.";
            } else {
                echo "Error al actualizar el cliente: " . $conn->error;
            }
        } else {
            echo "Cliente no encontrado.";
        }
    } else {
        echo "Falta el identificador del cliente.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["rut_cliente"])) {
    $rut_cliente = $_GET["rut_cliente"];
    $sql = "SELECT * FROM cliente WHERE rut_cliente='$rut_cliente'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente no encontrado.";
        exit();
    }
} 

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
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
    <a href="cliente.php">← Regresar</a>
        <h1>Editar Cliente:</h1>
        <form action="" method="POST">
            <input type="hidden" name="action" value="editar">
            <input type="hidden" name="rut_cliente" value="<?php echo $cliente['rut_cliente']; ?>">
            
            <label for="nombre_c">Nombre:</label>
            <input type="text" name="nombre_c" value="<?php echo $cliente['nombre_c']; ?>">

            <label for="apellido_paterno_c">Apellido Paterno:</label>
            <input type="text" name="apellido_paterno_c" value="<?php echo $cliente['apellido_paterno_c']; ?>">

            <label for="apellido_materno_c">Apellido Materno:</label>
            <input type="text" name="apellido_materno_c" value="<?php echo $cliente['apellido_materno_c']; ?>">

            <label for="telefono1_c">Teléfono 1:</label>
            <input type="text" name="telefono1_c" value="<?php echo $cliente['telefono1_c']; ?>">

            <label for="telefono2_c">Teléfono 2:</label>
            <input type="text" name="telefono2_c" value="<?php echo $cliente['telefono2_c']; ?>">

            <label for="numero_calle_c">Número de Calle:</label>
            <input type="text" name="numero_calle_c" value="<?php echo $cliente['numero_calle_c']; ?>">

            <label for="calle_c">Calle:</label>
            <input type="text" name="calle_c" value="<?php echo $cliente['calle_c']; ?>">

            <label for="ciudad_c">Ciudad:</label>
            <input type="text" name="ciudad_c" value="<?php echo $cliente['ciudad_c']; ?>">

            <label for="colonia_c">Colonia:</label>
            <input type="text" name="colonia_c" value="<?php echo $cliente['colonia_c']; ?>">
            
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>