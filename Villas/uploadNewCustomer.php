<?php
header('Location: search.php');
 $name = $_POST["nombre"];
 $address = $_POST["direccion"];
 $number = $_POST["telefono"];
 $nPlot = $_POST["parcela"];
 $nBlock = $_POST["manzana"];
 $payW = $_POST["forma"];
 $reserved = $_POST["apartado"];
 $enganchev = $_POST["enganche"];
 $liquidadov = $_POST["liquidado"];
 $nextId = "";




  $query ="SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'x'";
  $exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));

   while ($row = mysqli_fetch_array($exec)) 
   {
   		$nextId = $row["auto_increment"];
   }




$dirGral = "uploads/".$nextId."/";
$dirInvoice = "uploads/".$nextId."/facturas";


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
  			$contractDir = "x" . $target_dir . "contrato."  . $FileType;
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
  			$houseDeedDir = "x" . $target_dir . "escritura."  . $FileType;
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
  			$ineDir = "x" . $target_dir . "ine."  . $FileType;
    		echo "The file ". htmlspecialchars( basename( $_FILES["ine"]["name"])). " has been uploaded.";
  		} 
  		else 
  		{
    		echo "Sorry, there was an error uploading your file.";
  		}
	}
}
else
{
	echo ("No se subio la INE");
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
  			$pagareDir = "x" . $target_dir . "pagare."  . $FileType;
    		echo "The file ". htmlspecialchars( basename( $_FILES["pagare"]["name"])). " has been uploaded.";
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


//echo "<br>House deed:" . $houseDeed . "<br> ";
 $query ="INSERT INTO x (x,	x, x, x, x, x, x, x, x,  x,  x, x, x)
  VALUES ('$name', '$address', '$number', '$nPlot', '$nBlock', '$payW', '$reserved', '$enganchev', '$liquidadov', '$contractDir', '$houseDeedDir', '$ineDir', '$pagareDir')";
  $exec = mysqli_query($conn , $query) or die('Error'.mysqli_error($conn));

  //die();
?>