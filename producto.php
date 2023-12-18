<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Procesar la eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "eliminar") {
    if (isset($_POST["id_producto"])) {
        $id_producto = $_POST["id_producto"];
        $sql = "DELETE FROM producto WHERE id_producto='$id_producto'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Producto eliminado con éxito.";
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    } else {
        echo "Falta el identificador del producto.";
    }
}

// Obtener datos de la tabla producto
$sql = "SELECT p.id_producto, p.nombre_producto, p.precio_producto, p.stock_producto, c.id_categoria, c.nombre AS nombre_categoria, p.rut_proveedor, pr.nombre_p AS nombre_proveedor FROM producto p
        LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
        LEFT JOIN proveedor pr ON p.rut_proveedor = pr.rut_proveedor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <style>
        body {
            background-color: #eccf8d;
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
            width: 100%;
            height: 100%;
            padding: 16px;
            margin-top: 10%; 
            background-color: #eccf8d;
        }
        .container h1 {
        text-align: center;
        color: #2c1507;
        }

        .container table {
            width: 100%;
            border-collapse: collapse;
        }

        .container table th, .container table td {
            padding: 10px;
            border: 1px solid #dee2e6;
        }

        .container table th {
            background-color: #e9ecef;
            color: #495057;
        }

        .container table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .buttonadd {
            background-color: rgb(255, 255, 255);
            color: black;
            padding: 8px 10px;
            margin-top: 5%;
            width: 100%;
            border-radius: 20px;
            border-color: gray;
            font-size: medium;
            bottom: 0;
            left: 0;
            margin-bottom: 10px;
            position: fixed;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color:#2c1507;
        }
        h3{
          margin: 8px;
        }
    </style>
</head>
<body>
    <header>
        <a style="text-align: left;" href="index.php">
            <img src="img/logo.webp" >
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
        <h1>Producto:</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Id Producto</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Categoría</th><th>Proveedor</th><th>Acciones</th></tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_producto"] . "</td>";
                echo "<td>" . $row["nombre_producto"] . "</td>";
                echo "<td>" . $row["precio_producto"] . "</td>";
                echo "<td>" . $row["stock_producto"] . "</td>";
                echo "<td>" . $row["id_categoria"] . " - " . $row["nombre_categoria"] . "</td>";
                echo "<td>" . $row["rut_proveedor"] . " - " . $row["nombre_proveedor"] . "</td>";
            
                // Agregar botones de edición y eliminación
                echo "<td>
                        <form action='editarproducto.php' method='GET' style='display:inline;'>
                            <input type='hidden' name='id_producto' value='" . $row["id_producto"] . "'>
                            <button type='submit'>Editar</button>
                        </form>
                        
                        <form action='' method='POST' style='display:inline;'>
                            <input type='hidden' name='action' value='eliminar'>
                            <input type='hidden' name='id_producto' value='" . $row["id_producto"] . "'>
                            <button type='submit'>Eliminar</button>
                        </form>
                    </td>";
                
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No hay registros en la tabla de productos.";
        }
        ?>
        <button class="buttonadd">
            <a href="addproducto.php">Agregar Nuevo Producto</a>
        </button>
    </div>
</body>
</html>