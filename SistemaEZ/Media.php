<?php
//SETTINGS
//TODOS LOS VALORES QUE SE TIENEN QUE CAMBIAR AL DOCUMENTO PARA QUE FUNCIONE PARA UN NUEVO CLIENTE
//VIENEN ACOMPAÑADOS POR LA LEYENDA "SETTINGS" Y EL USO QUE TIENEN
//PARA CAMBIAR DATOS Y HACER DEPLOY PARA UN NUEVO CLIENTE BUSQUE "SETTINGS" EN EL DOCUMENTO
//SETTINGS

?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>Cambio de anclas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="icon" href="https://xubax.com/wp-content/uploads/2020/02/favicon.png" sizes="32x32">
<style type="text/css">

* {
  box-sizing: border-box;
}


.columna {
  float: left;
  width: 33.33%;
  padding: 10px;
  background-color: #fff;
  height: 60px;

}

body{
  background-color: #eeeeee;
}

/* Clear floats after the columns */
.fila:after {
  content: "";
  display: table;
  clear: both;
}
.container {
  margin-top: 50px;
  display: flex;
  justify-content: center;
  min-height: 300px;
}
.content {
  
  margin: 0 auto;
  border-color: #ff4d0d;
  width: 60%;
  box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.2);
}
.btn-next
{
  margin: 50px 0px;
  border-radius: 0px;
  background-color: #333;
  color: #f5f5f5;
  font-size: 24px;
  width: 200px;
}
.btn-next
{
  background-color: #cc1914;
  color: #fff;
}
.Wrapper{
  display: flex;
  justify-content: center;
}
p
{
  font-size: 50;
  font-family: Verdana, Geneva, sans-serif
}
h1{
  margin: 50px 0px;
}
</style>



</head>
<body>
<div class="fila">
  <div class="columna">
    <img src="LogoCliente.png" style=" height: 100%; position: relative; left: 5%;">
  </div>
  <div class="columna" style="text-align: center;">
    <img src="LogoEZ.png" style="align-self: center; height: 110px; position: relative;  top: -35px;">
  </div>
  <div class="columna">
    <img src="XubaxLogo.png" style="  height: 110px; position: absolute; right: 5px; top: -20px;">
  </div>
</div>
<div class = "container" > 
  <div class="content" style="background-color: #fff;">
    <div class="Wrapper">
<h1>

      Imagen/Video subido con exito
</h1>
    </div>
    <div class="Wrapper">
      <h3 style=" text-align: center;">
  
  El cambio podra ser visualizado en un par de minutos
</h3>
    </div>
    <div class="Wrapper">
      
    <form action="EZForDisplax.php">
      <input type="submit" value="Regresar" name="submit"class="btn btn-next">
    </form>
    

    </div>
<br>
      
    
  </div> 
</div>


<?php

set_error_handler(
    function ($severity, $message, $file, $line) {
        throw new ErrorException($message, $severity, $severity, $file, $line);
    }
);




function getAuth(){

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "x",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => array('client_id' => 'x','client_secret' => 'x','grant_type' => 'x'),
	  CURLOPT_HTTPHEADER => array(
		"Content-Type: multipart/form-data"
	  ),
	));

	$response = curl_exec($curl);
	curl_close($curl);
	$auth = (array) json_decode($response,true);

	$authCode  =($auth['access_token']); 
	return $authCode;
	

} //End function Generate Key



