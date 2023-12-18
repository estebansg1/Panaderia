<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $rut_proveedor = $_POST["rut_proveedor"];
    $nombre_p = $_POST["nombre_p"];
    $telefono1_p = $_POST["telefono1_p"];
    $telefono2_p = $_POST["telefono2_p"];
    $numero_calle_p = $_POST["numero_calle_p"];
    $calle_p = $_POST["calle_p"];
    $ciudad_p = $_POST["ciudad_p"];
    $colonia_p = $_POST["colonia_p"];

    // Preparar la consulta SQL para insertar datos en la tabla proveedor
    $sql = "INSERT INTO proveedor (rut_proveedor, nombre_p, telefono1_p, telefono2_p, numero_calle_p, calle_p, ciudad_p, colonia_p) VALUES ('$rut_proveedor', '$nombre_p', '$telefono1_p', '$telefono2_p', '$numero_calle_p', '$calle_p', '$ciudad_p', '$colonia_p')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar en la base de datos: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Proveedores</title>
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
    <header>
        <a style="text-align: left;" href="/">
            <img src="img/logo.webp">
        </a>
        <div class="headerlink">
            <a href="categoria.html">Categorías </a>
            <a href="producto.php">Productos </a>
            <a href="proveedor.php">Proveedores </a>
            <a href="cliente.php">Clientes </a>
            <a href="ventas.html">Ventas </a>
        </div>
    </header> 
    <div class="container">
        <a href="proveedor.php">← Regresar</a>
        <h1>Añadir proveedor</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="rut_proveedor">Rut Proveedor:</label>
            <input type="text" id="rut_proveedor" name="rut_proveedor" required><br>

            <label for="nombre_p">Nombre:</label>
            <input type="text" id="nombre_p" name="nombre_p" required><br>

            <label for="telefono1_p">Teléfono 1:</label>
            <input type="text" id="telefono1_p" name="telefono1_p" required><br>

            <label for="telefono2_p">Teléfono 2:</label>
            <input type="text" id="telefono2_p" name="telefono2_p"><br>

            <label>Dirección.</label><br>
            <br>

            <label for="numero_calle_p">Número de Calle:</label>
            <input type="text" id="numero_calle_p" name="numero_calle_p" required><br>

            <label for="calle_p">Calle:</label>
            <input type="text" id="calle_p" name="calle_p" required><br>

            <label for="ciudad_p">Ciudad:</label>
            <input type="text" id="ciudad_p" name="ciudad_p" required><br>

            <label for="colonia_p">Colonia:</label>
            <input type="text" id="colonia_p" name="colonia_p" required>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
