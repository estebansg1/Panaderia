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
    $id_venta = $_POST["id_venta"];
    $fecha_venta = $_POST["fecha_venta"];
    $monto_final_venta = $_POST["monto_final_venta"];
    $descuento_venta = $_POST["descuento_venta"];
    $rot_cliente = $_POST["rot_cliente"];

    // Preparar la consulta SQL para insertar datos en la tabla cliente
    $sql = "INSERT INTO venta (id_venta, fecha_venta, monto_final_venta, descuento_venta, rot_cliente,) VALUES ('$id_venta', '$fecha_venta', '$monto_final_venta', '$descuento_venta', '$rot_cliente')";

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
    <title>Formulario de venta</title>
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
        <a href="venta.php">← Regresar</a>
        <h1>Añadir venta</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id_venta">Rut Cliente:</label>
            <input type="text" id="id_venta" name="id_venta" required><br>

            <label for="fecha_venta">Nombre:</label>
            <input type="text" id="fecha_venta" name="fecha_venta" required><br>

            <label for="monto_final_venta">Apellido Paterno:</label>
            <input type="text" id="monto_final_venta" name="monto_final_venta" required><br>

            <label for="descuento_venta">Apellido Materno:</label>
            <input type="text" id="descuento_venta" name="descuento_venta" required><br>

            <label for="rot_cliente">Teléfono 1:</label>
            <input type="text" id="rot_cliente" name="rot_cliente" required><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>


