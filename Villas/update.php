<?php

session_start();
if(!isset($_SESSION['id'])){
  header('location: index.php');
  exit();
}

header('Location: search.php');

 $id = $_POST["idClient"];
 $name = $_POST["nombre"];
 $address = $_POST["direccion"];
 $number = $_POST["telefono"];
 $nPlot = $_POST["parcela"];
 $nBlock = $_POST["manzana"];
 $payW = $_POST["pago"];
 $apartado = $_POST["apartado"];
 $enganche = $_POST["enganche"];
 $liquidado = $_POST["liquidado"];




 $servername = "209.59.139.83";
 $username   = "villasd9_villasDBank";
 $password   = "UVM7T49Ecz.;(H";
 $database   = "villasd9_villasDelFresno";
 $conn = mysqli_connect($servername, $username, $password, $database );

 if (!$conn)
{
	die("Error al conectarse:" . mysqli_connect_error());
}


  $query = "SELECT nombre_Cliente FROM Clientes WHERE id_Cliente = '$id'";
  $result = mysqli_query($conn, $query );


//old name get

  while ($row = mysqli_fetch_array($result)) 
  {
  	$oldName = $row ["nombre_Cliente"];
  }

$dirGral = "uploads/".$id."/";
$dirInvoice = "uploads/".$id."/facturas";


if (!file_exists($dirInvoice)) {
    mkdir($dirInvoice, 0777, true);
}
else{
	//echo("Directorio existente");
}



$contractDir = "";

$houseDeedDir = "";

$ineDir = "";

$pagareDir = "";

if(basename($_FILES["Contrato"]["name"]))
{
	$target_dir = $dirGral;
	$target_file = $target_dir . basename($_FILES["Contrato"]["name"]);

	$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$uploadOk = 1;


	// Allow certain file formats
	if($FileType != "pdf" ) 
	{
  		echo "Sorry, only PDF files are allowed.". htmlspecialchars( basename( $_FILES["Contrato"]["name"])). "<br>";

  		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
  		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	} 
	else 	
	{
  		if (move_uploaded_file($_FILES["Contrato"]["tmp_name"], $target_dir . "contrato." . $FileType)) 
  		{
  			$target_dir = preg_replace('/\s+/', '%20', $target_dir);
  			$contractDir = "https://app.villasdelfresno.com/" . $target_dir . "contrato."  . $FileType;
    		echo "The file ". htmlspecialchars( basename( $_FILES["Contrato"]["name"])). " has been uploaded.";
    		$query = "UPDATE Clientes SET  firma_Contrato = '$contractDir' WHERE id_Cliente = '$id'";
  			$exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));
  		} 
  		else 
  		{
    		echo "Sorry, there was an error uploading your file.";
  		}
	}
}
else
{
	echo ("No se subio el contrato");
}


if(basename($_FILES["escritura"]["name"]))
{
	$target_dir = $dirGral;
	$target_file = $target_dir . basename($_FILES["escritura"]["name"]);

	$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$uploadOk = 1;

	// Allow certain file formats
	if($FileType != "pdf" ) 
	{
  		echo "Sorry, only PDF files are allowed.". htmlspecialchars( basename( $_FILES["escritura"]["name"])). "<br>";

  		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
  		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	} 
	else 	
	{
  		if (move_uploaded_file($_FILES["escritura"]["tmp_name"], $target_dir . "escritura."  . $FileType)) 
  		{
  			$target_dir = preg_replace('/\s+/', '%20', $target_dir);
  			$houseDeedDir = "https://app.villasdelfresno.com/" . $target_dir . "escritura."  . $FileType;
    		echo "The file ". htmlspecialchars( basename( $_FILES["escritura"]["name"])). " has been uploaded.";
    		$query = "UPDATE Clientes SET escritura = '$houseDeedDir' WHERE id_Cliente = '$id'";
  			$exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));

  		} 
  		else 
  		{
    		echo "Sorry, there was an error uploading your file.";
  		}
	}
}
else
{
	echo ("No se subio la escritura");
}


if(basename($_FILES["ine"]["name"]))
{
  $target_dir = $dirGral;
  $target_file = $target_dir . basename($_FILES["ine"]["name"]);

  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Allow certain file formats
  if($FileType != "pdf" ) 
  {
      echo "Sorry, only PDF files are allowed.". htmlspecialchars( basename( $_FILES["ine"]["name"])). "<br>";

      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) 
  {
      echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
  } 
  else  
  {
      if (move_uploaded_file($_FILES["ine"]["tmp_name"], $target_dir . "ine."  . $FileType)) 
      {
        $target_dir = preg_replace('/\s+/', '%20', $target_dir);
        $ineDir = "https://app.villasdelfresno.com/" . $target_dir . "ine."  . $FileType;
        echo "The file ". htmlspecialchars( basename( $_FILES["ine"]["name"])). " has been uploaded.";
        $query = "UPDATE Clientes SET ine = '$ineDir' WHERE id_Cliente = '$id'";
        $exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));

      } 
      else 
      {
        echo "Sorry, there was an error uploading your file.";
      }
  }
}
else
{
  echo ("No se subio el ine");
}




if(basename($_FILES["pagare"]["name"]))
{
  $target_dir = $dirGral;
  $target_file = $target_dir . basename($_FILES["pagare"]["name"]);

  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Allow certain file formats
  if($FileType != "pdf" ) 
  {
      echo "Sorry, only PDF files are allowed.". htmlspecialchars( basename( $_FILES["pagare"]["name"])). "<br>";

      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) 
  {
      echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
  } 
  else  
  {
      if (move_uploaded_file($_FILES["pagare"]["tmp_name"], $target_dir . "pagare."  . $FileType)) 
      {
        $target_dir = preg_replace('/\s+/', '%20', $target_dir);
        $pagareDir = "https://app.villasdelfresno.com/" . $target_dir . "pagare."  . $FileType;
        echo "The file ". htmlspecialchars( basename( $_FILES["pagare"]["name"])). " has been uploaded.";
        $query = "UPDATE Clientes SET pagare = '$pagareDir' WHERE id_Cliente = '$id'";
        $exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));

      } 
      else 
      {
        echo "Sorry, there was an error uploading your file.";
      }
  }
}
else
{
  echo ("No se subio el pagare");
}




$query = "UPDATE Clientes SET nombre_Cliente = '$name',	direccion_Cliente = '$address', celular_Cliente = '$number', 
numero_Terreno = '$nPlot', numero_Manzana = '$nBlock', forma_Pago = '$payW', enganche = '$enganche', apartado = '$apartado', liquidado = '$liquidado' WHERE id_Cliente = '$id'";
  $exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));


die();

?>
