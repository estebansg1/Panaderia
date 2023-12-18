<!DOCTYPE html>
<meta charset='UTF-8'>

<?php
  $user="root";
  $pass="";
  $server="localhost";
  $db="negocio";


$con=mysqli_connect($server,$user,"",$db) or die ("Error");
 ?>

 
         <html>
         <head>
             <meta charset="UTF-8">
             <title>Añadir Ciente</title>
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
                     backgroundt-color: #fff9e7;
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
         </body>

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
                     <a href="ventas.html">Ventas </a>
                 </div>
             </header>  
             <div class="container">
                 <a href="venta.html">X Cancelar</a>
                 <h1>Añadir venta</h1>
                 <form action="venta.php" method="post">
                     <label for="rut_venta">Clave:</label><br>
                     <input type="text" id="rut_venta" name="rut_venta"><br>
                     <label for="nombre">Nombre:</label><br>
                     <input type="text" id="nombre" name="nombre"><br>
                     <label for="apellido_parerno_p">Apellido Paterno:</label><br>
                     <input type="text" id="apellido_parerno_p" name="apellido_parerno_p"><br>
                     <label for="descuento_venta">Apellido Materno:</label><br>
                     <input type="text" id="descuento_venta" name="descuento_venta"><br>
                     <label for="rot_cliente">Telefono 1:</label><br>
                 </form>
             </div>
         </body>
         
         </html>
         <br />
       <table with= "500" border="2" style="background:color: #F9F9F9; ">
         <tr>
            <th>id_venta</th>
            <th>NOMBRE</th>
            <th>apellido_parerno_p</th>
            <th>descuento_venta</th>
            <th>rot_cliente</th>
          </tr>
         
      ?>
      

    <?php

       if (isset($_POST['insert'])) {
         
         $id_venta=$_POST["id_venta"];
         $fecha_venta=$_POST["fecha_venta"];
         $monto_final_venta=$_POST["apellido_parerno_p"];
         $descuento_venta=$_POST["descuento_venta"];
         $rot_cliente=$_POST["rot_cliente"];
         
         $insertar = "INSERT INTO venta(id_venta_fecha_venta,monto_final_venta,descuento_venta,rot_cliente,) 
         VALUES ('$id_venta','$fecha_venta','$monto_final_venta','$descuento_venta','$rot_cliente')";
        
        $ejecutar= mysqli_query($con, $insertar);

         if($ejecutar){

          echo "<h3> Insertado correctamente</h3>";

          }

         }
?>
        
         <?php
             $consulta = "SELECT * FROM cliente";

             $ejecutar = mysqli_query($con, $consulta);
             $i=0;

          while ($fila = mysqli_fetch_array($ejecutar)) {

              $id_venta=$fila['id_venta'];
              $fecha_venta=$fila['fecha_venta'];
              $apellido_parerno_p= $fila['apellido_parerno_p'];
              $descuento_venta= $fila['descuento_venta'];
              $rot_cliente= $fila['rot_cliente'];

          $i++;
         
        ?>

      <tr align="center">
           <td> <?php echo $id_venta; ?></td>
           <td> <?php echo $fecha_venta; ?></td>
           <td> <?php echo $apellido_parerno_p; ?></td>
           <td> <?php echo $descuento_venta; ?></td>
           <td> <?php echo $rot_cliente; ?></td>
           <td><a href='venta.php?editar= <?php echo $id; ?>'>EDITAR</a></td>
             <td><a href='venta.php?borrar= <?php echo $id; ?>'>ELIMINAR</a></td>
      </tr>

        <?php } ?>


       </table>

     <?php
         if (isset($_GET['editar'])){
             include('editar.php');
         }


  
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


