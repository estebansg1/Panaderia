
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
    $id_categoria = $_POST["id_categoria"];
    $nombre_categoria = $_POST["nombre_categoria"];
    $descripcion_categoria = $_POST["descripcion_categoria"];

    // Preparar la consulta SQL para insertar datos en la tabla categoria
    $sql = "INSERT INTO categoria (id_categoria, nombre, descripcion) VALUES ('$id_categoria', '$nombre_categoria', '$descripcion_categoria')";

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
    <title>Formulario de Categorías</title>
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
            height: 50%;
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
        <a href="categoria.php">← Regresar</a>
        <h1>Añadir categoría</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id_categoria">ID de la Categoría:</label>
            <input type="text" id="id_categoria" name="id_categoria" required><br>

            <label for="nombre_categoria">Nombre de la Categoría:</label>
            <input type="text" id="nombre_categoria" name="nombre_categoria" required><br>

            <label for="descripcion_categoria">Descripción:</label>
            <input type="text" id="descripcion_categoria" name="descripcion_categoria" required><br>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
