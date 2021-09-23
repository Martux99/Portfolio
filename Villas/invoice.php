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
<?php 

$name=$_POST['idCliente']; 


   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      $sql = "SELECT nombre_Cliente FROM Clientes WHERE id_Cliente = '$name'";
      $result = mysqli_query($db,$sql);

   while($row = mysqli_fetch_array($result)) {
            $realName=$row['nombre_Cliente'];
   }
   

?>


<body>

  <img src="logo.jpeg" class="logo" alt="">
  <form class="table" action="uploadNewInvoice.php" method="POST"  enctype="multipart/form-data">
    <h1>Añadir factura a cliente</h1>
    <input type="text" name="nombre" value="<?php echo $realName; ?>" readonly>
    <input type="hidden" name="idCliente" value="<?php echo $name; ?>">

    Factura
    <input type="file" name="Factura" id="Factura" accept=".pdf" required="true">
    <br>


    <input type="submit" name="" value="Subir">
  </form>

</body>

</html>
