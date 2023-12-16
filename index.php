<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bienvenido de Nuevo</title>
    <style>
        body {
            background-image: url('img/panaderiafondo1.jpg');
            background-size: cover;
            display: flex;
            justify-content: left;
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
            margin-left: 2%;
            max-width: 90%;
            max-height: 80%;
            padding: 16px;
            margin-top: 60px; 
            background-color: #eccf8dc5;
            border-radius: 12px;
            box-shadow: 0 0 40px rgb(0, 0, 0);
        }
        .container h1 {
            text-align: center;
            color: #2c1507;
        }
        button {
            background-color: rgba(255, 255, 255, 0.404);
            color: black;
            padding: 8px 10px;
            margin-top: 5%;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.5);
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
        <h1>Registro de ventas</h1>
        <form action="" method="post">
            <label for="id_venta">No.Venta:</label><br>
            <input type="text" id="id_venta name="id_venta><br>
            <label for="fecha_venta">Fecha de Venta:</label><br>
            <input type="date" id="fecha_venta" name="fecha_venta"><br>
            <label for="monto_inicial_venta">Monto inicial:</label><br>
            <input type="text" id="monto_inicial_venta name="monto_inicial_venta><br>
            <label for="descuento_venta">Descuento:</label><br>
            <input type="text" id="descuento_venta name="descuento_venta><br>
            <label for="rut_cliente">ID Cliente:</label><br>
            <input type="text" id="rut_cliente name="rut_cliente"><br>
            <button type="submit">Registrar Venta</button>
        </form>
    </div> 
    <script>

    </script>
</body>
</html>
