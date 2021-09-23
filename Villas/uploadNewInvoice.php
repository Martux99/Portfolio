<?php 
header('Location: search.php');
$name = $_POST["nombre"];
$clientID = $_POST["idCliente"];




$dirInvoice = "uploads/".$clientID."/facturas/";


if (!file_exists($dirInvoice)) {
    mkdir($dirInvoice, 0777, true);
}

$invoiceDir = "";



	$target_dir = $dirInvoice;
	$target_file = $target_dir . basename($_FILES["Factura"]["name"]);

	$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$uploadOk = 1;


	// Allow certain file formats
	if($FileType != "pdf" ) 
	{
  		echo "Sorry, only PDF files are allowed.". htmlspecialchars( basename( $_FILES["Factura"]["name"])). "<br>";

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
		$fecha = new DateTime();
		$currentTimeStamp = $fecha->getTimestamp();
  		if (move_uploaded_file($_FILES["Factura"]["tmp_name"], $target_dir . "Factura" . $currentTimeStamp . "." . $FileType)) 
  		{
  			$target_dir = preg_replace('/\s+/', '%20', $target_dir . "Factura" . $currentTimeStamp . "." . $FileType);
  			$invoiceDir = "x/" . $target_dir;
    		echo "The file ". htmlspecialchars( basename( $_FILES["Factura"]["name"])). " has been uploaded.";
  		} 
  		else 
  		{
    		echo "Sorry, there was an error uploading your file.";
  		}
	}

$query ="INSERT INTO x (x,	x)
  VALUES ('$clientID', '$invoiceDir')";
  $exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));

  $query ="UPDATE x SET x = '$invoiceDir'  WHERE x = '$clientID' ";
  $exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));

die();

?>