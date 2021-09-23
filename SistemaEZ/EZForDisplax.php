<?php
//SETTINGS
//TODOS LOS VALORES QUE SE TIENEN QUE CAMBIAR AL DOCUMENTO PARA QUE FUNCIONE PARA UN NUEVO CLIENTE
//VIENEN ACOMPAÑADOS POR LA LEYENDA "SETTINGS" Y EL USO QUE TIENEN
//PARA CAMBIAR DATOS Y HACER DEPLOY PARA UN NUEVO CLIENTE BUSQUE "SETTINGS" EN EL DOCUMENTO
//SETTINGS

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sistema EZ para Displax</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="icon" href="https://xubax.com/wp-content/uploads/2020/02/favicon.png" sizes="32x32">
 <style type="text/css">

.custom-select {
  
  position: relative;
  display: block;
  max-width: 400px;
  min-width: 180px;
  margin: 0 auto;
  
}
.custom-select select {
  
  border: 1px solid #b6b6b6;
  outline: none;
  background: transparent;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0;
  margin: 0;
  display: block;
  width: 100%;
  cursor: pointer;
  
  padding: 12px 55px 15px 15px;
  font-size: 14px;
}
.custom-select:after {
  position: absolute;
  right: 0;
  top: 0;
  width: 50px;
  height: 100%;
  line-height: 50px;
  content: "▼";
  text-align: center;
  z-index: -1;
  background: #000000;
  color: #000000;
  font-size: 18px;
}
  #one
{
  margin-top:50px;
 box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.2);
}
.it .btn-orange
{
  background-color: transparent;
  border-color: #777!important;
  color: #777;
  text-align: left;
  width:100%;
}
.it input.form-control
{
  height: 54px;
  border:none;
  margin-bottom:0px;
  border-radius: 0px;
  border-bottom: 1px solid #ddd;
  box-shadow: none;
}
.it .form-control:focus
{
  border-color: #ff4d0d;
  box-shadow: none;
  outline: none;
}
.fileUpload {
    position: relative;
    left: 166%;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.it .btn-new, .it .btn-next
{
  margin: 30px 0px;
  border-radius: 0px;
  background-color: #333;
  color: #f5f5f5;
  font-size: 16px;
  width: 155px;
}
.it .btn-next
{
  background-color: #cc1914;
  color: #fff;
}
.it .btn-check
{
  cursor:pointer;
  line-height:54px;
  color:red;
}
.it .uploadDoc
{
  margin-bottom: 20px;
}
.it .uploadDoc
{
  margin-bottom: 20px;
}
.it .btn-orange img {
    width: 30px;
}
p
{
  font-size:16px;
  text-align:center;
  margin:30px 0px;
}
.it #uploader .docErr
{
  position: absolute;
    right:auto;
    left: 10px;
    top: -56px;
    padding: 10px;
    font-size: 15px;
    background-color: #fff;
    color: red;
    box-shadow: 0px 0px 7px 2px rgba(0,0,0,0.2);
    display: none;
}
.it #uploader .docErr:after
{
  content: '\f0d7';
  display: inline-block;
  font-family: FontAwesome;
  font-size: 50px;
  color: #fff;
  position: absolute;
  left: 30px;
  bottom: -40px;
  text-shadow: 0px 3px 6px rgba(0,0,0,0.2);
}
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
input { 
    text-align: center; 
}
body{
  background-color: #eeeeee;
}

.fila:after {
  content: "";
  display: table;
  clear: both;
}
div {

}
::-webkit-input-placeholder {
   text-align: center;
}

:-moz-placeholder { 
   text-align: center;  
}

::-moz-placeholder {  
   text-align: center;  
}

:-ms-input-placeholder {  
   text-align: center; 
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


<!-- partial:index.partial.html -->
<form action="Media.php" method="post" enctype="multipart/form-data">
<div class="container">
<div class="row it">
<div class="col-sm-offset-1 col-sm-10" id="one" style="background-color: #fff;">
<p>
Suba sus fotos o videos en formatos .mp4, .png, .jpg, .jpeg o .bmp.
</p><br>
<div class="row">
  <div class="col-sm-offset-4 col-sm-4 form-group">
    <h3 class="text-center">Medio</h3>
  </div><!--form-group-->
</div><!--row-->
<div id="uploader">
<div class="row uploadDoc">
  <div class="col-sm-3">
    <div class="docErr">Porfavor, suba un medio valido</div><!--error-->
    <div class="fileUpload btn btn-orange">
      <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
      <span class="upl" id="upload">Seleccionar Medio</span>
      <input type="file" class="upload up" id="fileToUpload" name="fileToUpload" onchange="readURL(this);" accept=".mp4,.png,.jpg,.jpeg,.bmp", required="true" enctype="multipart/form-data" />
    </div><!-- btn-orange -->
  </div><!-- col-3 -->
  <div class="col-sm-8">
    
  </div><!--col-8-->

</div><!--row-->
</div><!--uploader-->
<div class="text-center">

<input type="submit" value="Subir" name="submit"class="btn btn-next">

</div>
</div><!--one-->
</div><!-- row -->
</div><!-- container -->
</form>

<!-- Playlist select -->



<form action="Music.php" method="post" enctype="multipart/form-data">
<div class="container">
<div class="row it">
<div class="col-sm-offset-1 col-sm-10" id="one" style="background-color: #fff;">
<p>
Elija entre las listas de reproduccion disponibles
</p><br>
<div class="row">
  <div class="col-sm-offset-4 col-sm-4 form-group">
    <h3 class="text-center">Listas disponibles</h3>
    <?php

        set_error_handler(
    function ($severity, $message, $file, $line) {
        throw new ErrorException($message, $severity, $severity, $file, $line);
    }
);

//Obtener token de acceso
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
  

} 


//Se obtienen las listas de reproduccion disponibles
function send()
{




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
      "Authorization: Bearer ".$authCode,
  ),
  )
  );
  //En $response se encuentra toda la informacion respecto a las disposiciones que coinciden con el filtro de busqueda
  $response = curl_exec($curl);
  curl_close($curl);
  //Se obtiene el campaign id de la disposicion
  


  //Se obtiene unicamente el valor de nombre de las disposiciones para acomodarlo en un select
 $strArrGtr = explode('"layout":', $response);
