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

      Cambio de ancla realizado
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
    $fechaInicio   		= date("Y-m-d H:i:s", time());
    $FechaFinal     = date("Y-m-d H:i:s", mktime(4,0,0, date('n'), date('j')+1, date('Y')));
    $fechaInicio    = substr_replace($FechaFinal, '%20', 10, -8);


    $FromDate			= date("Y-m-d H:i:s", mktime(0,0,0, date('n'), date('j'), date('Y')));
    $ToDate			= date("Y-m-d H:i:s", mktime(23,59,59, date('n'), date('j'), date('Y')));
    $curl = curl_init();


//SETTINGS
//En la cadena x, el numero x, se refiere al id de grupo de canal especifico del canal.
//Este se puede obtener en PostMan utilizando la busqueda de display.
curl_setopt_array($curl, array(
  CURLOPT_URL => 'x'.$fechaInicio,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$authCode
  ),
));

$response = curl_exec($curl);


$xplStr = explode('"eventId":', $response);
$eventID = ' ';
if(count($xplStr)>1)
{
	$xplStr = explode(',', $xplStr[1]);
	$eventID = substr($xplStr[0], 1);
}


curl_close($curl);



$postedLayout = $_POST["Layout"];



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'x'.$eventID,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$authCode
  ),
));

$response = curl_exec($curl);

curl_close($curl);





//SETTINGS
//En la cadena x, el numero x, se refiere al id de grupo de canal especifico del canal.
//Este se puede obtener en PostMan utilizando la busqueda de display.
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
  CURLOPT_POSTFIELDS => array('eventTypeId' => '3','campaignId' => $postedLayout,'displayOrder' => '0','isPriority' => '1','displayGroupIds[]' => 'x','fromDt' => $FromDate,'toDt' => $ToDate,'recurrenceType' => 'Day','recurrenceDetail' => '1'),
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