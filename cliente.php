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
    if (isset($_POST["rut_cliente"])) {
        $rut_cliente = $_POST["rut_cliente"];
        $sql = "DELETE FROM cliente WHERE rut_cliente='$rut_cliente'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Cliente eliminado con éxito.";
        } else {
            echo "Error al eliminar el cliente: " . $conn->error;
        }
    } else {
        echo "Falta el identificador del cliente.";
    }
}

// Obtener datos de la tabla cliente
$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
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
            <a href="producto.html">Productos </a>
            <a href="proveedor.html">Proovedores </a>
            <a href="cliente.php">Clientes </a>
            <a href="ventas.html">Ventas </a>
        </div>
    </header> 
    <div class="container">
        <h1>Clientes:</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Rut Cliente</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Teléfono 1</th><th>Teléfono 2</th><th>Número de Calle</th><th>Calle</th><th>Ciudad</th><th>Colonia</th><th>Acciones</th></tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["rut_cliente"] . "</td>";
                echo "<td>" . $row["nombre_c"] . "</td>";
                echo "<td>" . $row["apellido_paterno_c"] . "</td>";
                echo "<td>" . $row["apellido_materno_c"] . "</td>";
                echo "<td>" . $row["telefono1_c"] . "</td>";
                echo "<td>" . $row["telefono2_c"] . "</td>";
                echo "<td>" . $row["numero_calle_c"] . "</td>";
                echo "<td>" . $row["calle_c"] . "</td>";
                echo "<td>" . $row["ciudad_c"] . "</td>";
                echo "<td>" . $row["colonia_c"] . "</td>";
                
                // Agregar botones de edición y eliminación
                echo "<td>
                        <form action='editarcliente.php' method='GET' style='display:inline;'>
                            <input type='hidden' name='rut_cliente' value='" . $row["rut_cliente"] . "'>
                            <button type='submit'>Editar</button>
                        </form>
                        
                        <form action='' method='POST' style='display:inline;'>
                            <input type='hidden' name='action' value='eliminar'>
                            <input type='hidden' name='rut_cliente' value='" . $row["rut_cliente"] . "'>
                            <button type='submit'>Eliminar</button>
                        </form>
                    </td>";
                
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No hay registros en la tabla de clientes.";
        }
        ?>
        <button class="buttonadd">
            <a href="addcliente.php"> Agregar Nuevo Cliente</a>
        </button>
    </div>
</body>
</html>