function send(){
	$curl          		= curl_init();
    $authCode      		= getAuth();
    $FechaFinal			= date("Y-m-d H:i:s", mktime(3,0,0, date('n'), date('j')+1, date('Y')));
    $fechaExpiracion	= $FechaFinal;
    $fechaInicio      = date("Y-m-d H:i:s", time());
 
//Subida de medios
    //$localFile = $_FILES["UploadedMedia"]['tmp_name'];
    $tmpfile = $_FILES['fileToUpload']['tmp_name'];
    $filename = basename($_FILES['fileToUpload']['name']);
  curl_setopt_array($curl, array(
  CURLOPT_URL => "x",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => array('files' => curl_file_create($tmpfile, $_FILES['fileToUpload']['type'], $fechaInicio.$filename), 'expires' => $fechaExpiracion),
	  //Los medios estan dispuestos para expirar 1 dia despues de la subida
	  CURLOPT_HTTPHEADER => array(
	    "Authorization: Bearer ".$authCode,
	  ),
	));

	$response = curl_exec($curl);

   curl_close($curl);

  
   //Arriba esta la subida de medios

   //Se obtiene la id del medio que se acaba de subir para poder asignarlo a la disposicion
   $mediaExploded = explode('mediaId":', $response);
   
   if(count($mediaExploded)>0)
   {
   		$mediaID = explode(',', $mediaExploded[1]);
  
   }

   $mediaNameEx = explode('"name":"', $response);

   
   if(count($mediaNameEx)>0)
   {
      $mediaName = explode('"', $mediaNameEx[1]);

   }

   $mediaExploded2 = explode('"type":"', $response);
   
   if(count($mediaExploded2)>0)
   {
      $mediaType = substr($mediaExploded2[1], 0,5);



      if($mediaType == 'image')
      {

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'x'.$mediaID[0],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => 'name='.$mediaName[0].'&duration=30&retired=0&updateInLayouts=1&expires='.$fechaExpiracion,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$authCode,
    'Content-Type: application/x-www-form-urlencoded',
  ),
));

$response = curl_exec($curl);

curl_close($curl);

      }
   }
   



//SETTINGS
//En la URL se tiene que introducir el nombre de la disposicion que se utiliza para mostrar los medios del cliente, los espacios
//Tienen que ser sustituidos por: '%20'
  $curl             = curl_init();
  $authCode         = getAuth();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "x",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array
  (
      "Authorization: Bearer ".$authCode
  ),
  )
  );
  //En $response se encuentra toda la informacion respecto a las disposiciones que coinciden con el filtro de busqueda
  $response = curl_exec($curl);
  curl_close($curl);
  //Se obtiene unicamente el valor de nombre de las disposiciones para acomodarlo en un select

 $strArrGtr = explode('"layoutId":', $response);
if(count($strArrGtr)>0)
 {
 	$layoutID = explode(",", $strArrGtr[1]);
 	$layoutID[0] = substr($layoutID[0], 1);

 }
 


//abajo inicia la programacion en el schedule

//Primero se asigna a la disposicion el estado de draft

 $curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => 'x'.$layoutID[0],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$authCode,
    'Content-Type: application/x-www-form-urlencoded'
  ),
));


$response = curl_exec($curl);
curl_close($curl);


//Se asigna el medio a la disposicion

//SETTINGS
//En la url, el ultimo numero se refiere al id de la playlist a la que se le asigna el medio, se tiene que sustituir por la del cliente
   $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'x',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('playlistId' => 'x','media[]' => $mediaID[0]),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$authCode
  ),
));
$response = curl_exec($curl);
curl_close($curl);

  
//Se publica la disposicion
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'x'.$layoutID[0],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => 'publishNow=1',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$authCode,
    'Content-Type: application/x-www-form-urlencoded'

  ),
));

$response = curl_exec($curl);


curl_close($curl);


 $strArrGtr = explode('"duration":', $response);
if(count($strArrGtr)>0)
 {
 	$duracion = explode(",", $strArrGtr[1]);
 	$duracion[0] = substr($duracion[0], 1);

 }


//Obtener la playlist para obtener su duracion y e nbase a su duracion establecer fecha inicio y
//tiempo de loop = 1920
 
	$fechaInicio   		= date("Y-m-d H:i:s", time() + 120);
    $fechaFin      		= date("Y-m-d H:i:s", time() + 120 + (int)$duracion[0]);
    $tiempoDeLoop 		= 4200;





//Progracion de la campaña al grupo de canales
//SETTINGS
//En la cadena x, el numero x, se refiere al id de grupo de canal especifico del canal.
//Este se puede obtener en PostMan utilizando la busqueda de display.
//Al mismo tiempo, el campo recurrenceDetail se refiere a con que frecuencia se va a repetir. El tiempo de mesa
//Mientras que el campaignId es el id de campaña de la disposicion que se va a añadir o el id de la campaña

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'x',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('eventTypeId' => '3','campaignId' => 'x','displayOrder' => '0','isPriority' => '1','displayGroupIds[]' => 'x','fromDt' => $fechaInicio,'toDt' => $fechaFin,'recurrenceType' => 'Minute','recurrenceDetail' => '80','recurrenceRange' => $FechaFinal),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$authCode
  ),
));

$response = curl_exec($curl);

curl_close($curl);



}


send();
?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>