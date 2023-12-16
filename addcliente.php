<?php
// Establecer la conexión a la base de datos
$servername = "localhost"; // Si tu servidor MySQL está en la misma máquina, puedes usar "localhost"
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
    $rut_cliente = $_POST["rut_cliente"];
    $nombre_c = $_POST["nombre_c"];
    $apellido_paterno_c = $_POST["apellido_paterno_c"];
    $apellido_materno_c = $_POST["apellido_materno_c"];
    $telefono1_c = $_POST["telefono1_c"];
    $telefono2_c = $_POST["telefono2_c"];
    $numero_calle_c = $_POST["numero_calle_c"];
    $calle_c = $_POST["calle_c"];
    $ciudad_c = $_POST["ciudad_c"];
    $colonia_c = $_POST["colonia_c"];

    // Preparar la consulta SQL para insertar datos en la tabla cliente
    $sql = "INSERT INTO cliente (rut_cliente, nombre_c, apellido_paterno_c, apellido_materno_c, telefono1_c, telefono2_c, numero_calle_c, calle_c, ciudad_c, colonia_c) VALUES ('$rut_cliente', '$nombre_c', '$apellido_paterno_c', '$apellido_materno_c', '$telefono1_c', '$telefono2_c', '$numero_calle_c', '$calle_c', '$ciudad_c', '$colonia_c')";

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
    <title>Formulario de Clientes</title>
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
            <a href="producto.html">Productos </a>
            <a href="proveedor.html">Proovedores </a>
            <a href="cliente.php">Clientes </a>
            <a href="ventas.html">Ventas </a>
        </div>
    </header> 
    <div class="container">
        <a href="cliente.php">← Regresar</a>
        <h1>Añadir cliente</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="rut_cliente">Rut Cliente:</label>
            <input type="text" id="rut_cliente" name="rut_cliente" required><br>

            <label for="nombre_c">Nombre:</label>
            <input type="text" id="nombre_c" name="nombre_c" required><br>

            <label for="apellido_paterno_c">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno_c" name="apellido_paterno_c" required><br>

            <label for="apellido_materno_c">Apellido Materno:</label>
            <input type="text" id="apellido_materno_c" name="apellido_materno_c" required><br>

            <label for="telefono1_c">Teléfono 1:</label>
            <input type="text" id="telefono1_c" name="telefono1_c" required><br>

            <label for="telefono2_c">Teléfono 2:</label>
            <input type="text" id="telefono2_c" name="telefono2_c"><br>

            <label>Dirección.</label><br>
            <br>

            <label for="numero_calle_c">Número de Calle:</label>
            <input type="text" id="numero_calle_c" name="numero_calle_c" required><br>

            <label for="calle_c">Calle:</label>
            <input type="text" id="calle_c" name="calle_c" required><br>

            <label for="ciudad_c">Ciudad:</label>
            <input type="text" id="ciudad_c" name="ciudad_c" required><br>

            <label for="colonia_c">Colonia:</label>
            <input type="text" id="colonia_c" name="colonia_c" required>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
