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
  <link rel="icon" href="https://villasdelfresno.noentiendo.mx/logo.jpeg" sizes="32x32">
</head>

<body>
	<img src="logo.jpeg" class="logo" alt="">

	<form class="table" action="update.php" method="POST"  enctype="multipart/form-data" style=" top: 100%">

<?php

$name=$_POST['idCliente'];


$conectar=@mysqli_connect('x','x','x');
        if(!$conectar){
          echo"No hay wifi";
        }else{
          $base=mysqli_select_db($conectar,'villasd9_villasDelFresno');
  if(!$base){
    
    }
  }
  $query = "SELECT * FROM x WHERE x = '$name'";
  $result = mysqli_query($conectar, $query );

  while ($row = mysqli_fetch_array($result)) 
  {
  	echo '<input type="hidden" name="idClient" value = "'. $name . '">';
    echo 'Nombre<input type="text" name="nombre" placeholder="Nombre de Usuario" value = "'.$row ["x"] . '">';
    echo 'Dirección<input type="text" name="direccion" placeholder="Dirección de Usuario" value = "'.$row ["x"] . '">';
    echo 'Numero Celular<input type="text" name="telefono" placeholder="Celular de Usuario" value = "'.$row ["x"] . '">';
    echo 'Numero de terreno<input type="text" name="parcela" placeholder="Numero de terreno" value = "'.$row ["x"] . '">';
    echo 'Numero de manzana<input type="text" name="manzana" placeholder="Numero de manzana" value = "'.$row ["x"] . '">'; 
    echo 'Forma de pago<input type="text" name="pago" placeholder="forma de pago" value = "'.$row ["x"] . '">';
    echo 'Apartado<input type="text" name="apartado" placeholder="Apartado" value = "'.$row ["x"] . '">';
    echo 'Enganche<input type="text" name="enganche" placeholder="Enganche" value = "'.$row ["x"] . '">';
    echo 'Liquidado<input type="text" name="liquidado" placeholder="Liquidado" value = "'.$row ["x"] . '">';
    
    echo "<h1> Actualizar o agregar documentos </h1>  Contrato
    <input type=\"file\" name=\"Contrato\" id=\"Contrato\" accept=\".pdf\">
    <br>
    
    Escritura
    <input type=\"file\" name=\"escritura\" accept=\".pdf\">
    <br>
    INE
    <input type=\"file\" name=\"ine\" accept=\".pdf\">
    <br>
    Pagare
    <input type=\"file\" name=\"pagare\" accept=\".pdf\">
    ";

    echo '<input type="submit" name="" value="Subir">';
  }

?>
</form>

</body>

</html>
