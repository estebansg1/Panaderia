<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "negocio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$categoria = array(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "editar") {
    if (isset($_POST["id_categoria"])) {
        $id_categoria = $_POST["id_categoria"];

        $check_sql = "SELECT * FROM categoria WHERE id_categoria='$id_categoria'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows == 1) {
            $categoria = $check_result->fetch_assoc();

            $nombre_categoria = $_POST["nombre_categoria"];
            $descripcion_categoria = $_POST["descripcion_categoria"];

            $sql = "UPDATE categoria SET nombre='$nombre_categoria', descripcion='$descripcion_categoria' WHERE id_categoria='$id_categoria'";

            if ($conn->query($sql) === TRUE) {
                echo "Categoría actualizada con éxito.";
            } else {
                echo "Error al actualizar la categoría: " . $conn->error;
            }
        } else {
            echo "Categoría no encontrada.";
        }
    } else {
        echo "Falta el identificador de la categoría.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_categoria"])) {
    $id_categoria = $_GET["id_categoria"];
    $sql = "SELECT * FROM categoria WHERE id_categoria='$id_categoria'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $categoria = $result->fetch_assoc();
    } else {
        echo "Categoría no encontrada.";
        exit();
    }
} 

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
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
    <div class="container">
        <a href="categoria.php">← Regresar</a>
        <h1>Editar Categoría:</h1>
        <form action="" method="POST">
            <input type="hidden" name="action" value="editar">
            <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>">
            
            <label for="nombre_categoria">Nombre de la Categoría:</label>
            <input type="text" name="nombre_categoria" value="<?php echo $categoria['nombre']; ?>">

            <label for="descripcion_categoria">Descripción:</label>
            <input type="text" name="descripcion_categoria" value="<?php echo $categoria['descripcion']; ?>">

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
