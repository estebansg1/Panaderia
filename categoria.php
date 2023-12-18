<?php
  $user="root";
  $pass="";
  $server="localhost";
  $db="negocio";


$con=mysqli_connect($server,$user,"",$db) or die ("Error");
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Añadir categoria</title>
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
            background-color: #ffffff7a;
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
            color: #2c1507;
            font-size: 18px;
            margin: 0 15px;
        }
        header img {
            width: 150px;
            cursor: pointer;
        }
        .container {
            max-width: 90%;
            max-height: 90%;
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
            <a href="clientes.html">Clientes </a>
        </div>
    </header>  
    <div class="container">
        <a href="categoria.html">X Cancelar</a>
        <h1>Añadir categoria</h1>
        <form action="categoria.php" method="post">
            <label for="id_categoria">id_categoriaa:</label><br>
            <input type="texto" id="categoria" name="categoria"><br>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre"><br>
            <label for="descripcion">descripcion:</label><br>
            <input type="descripcion" id="descripcion" name="descripcion"><br>
            <select>
                <option id="categoria" name="categoria">Seleccionar...</option>
            </select><br>
            <label for="categoria">categoria:</label>
            <select>
                <option id="" name="categoria">Seleccionar...</option>
            </select><br>
            <button type="submit">Añadir categoria</button>
        </form>
    </div>
</body>
</html>


    
    <?php

       if (isset($_POST['insert'])) {
         
         $id_categoria=$_POST["id_categoria"];
         $nombre=$_POST["nombre"];
         $descripcion=$_POST["descripcions"];
    

         $insertar = "INSERT INTO categoria(id_categoria,nombre,descripcion,) VALUES ('$id_categoria','$nombre','$descripcion',)";

         $ejecutar= mysqli_query($con, $insertar);

         if($ejecutar){

          echo "<h3> Insertado correctamente</h3>";

          }

         }
      ?>
      <br />
       <table with= "500" border="2" style="background:color: #F9F9F9; ">
         <tr>
            <th>id_categoria</th>
            <th>NOMBRE</th>
            <th>descripcions</th>
            <th>stock_producto</th>
            <th>id_categoria</th>
            <th>rut_proveedor</th>
      
          </tr>

         <?php
             $consulta = "SELECT * FROM clientes ";

             $ejecutar = mysqli_query($con, $consulta);
             $i=0;

          while ($fila = mysqli_fetch_array($ejecutar)) {

              $id_categoria=$fila['id_categoria'];
              $nombre=$fila['nombre'];
              $descripcion= $fila['descripcions'];


          $i++;
         
        ?>

      <tr align="center">
           <td> <?php echo $id_categoria; ?></td>
           <td> <?php echo $nombre; ?></td>
           <td> <?php echo $descripcions; ?></td>


           <td><a href='PRODUCTO.php?editar= <?php echo $id; ?>'>EDITAR</a></td>
             <td><a href='PRODUCTO.php?borrar= <?php echo $id; ?>'>ELIMINAR</a></td>
      </tr>

        <?php } ?>


       </table>

     <?php
         if (isset($_GET['editar'])){
             include('editar.php');
         }
  ?>

  <?php
       if (isset($_GET['borrar'])){
        
        $borrar_id= $_GET['borrar'];
        $borrar = "DELETE FROM user WHERE id='$borrar_id'";
        $ejecutar = mysqli_query($con, $borrar);

        if($ejecutar){

         echo "<script>alert('El usuario ha sido borrado')</script>";
         echo "<script>window.open('formulario.php')</script>";

        }
 }


?>
 </body>
</html>

