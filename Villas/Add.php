<?php
session_start();

if(!isset($_SESSION['id'])){
  header('location: index.php');
  exit();
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv=”Content-Type” charset="UTF-8">
  <meta http-equiv=" X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Villas Del Fresno</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="x" sizes="32x32">
  

  
</head>

<body>

  <img src="logo.jpeg" class="logo" alt="">
  <form class="table" action="uploadNewCustomer.php" method="POST"  enctype="multipart/form-data">
    <h1>Nuevo cliente</h1>
    <input type="text" name="nombre" placeholder="Nombre del cliente" required="true">
    <input type="text" name="direccion" placeholder="Direccion" required="true">
    <input type="text" name="telefono" placeholder="Numero del cliente" required="true">
    <input type="text" name="parcela" placeholder="Numero de lote" required="true">
    <input type="text" name="manzana" placeholder="Numero de manzana" required="true">
    <input type="text" name="forma" placeholder="Forma de pago" required="true">
    <input type="text" name="apartado" placeholder="Apartado" required="true">
    <input type="text" name="enganche" placeholder="Enganche" required="true">
    <input type="text" name="liquidado" placeholder="Liquidado" required="true">


    Contrato/Carta de posesion
    <input type="file" name="Contrato" id="Contrato" accept=".pdf">
    <br>
    Escritura
    <input type="file" name="escritura" accept=".pdf" >
    <br>
    INE 
    <input type="file" name="ine" accept=".pdf" >
    <br>
    Pagare 
    <input type="file" name="pagare" accept=".pdf" >
    <br>
    

  

    <input type="submit" name="" value="Subir">
  </form>

</body>

</html>




