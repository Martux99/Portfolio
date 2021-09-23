<?php
set_error_handler(
    function ($severity, $message, $file, $line) {
        throw new ErrorException($message, $severity, $severity, $file, $line);
    }
);
header('Location: '.$search.php);

 $name = $_POST["nombre"];
 $address = $_POST["direccion"];
 $number = $_POST["telefono"];
 $nPlot = $_POST["parcela"];
 $nBlock = $_POST["manzana"];
 $status = $_POST["estatus"];



 $conn = mysqli_connect($servername, $username, $password, $database );

 if (!$conn)
{
	die("Error al conectarse:" . mysqli_connect_error());
}


//old name get

$dirGral = "uploads/".$oldName."/";
$dirInvoice = "uploads/".$oldName."/facturas";






$contractDir = "";
$owningLetterDir = "";
$houseDeedDir = "";

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
  			$contractDir = "x/" . $target_dir . "contrato."  . $FileType;
    		echo "The file ". htmlspecialchars( basename( $_FILES["Contrato"]["name"])). " has been uploaded.";
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



if(basename($_FILES["cartaPosesion"]["name"]))
{
	$target_dir = $dirGral;
	$target_file = $target_dir . basename($_FILES["cartaPosesion"]["name"]);

	$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$uploadOk = 1;

	// Allow certain file formats
	if($FileType != "pdf" ) 
	{
  		echo "Sorry, only PDF files are allowed.". htmlspecialchars( basename( $_FILES["cartaPosesion"]["name"])). "<br>";

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
  		if (move_uploaded_file($_FILES["cartaPosesion"]["tmp_name"], $target_dir . "cartaPosesion."  . $FileType)) 
  		{
  			$target_dir = preg_replace('/\s+/', '%20', $target_dir);
  			$owningLetterDir = "x/" . $target_dir . "cartaPosesion."  . $FileType;
    		echo "The file ". htmlspecialchars( basename( $_FILES["cartaPosesion"]["name"])). " has been uploaded.";
  		} 
  		else 
  		{
    		echo "Sorry, there was an error uploading your file.";
  		}
	}
}
else
{
	echo ("No se subio la carta de posesion");
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
  			$houseDeedDir = "x/" . $target_dir . "escritura."  . $FileType;
    		echo "The file ". htmlspecialchars( basename( $_FILES["escritura"]["name"])). " has been uploaded.";
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


$query = "UPDATE x SET x = '$name',	x = '$address', x = '$number', 
x = '$nPlot', x = '$nBlock',  x = '$contractDir', x = '$owningLetterDir', 
x = '$houseDeedDir' WHERE x = '$name'";
  $exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));


//die();

?>