$cam = explode('"campaignId":', $response);


 echo('<label class="custom-select"> <select name="Layout" id="Layout"> ');
for ($i=1; $i < count($strArrGtr); $i++) { 
  
  $cam2 = explode(',', $cam[$i]);
  $campaignId = substr($cam2[0], 1);
  $strArrLsr = explode('"description"', $strArrGtr[$i]);
  $fnlStr = substr($strArrLsr[0], 1, -11);
  echo '<option value="'.$campaignId.'">';
  for ($a=0; $a < strlen($fnlStr); $a++) { 
    if ($fnlStr[$a]=='"') {
       $fnlStr[$a] = ' ';
     }
     if ($fnlStr[$a]=='\\' && $fnlStr[$a+1]=='u') {
       echo "ñ";
       $a+=6;
     }  
     echo $fnlStr[$a];
  }
  echo '</option>';
}
echo "</select> </label>";
}
send();
      ?>
  </div><!--form-group-->
</div><!--row-->
<div id="uploader">
<div class="row uploadDoc">
  <div class="col-sm-3">
  </div><!-- col-3 -->
  <div class="col-sm-8">
  </div><!--col-8-->
</div><!--row-->
</div><!--uploader-->
<div class="text-center">
<input type="submit" value="Subir" name="submit"class="btn btn-next">
</div>
</div><!--one-->
</div><!-- row -->
</div><!-- container -->
</form>



<form action="Text.php" method="post" autocomplete="off" enctype="multipart/form-data">
<div class="container">
<div class="row it">
<div class="col-sm-offset-1 col-sm-10" id="one" style="background-color: #fff;">
<p>
  Añada el texto que desea
</p>
  
<br>



<div class="row">
  <div class="col-sm-offset-4 col-sm-5 ">
    <h3>Agregar información nueva</h3>
  </div>
  <div class="col-sm-12">

    <input type="text" class="form-control" name="UploadText" placeholder="Escriba aqui el texto que desea añadir">
  </div><!--col-8-->
</div><!--row-->
<div id="uploader">
<div class="row uploadDoc">
  <div class="col-sm-3">
    <div class="docErr">Porfavor, suba un medio valido</div><!--error-->

  </div><!-- col-3 -->
  

</div><!--row-->

</div><!--uploader-->
<div class="text-center">

<input type="submit" value="Subir" name="submit"class="btn btn-next">

</div>
</div><!--one-->
</div><!-- row -->
</div><!-- container -->
</form>


<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type="text/javascript">
  var fileTypes = ['pdf', 'docx', 'rtf', 'jpg', 'jpeg', 'png', 'mp4'];  //acceptable file types
function readURL(input) {
    if (input.files && input.files[0]) {
        var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types

        if (isSuccess) { 
            var reader = new FileReader();
            reader.onload = function (e) {
                if (extension == 'pdf'){
                  $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/179/179483.svg');
                }
                else if (extension == 'docx'){
                  $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/281/281760.svg');
                }
                else if (extension == 'rtf'){
                  $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/136/136539.svg');
                }
                else if (extension == 'png'){ $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/136/136523.svg'); 
                }
                else if (extension == 'jpg' || extension == 'jpeg'){
                  $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/136/136524.svg');
                }
              else if (extension == 'mp4'){
                  $(input).closest('.fileUpload').find(".icon").attr('src','https://image.flaticon.com/icons/svg/136/136545.svg');
                }
                else {
                  //console.log('here=>'+$(input).closest('.uploadDoc').length);
                  $(input).closest('.uploadDoc').find(".docErr").slideUp('slow');
                }
            }

            reader.readAsDataURL(input.files[0]);
        }
        else {
            //console.log('here=>'+$(input).closest('.uploadDoc').find(".docErr").length);
            $(input).closest('.uploadDoc').find(".docErr").fadeIn();
            setTimeout(function() {
            $('.docErr').fadeOut('slow');
          }, 9000);
        }
    }
}
$(document).ready(function(){
   
   $(document).on('change','.up', function(){
    var id = $(this).attr('id'); /* gets the filepath and filename from the input */
     var profilePicValue = $(this).val();
     var fileNameStart = profilePicValue.lastIndexOf('\\'); /* finds the end of the filepath */
     profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0,20); /* isolates the filename */
    
     if (profilePicValue != '') {
      //console.log($(this).closest('.fileUpload').find('.upl').length);
        $(this).closest('.fileUpload').find('.upl').html(profilePicValue); /* changes the label text */
     }
   });

   $(".btn-new").on('click',function(){
        $("#uploader").append('<div class="row uploadDoc"><div class="col-sm-3"><div class="docErr">Please upload valid file</div><!--error--><div class="fileUpload btn btn-orange"> <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon"><span class="upl" id="upload">Subir Medio</span><input type="file" class="upload up" id="up" onchange="readURL(this);" /></div></div><div class="col-sm-8"></div><div class="col-sm-1"><a class="btn-check"><i class="fa fa-times"></i></a></div></div>');
   });
    
   $(document).on("click", "a.btn-check" , function() {
     if($(".uploadDoc").length>1){
        $(this).closest(".uploadDoc").remove();
      }else{
        alert("You have to upload at least one document.");
      } 
   });
});
</script>

</body>
</html>
