<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_venta = $_POST["id_venta"];
    $monto_final_venta = $_POST["monto_final_venta"];
    $descuento_venta = $_POST["descuento_venta"];
    $rut_cliente = $_POST["rut_cliente"];

    // Fecha de venta establecida automáticamente
    $fecha_venta = date('Y-m-d');

    $sql = "INSERT INTO venta (id_venta, fecha_venta, monto_final_venta, descuento_venta, rut_cliente) VALUES ('$id_venta', '$fecha_venta', '$monto_final_venta', '$descuento_venta', '$rut_cliente')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar en la base de datos: " . $conn->error;
    }
}

$cliente_query = "SELECT rut_cliente, nombre_c, apellido_paterno_c FROM cliente";
$cliente_result = $conn->query($cliente_query);

$clientes = array();
while ($cliente = $cliente_result->fetch_assoc()) {
    $clientes[] = $cliente;
}

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
            height: 60%;
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
    <header>
        <a style="text-align: left;" href="/">
            <img src="img/logo.webp">
        </a>
        <div class="headerlink">
            <a href="categoria.html">Categorías </a>
            <a href="producto.html">Productos </a>
            <a href="proveedor.html">Proovedores </a>
            <a href="cliente.php">Clientes </a>
            <a href="venta.php">Ventas </a>
        </div>
    </header> 
    <div class="container">
        <a href="venta.php">← Regresar</a>
        <h1>Añadir venta</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id_venta">Rut Cliente:</label>
            <input type="text" id="id_venta" name="id_venta" required><br>

            <label for="fecha_venta">Fecha venta:</label>
            <input type="text" id="fecha_venta" name="fecha_venta" value="<?php echo date('Y-m-d'); ?>" required readonly><br>

            <label for="monto_final_venta">Monto Final:</label>
            <input type="text" id="monto_final_venta" name="monto_final_venta" required><br>

            <label for="descuento_venta">descuento:</label>
            <input type="text" id="descuento_venta" name="descuento_venta" required><br>

            <label for="rut_cliente">Cliente:</label>
            <select id="rut_cliente" name="rut_cliente">
                <?php foreach ($clientes as $cliente) : ?>
                    <option value='<?php echo $cliente['rut_cliente']; ?>'>
                        <?php echo "{$cliente['nombre_c']} {$cliente['apellido_paterno_c']} - {$cliente['rut_cliente']}"; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>


