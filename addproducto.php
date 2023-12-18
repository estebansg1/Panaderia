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
    $id_producto = $_POST["id_producto"];
    $nombre_producto = $_POST["nombre_producto"];
    $precio_producto = $_POST["precio_producto"];
    $stock_producto = $_POST["stock_producto"];
    $id_categoria = $_POST["id_categoria"];
    $rut_proveedor = $_POST["rut_proveedor"];

    $sql = "INSERT INTO producto (id_producto, nombre_producto, precio_producto, stock_producto, id_categoria, rut_proveedor) VALUES ('$id_producto', '$nombre_producto', '$precio_producto', '$stock_producto', '$id_categoria', '$rut_proveedor')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar en la base de datos: " . $conn->error;
    }
}

$categoria_query = "SELECT id_categoria, nombre FROM categoria";
$categoria_result = $conn->query($categoria_query);

$categorias = array();
while ($categoria = $categoria_result->fetch_assoc()) {
    $categorias[] = $categoria;
}

$proveedor_query = "SELECT rut_proveedor, nombre_p FROM proveedor";
$proveedor_result = $conn->query($proveedor_query);

$proveedores = array();
while ($proveedor = $proveedor_result->fetch_assoc()) {
    $proveedores[] = $proveedor;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Productos</title>
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
            height: 70%;
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
            <a href="producto.php">Productos </a>
            <a href="proveedor.php">Proovedores </a>
            <a href="cliente.php">Clientes </a>
            <a href="venta.php">Ventas </a>
        </div>
    </header> 
    <div class="container">
        <a href="producto.php">← Regresar</a>
        <h1>Añadir producto</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id_producto">Id producto:</label>
            <input type="number" id="id_producto" name="id_producto" required><br>

            <label for="nombre_producto">Nombre:</label>
            <input type="text" id="nombre_producto" name="nombre_producto" required><br>

            <label for="precio_producto">Precio:</label>
            <input type="number" id="precio_producto" name="precio_producto" required><br>

            <label for="stock_producto">Stock:</label>
            <input type="number" id="stock_producto" name="stock_producto" required><br>
            
            <label for="id_categoria">Categoria:</label>
            <select id="id_categoria" name="id_categoria" required>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value='<?php echo $categoria['id_categoria']; ?>'>
                        <?php echo "{$categoria['nombre']} - {$categoria['id_categoria']}"; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for="rut_proveedor">Proveedor:</label>
            <select id="rut_proveedor" name="rut_proveedor">
                <?php foreach ($proveedores as $proveedor) : ?>
                    <option value='<?php echo $proveedor['rut_proveedor']; ?>'>
                        <?php echo "{$proveedor['nombre_p']} - {$proveedor['rut_proveedor']}"; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
