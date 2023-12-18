<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$producto = array(); // Definir $producto como un array vacío al principio

// Lógica para la edición
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "editar") {
    if (isset($_POST["id_producto"])) {
        $id_producto = $_POST["id_producto"];

        // Verificar si el producto existe antes de actualizar
        $check_sql = "SELECT * FROM producto WHERE id_producto='$id_producto'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows == 1) {
            $producto = $check_result->fetch_assoc();

            $nombre_producto = $_POST["nombre_producto"];
            $precio_producto = $_POST["precio_producto"];
            $stock_producto = $_POST["stock_producto"];
            $id_categoria = $_POST["id_categoria"];
            $rut_proveedor = $_POST["rut_proveedor"];

            // Actualizar la información del producto en la base de datos
            $sql = "UPDATE producto SET nombre_producto='$nombre_producto', precio_producto='$precio_producto', stock_producto='$stock_producto', id_categoria='$id_categoria', rut_proveedor='$rut_proveedor' WHERE id_producto='$id_producto'";

            if ($conn->query($sql) === TRUE) {
                echo "Producto actualizado con éxito.";
            } else {
                echo "Error al actualizar el producto: " . $conn->error;
            }
        } else {
            echo "Producto no encontrado.";
        }
    } else {
        echo "Falta el identificador del producto.";
    }
}

// Obtener los datos del producto para mostrar en el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_producto"])) {
    $id_producto = $_GET["id_producto"];
    $sql = "SELECT * FROM producto WHERE id_producto='$id_producto'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $producto = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit();
    }
} 

// Obtener los datos de las categorías y proveedores
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
    <title>Editar Producto</title>
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
    <div class="container">
        <a href="producto.php">← Regresar</a>
        <h1>Editar Producto:</h1>
        <form action="" method="POST">
            <input type="hidden" name="action" value="editar">
            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
            
            <label for="nombre_producto">Nombre:</label>
            <input type="text" name="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>">

            <label for="precio_producto">Precio:</label>
            <input type="text" name="precio_producto" value="<?php echo $producto['precio_producto']; ?>">

            <label for="stock_producto">Stock:</label>
            <input type="text" name="stock_producto" value="<?php echo $producto['stock_producto']; ?>">

            <label for="id_categoria">Categoría:</label>
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

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>

