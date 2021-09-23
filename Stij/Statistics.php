<?php
session_start();
include "x.php";
 $varses=$_SESSION['x'];
if($varses == null || $varses = '' || $varses != "x"){
  header('location:index');
   die();



   require("phpsqlajax_dbinfo.php");



}
//Funcion para ordenar las fechas
function date_sort($a, $b) {
            return strtotime($a) - strtotime($b);
            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
  <title>Distribuidores</title>
  <link  rel="shortcut icon" type="logos/d.jpg" href="logos/d.jpg"  />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Stilos.css">
  <link rel="stylesheet" href="scss/bootstrap.min.css">
 <script src="scss/jquery.min.js"></script>
 <script src="scss/bootstrap.min.js"></script>

  <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

      //Maps y XML

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      
    </script>


    <style>
  .sticky-top .top .col-xs-4  img {
          width: 90px;
      }
      .sticky-top .top .col-xs-4  .log  {
          width: 75px;
      }
  .top thead tr th img {
          width: 100px;
      }
  .sticky-top .top .col-xs-4  a img {
          width: 32px;
      }


  .sticky-top .top2 .col-xs-4  img {
          width: 70px;
      }
      .sticky-top .top2 .col-xs-4  .log  {
          width: 50px;
      }
  .top2 thead tr th img {
          width: 80px;
      }
  .sticky-top .top2 .col-xs-4 a img {
          width: 25px;
      }
      .table-responsive .table thead th ,td{
        text-align: center;
        border: white 1px solid;
      }
      #v{
        text-align: center;
      }
      .sticky-top{
  position: fixed;
  width: 100%;
  }
  button{
border: none;
  }
  button:focus {
  outline: none;
}
    
 /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        width: 350px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
      #latlng {
        width: 225px;
      }

  </style>


</head>
<body >

<div class="col-lg-12">
  
<div class="sticky-top" >
    <div class="top" style="background-color: white">
      <div class="row">
          <div class="col-xs-4 text-left">
            <img src="logos/diamane.png"  alt="" id="uno" class="log" style="margin-left: 15px" >
          </div>
          <div class="col-xs-4 text-center">
              <img src="logos/logo stij.png" alt="" id="uno" style="margin-left: 15px" >
           </div>
          <div class="col-xs-4 text-right" style="margin-top:10px;">
          
       <label id="nombre" style="margin-right: 15px;">x <label for="" id="nombre" style="color:#486885 ">|</label> x
</label> 
            <a href="login/validar.php" ><img src="logos/exit.png"  alt="exit" style="margin-right: 15px;" ></a>
   
          </div>
      </div>

    </div> 

</div>
</div>

<script> 
if (screen.width < 600){
  divC = document.getElementById("nombre");
 
        divC.style.fontSize = 0.8+ "em";
       
}else{

}
  
</script>
<div class="container" style="margin-top: 150px">
<h2 class="bloq prim">Distribuidores </h2>
  
  <button type="button" class="btn-sm" onclick="window.location.href='RegistroDeDistribuidor'"  style="display: inline-block;">
  + Agregar Distribuidor
</button>

  <main role="main" class="container">
  <div class="row">
<div class="table-responsive">
      <table class="table" >
            <thead>
              <tr style="background-color: #486885;color:white;">
                  <th>ID</th> 
                  <th>Joyeria</th>
                  <th>Contacto</th> 
                  <th>Ciudad</th> 
                  <th>Telefono</th> 
                  <th>Correo</th> 
                  <th>Estatus</th> 
                  <th>Ventas</th> 
                  <th style="text-align: center">Operaciones</th> 
              </tr>
            </thead>
            <tbody>
            <?php
        

             $consulta= " SELECT * FROM x"; ;
              $ejecuta = mysqli_query($conn , $consulta) or die('Error'.mysqli_error($conn));
              while($row = $ejecuta->fetch_assoc()){

            ?>
              <tr class="table-active">
       
                <td><?php echo $row['x']?></td>
                <td><?php echo $row['x']?></td>
                <td><?php echo $row['x']?></td>
                <td><?php echo $row['x']?></td>
                <td><?php echo $row['x']?></td>
                <td><?php echo $row['x']?></td>
                <td><?php echo $row['x']?></td>

                <?php
                      $iden=$row['id'];
                    
                      $sql =current($conn->query("SELECT COUNT(*) from x WHERE x=$iden")->fetch_assoc());
                      $num =$sql;
                      ?>

                <td id="v"><?php echo $num?></td>
            
                <form action="ventas" method="post">
                <td style="text-align: center">
                <button type="submit" name="ver"><a><img src="logos/listas.png" alt="Lista"  title="Ventas" width="20px"></a></button>
                <button type="button" name="ver"><a href="ConsultaProveedor?ide=<?php echo $row['x']?>"><img src="logos/ver.png" alt="ver"  title="Detalles" width="20px"></a></button>
                <input type="text" value="<?php echo $row['x']?>" name="ide" style="display: none"> 
                <button name="edit" type="button"><a href="ActualizarDistribuidor?ide=<?php echo $row['x']?>"><img src="logos/edit.png" alt="ver" title="Editar" width="20px"></a></button>

                <button type="button" data-toggle="modal" data-target="#<?php echo $row['x']?>">
              <img src="logos/del.png" width="20px" title="Eliminar" alt="">
                </button>
                <button type="button" data-toggle="modal" data-target="#<?php echo $row['x']?>Stat">
                        <img src="logos/Statistics.png" title="Graphs" width="20px" alt="Stats">
                      </button>
     
                                            <!-- Modal -->
      <div class="modal fade" id="<?php echo $row['x']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" width = >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <P>¿Esta seguro que desea eliminar al proveedor <?php echo $row['x']?> ?</P>
              <input type="text" style="display: none" name="id" value="<?php echo $row['x']?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" name="del" class="btn btn-primary">Confirmar</button>
            </div>
          </div>
        </div>
      </div>
                                            <!-- Fin Modal -->

                 <!-- Modal Stats -->                            
                <div class="modal fadeStat" style="width: 100%" id="<?php echo $row['x']?>Stat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 99vw; margin-left: 0vw">
          <div class="modal-content"style="background-color: #efeff1; width: 99vw;"  >
            <div class="modal-header" style="width: 99vw;">
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <h2 class="modal-title" id="exampleModalLongTitle"align="center"><P>Estadisticas de <?php echo $row['x']?></P></h1>
            <div class="modal-body">

            
            <?php
            //Consultar los datos de un proovedor en la tabla de anillos
            $id_prov=$row['x'];
            $consulta_anillos="SELECT * FROM x WHERE x='$id_prov'";
            $Exec=mysqli_query($conn,$consulta_anillos) or die ('Error'.mysqli_error($conn));
            $anillo_count=0;
            //cuenta los anillos que ha vendido el proovedor
            while($row_ani = $Exec->fetch_assoc())
            {
              $anillo_count++;
            }
            //Cuenta las sesiones activas de los clientes del proveedor
            $consulta_sesion="SELECT * from x WHERE x=1 && x='$x'";
            $ExecTemp=mysqli_query($conn,$consulta_sesion) or die ('Error'.mysqli_error($conn));
            $sesion_activa=0;
            while($row_sess = $ExecTemp->fetch_assoc())
            {
              $sesion_activa++;
            }
            //Estadistica de la tasa de interaccion
            $tasa_interaccion=($sesion_activa/$anillo_count)*100;
            //Stats individuales en la parte superior del modal
              echo("<br><div style='border: 1px solid #ccc;background-color: #fff; float:left; width:23.5%; margin-left:1%;height:135px;'><div style='border: 1px solid #ccc;background-color: #fff;'><img src='logos/Group.png' width='5%' align='left' style='margin:10px 0px 0px 10px;'><h4>Escaneos activos </div></h4> <h1>".$sesion_activa."</h1><h5>Joyas</h5> </div>"
                  ."<div style='border: 1px solid #ccc;background-color: #fff; float:left; width:24%; margin-left:1%;height:135px;'><div style='border: 1px solid #ccc;background-color: #fff'><img src='logos/ver.png' width='5%' align='left' style='margin:10px 0px 0px 10px;'><h4>Joyas activas </div></h4> <h1>".$anillo_count."</h1><h5>Joyas</h5> </div>
                  "."<div style='border: 1px solid #ccc;background-color: #fff; float:left; width:24%; margin-left:1%;height:135px;'><div style='border: 1px solid #ccc;background-color: #fff'><img src='logos/magic-wand.png' width='5%' align='left' style='margin:10px 0px 0px 10px;'><h4>Joyas activas </div></h4> <h1>".$tasa_interaccion."%</h1></div>") ;
            //Consulta todas las fechas de sesion en la tabla sesion
            $arr = array(); 
            $arrUb = array(); 
            $consultaUbicacion= "SELECT * From x WHERE x='$id_prov'";
            $EjecucionUb=mysqli_query($conn,$consultaUbicacion) or die ('Error'.mysqli_error($conn));
            while($rowUb = $EjecucionUb-> fetch_assoc()){
              array_push($arrUb,$rowUb["Ciudad"]);
            }

            $consultaInteraccion= "SELECT x From x WHERE x='$id_prov'";
            $EjecucionIn=mysqli_query($conn,$consultaInteraccion) or die ('Error'.mysqli_error($conn));
           
            while($rowIn = $EjecucionIn->fetch_assoc()) 
            {
              array_push($arr, $rowIn["fecha"]);
            }
            //Ordena las fechas, la mas reciente esta en la ultima posicion
            usort($arr, "date_sort");
            //Si hay datos de sesiones anteriores 
            if(count($arr)>0)
            {
              

              $consultaTiempo= "SELECT x From x WHERE x='$id_prov'";
              $EjecucionTiempo=mysqli_query($conn,$consultaTiempo) or die ('Error'.mysqli_error($conn));
              $tiempoTotal=0.0;
              $totalSesiones=0;
              while($rowTm = $EjecucionTiempo->fetch_assoc()) 
              {
                $tiempoTotal+=$rowTm["tiempo"];
                $totalSesiones++;
              }

              echo ("<div style='border: 1px solid #ccc;background-color: #fff; float:left; width:23.5%; margin-left:1%;height:135px;'><div style='border: 1px solid #ccc;background-color: #fff'><img src='logos/Clock.png' width='5%' align='left' style='margin:10px 0px 0px 10px;'><h4>Tiempo promedio </div></h4> <h1>".number_format($tiempoTotal/($totalSesiones), 2)."</h1><h5>segundos</h5> </div>");

              echo ("<div class='modal-header'></div><div style='border: 1px solid #ccc;background-color: #fff; float:left; width:23.5%; margin-left:1%;height:135px;'><div style='border: 1px solid #ccc;background-color: #fff'><img src='logos/Clock.png' width='5%' align='left' style='margin:10px 0px 0px 10px;'><h4>Ultimo escaneo </div></h4> <h1>".$arr[count($arr)-1]."</h1><h5>Fecha</h5> </div>");

              echo ("<div style='border: 1px solid #ccc;background-color: #fff; float:left; width:23.5%; margin-left:1%;height:135px;'><div style='border: 1px solid #ccc;background-color: #fff'><img src='logos/magic-wand.png' width='5%' align='left' style='margin:10px 0px 0px 10px;'><h4>Ultimo escaneo </div></h4> <h1>".$arrUb[count($arrUb)-1]."</h1><h5>Lugar</h5> </div></div>");


              $consultaAcciones = "SELECT * FROM x WHERE x = '$id_prov'";
              $EjecucionAcciones = mysqli_query($conn,$consultaAcciones) or die ('Error'.mysqli_error($conn));
              $arrAcciones = array();
              while($rowAcciones = $EjecucionAcciones->fetch_assoc()) 
              {
                array_push($arrAcciones, $rowAcciones["accion_tipo"]);
              }


              $consultaCiudades = "SELECT * FROM x WHERE x = '$id_prov'";
              $EjecucionCiudades = mysqli_query($conn,$consultaCiudades) or die ('Error'.mysqli_error($conn));
              $arrCiudades = array();
              $arrPaises = array();
              while($rowCiudades = $EjecucionCiudades->fetch_assoc()) 
              {
                array_push($arrCiudades, $rowCiudades["Ciudad"]);
                array_push($arrPaises, $rowCiudades["Pais"]);
              }



              $consultaPerdidos = "SELECT * FROM x WHERE x = '$id_prov'";
              $EjecucionPerdidos = mysqli_query($conn,$consultaPerdidos) or die ('Error'.mysqli_error($conn));
              $arrPerdidos = array();
              while($rowPerdidos = $EjecucionPerdidos->fetch_assoc()) 
              {
                array_push($arrPerdidos, $rowPerdidos["tipoRep"]);
              }

              $consultaGenero = "SELECT * FROM x WHERE x = '$id_prov'";
              $EjecucionGenero = mysqli_query($conn,$consultaGenero) or die ('Error'.mysqli_error($conn));
              $arrGenero = array();
              while($rowGenero = $EjecucionGenero->fetch_assoc()) 
              {
                array_push($arrGenero, $rowGenero["genero"]);
              }

              $consultaEdad = "SELECT * FROM x WHERE x = '$id_prov'";
              $EjecucionEdad = mysqli_query($conn,$consultaEdad) or die ('Error'.mysqli_error($conn));
              $arrEdad = array();
              while($rowEdad = $EjecucionEdad->fetch_assoc()) 
              {
                array_push($arrEdad, $rowEdad["cumple_uno"]);
              }

              $consultaSO = "SELECT * FROM x WHERE x = '$id_prov'";
              $EjecucionSO = mysqli_query($conn,$consultaSO) or die ('Error'.mysqli_error($conn));
              $arrSO = array();
              while($rowSO = $EjecucionSO->fetch_assoc()) 
              {
                array_push($arrSO, $rowSO["SO"]);
              }

              ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawDateChart<?php echo $id_prov; ?>);
      google.charts.setOnLoadCallback(drawActionChart<?php echo $id_prov; ?>);
      google.charts.setOnLoadCallback(drawCityChart<?php echo $id_prov; ?>);
      google.charts.setOnLoadCallback(drawCountryChart<?php echo $id_prov; ?>);
      google.charts.setOnLoadCallback(drawPerChart<?php echo $id_prov; ?>);
      google.charts.setOnLoadCallback(drawGenderChart<?php echo $id_prov; ?>);
      google.charts.setOnLoadCallback(drawAgeChart<?php echo $id_prov; ?>);
      google.charts.setOnLoadCallback(drawOSChart<?php echo $id_prov; ?>);

      // Callback that draws the chart for sessions.
      function drawDateChart<?php echo $id_prov; ?>() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Fecha');
        data.addColumn('number', 'Sesiones');
        data.addRows([

<?php  
//Sistema para introducir datos a la chart
$array2=(array_count_values($arr));

$array2Keys=(array_keys($array2));
$array2Lenght=count($array2);
$c=0;

while($c<$array2Lenght)
{
  echo("['".$array2Keys[$c]."',".$array2[$array2Keys[$c]]."],");
  $c++;

}
?>

        ]);

        // Set options for Date chart.
        var options = {title:'Distribucion de sesiones de usuario a traves del tiempo',
                       width:600,
                       height:500,
                       colors: ['#28965a'],
                       backgroundColor: '#e9e9ed',

                     };

        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById("DateChart<?php echo $id_prov;?>"));
        chart.draw(data, options);
      }


function drawActionChart<?php echo $id_prov; ?>() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Accion');
        data.addColumn('number', 'Repeticiones');
        data.addRows([

<?php  
//Sistema para introducir datos a la chart
$array2Acciones=(array_count_values($arrAcciones));

$array2AccionesKeys=(array_keys($array2Acciones));


$array2AccionesLenght=count($array2Acciones);
$c=0;
while($c<$array2AccionesLenght)
{

switch ($array2AccionesKeys[$c]) 
  {
    case 0:
      $AccionesKey="Cambio de propietario";
      break;
    case 1:
      $AccionesKey="Solicitud de chat";
      break;
    case 2:
      $AccionesKey="Reporte de robo";
      break;
    case 3:
      $AccionesKey="Reporte de extravío";
      break;
    case 4:
      $AccionesKey="Solicitud de reventa";
      break;
    case 5:
      $AccionesKey="Subir una foto";
      break;
    case 6:
      $AccionesKey="Subir vídeo";
      break;
    case 7:
      $AccionesKey="Añadir un com";
      break;
    case 8:
      $AccionesKey="Editar como";
      break;
    case 9:
      $AccionesKey="Eliminar com";
      break;
    case 10:
      $AccionesKey="Click al pop-Up";
      break;
    default:
      
      break;
  }
  echo("['".$AccionesKey."',".$array2Acciones[$array2AccionesKeys[$c]]."],");

  

  $c++;
}
?>

        ]);

        // Set options for Date chart.
        var options = {title:'Acciones realizadas por los usuarios',
                       width:600,
                       height:500,
                       colors:['#28965a','#2a6041', 'green','#4CB944','#6EEB83','#32965d','#68a357','#20bf55'],
                       backgroundColor: '#e9e9ed'
                     };

        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById("ActionChart<?php echo $id_prov;?>"));
        chart.draw(data, options);
      }


function drawCityChart<?php echo $id_prov; ?>() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Ciudad');
        data.addColumn('number', 'Accesos');
        data.addRows([

<?php  
//Sistema para introducir datos a la chart
$array2Ciudades=(array_count_values($arrCiudades));

$array2CiudadesKeys=(array_keys($array2Ciudades));
$array2CiudadesLenght=count($array2Ciudades);
$c=0;
while($c<$array2CiudadesLenght)
{
  echo("['".$array2CiudadesKeys[$c]."',".$array2Ciudades[$array2CiudadesKeys[$c]]."],");
  $c++;
}
?>
        ]);
        // Set options for Date chart.
        var options = {title:'Distribucion de sesiones por ciudad',
                       width:600,
                       height:500
                     ,colors: ['28965a'],
                       backgroundColor: '#e9e9ed'
                   };
        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById("CityChart<?php echo $id_prov;?>"));
        chart.draw(data, options);
      }

function drawCountryChart<?php echo $id_prov; ?>() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Pais');
        data.addColumn('number', 'Accesos');
        data.addRows([

<?php  
//Sistema para introducir datos a la chart
$array2Paises=(array_count_values($arrPaises));

$array2PaisesKeys=(array_keys($array2Paises));
$array2PaisesLenght=count($array2Paises);
$c=0;
while($c<$array2PaisesLenght)
{
  echo("['".$array2PaisesKeys[$c]."',".$array2Paises[$array2PaisesKeys[$c]]."],");
  $c++;
}
?>
        ]);
        // Set options for Date chart.
        var options = {title:'Distribucion de sesiones por pais',
                       width:600,
                       height:500
                       ,colors: ['28965a'],
                       backgroundColor: '#e9e9ed'
                     };
        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById("CountryChart<?php echo $id_prov;?>"));
        chart.draw(data, options);
      }


function drawPerChart<?php echo $id_prov; ?>() {
var data = new google.visualization.DataTable();
        data.addColumn('string', 'Caso');
        data.addColumn('number', 'Repeticiones');
        data.addRows([

<?php  
//Sistema para introducir datos a la chart
$array2Per=(array_count_values($arrPerdidos));
$array2PerKeys=(array_keys($array2Per));
$array2PerLenght=count($array2Per);

$c=0;
while($c<$array2PerLenght)
{
  if($array2PerKeys[$c]=="1"){
echo("['Perdidas',".$array2Per[$c] ."],");
  }
  else{
    echo("['Robadas',".$array2Per[$c] ."],");
  }
  
  $c++;
}

?>
        ]);
        // Set options for Date chart.
        var options = {

                       title:'Joyas perdidas o robadas',
                       width:600,
                       height:500
                     ,colors: ['28965a'],
                       backgroundColor: '#e9e9ed'
                       
                   };
        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById("PerChart<?php echo $id_prov;?>"));
        chart.draw(data, options);
      }

function drawGenderChart<?php echo $id_prov; ?>() {
var data = new google.visualization.DataTable();
        data.addColumn('string', 'Genero');
        data.addColumn('number', 'Total');
        data.addRows([

<?php  
//Sistema para introducir datos a la chart
$array2Genero=(array_count_values($arrGenero));
$array2GeneroKeys=(array_keys($array2Genero));
$array2GeneroLenght=count($array2Genero);

$c=0;
while($c<$array2GeneroLenght)
{
  if($array2GeneroKeys[$c]=="1"){
echo("['Hombre',".$array2Genero[$c] ."],");
  }
  else{
    echo("['Mujer',".$array2Genero[$c] ."],");
  }
  
  $c++;
}

?>
        ]);
        // Set options for Date chart.
        var options = {title:'Distribucion de clientes por genero',
                       width:600,
                       height:500,
                       colors:['#2a6041', 'green'],
                       is3D: true,
                       backgroundColor: '#e9e9ed'
                     };
        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById("GenderChart<?php echo $id_prov;?>"));
        chart.draw(data, options);
      }



function drawAgeChart<?php echo $id_prov; ?>() {
var data = new google.visualization.DataTable();
        data.addColumn('string', 'Rango de edad');
        data.addColumn('number', 'Usuarios');
        data.addRows([

<?php  
//Sistema para introducir datos a la chart
$array2Edad=(array_count_values($arrEdad));
$array2EdadKeys=(array_keys($array2Edad));

$array2EdadLenght=count($array2Edad);

$c=0;
$niño = 0;
$joven = 0;
$adul = 0;
$adulMay = 0;
while($c<$array2EdadLenght)
{
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = $arrEdad[$c];
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $one =1;
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1): (date("Y") - $birthDate[2]));
  //$age=12;
if($age>=0&& $age<=15)
{
    $niño++;
}
if($age>=16&& $age<=35)
{
    $joven++;
}
if($age>=36&& $age<=55)
{
    $adul++;
}
if($age>=56)
{
    $adulMay++;
}
//echo("['12', 1],");
  $c++;
}
echo("['"."Niño"."',". $niño ."],");
echo("['"."Joven"."',". $joven ."],");
echo("['"."Adulto"."',". $adul ."],");
echo("['"."Adulto Mayor"."',". $adulMay ."],");
?>
        ]);
        // Set options for Date chart.
        var options = {title:'Distribucion de clientes por edad',
                       width:600,
                       height:500,
                       colors: ['#5bba6f', '#3fa34d', '#2a9134', '#137547', '#054a29'],
                       is3D: true,
                       backgroundColor: '#e9e9ed'
                     };
        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById("AgeChart<?php echo $id_prov;?>"));
        chart.draw(data, options);
      }


function drawOSChart<?php echo $id_prov; ?>() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Sistema operativo');
        data.addColumn('number', 'Sesiones');
        data.addRows([

<?php  
$array2SO=(array_count_values($arrSO));

$array2SOKeys=(array_keys($array2SO));


$array2SOLenght=count($array2SO);
$c=0;
while($c<$array2SOLenght)
{

switch ($array2SOKeys[$c]) 
  {
    case 0:
      $SOKey="IOS";
      break;
    case 1:
      $SOKey="Android";
      break;
    case 2:
      $SOKey="otro";
      break;
    
    default:
      
      break;
  }
  echo("['".$SOKey."',".$array2SO[$array2SOKeys[$c]]."],");

  

  $c++;
}
?>

        ]);

        // Set options for Date chart.
        var options = {title:'Sesiones de usuarios por sistema operativo de acceso',
                       width:600,
                       height:500,
                       colors: ['#5bba6f', '#3fa34d', '#2a9134', '#137547', '#054a29'],
                       is3D: true,
                       backgroundColor: '#e9e9ed'
                     };

        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById("drawOSChart<?php echo $id_prov; ?>"));
        chart.draw(data, options);
}

//Final de las graficas
    </script>
            <?php
          }
            //Si no hay datos de sesiones anteriores 
            else
            {
              echo ("<div class='modal-body'>No hay datos de interaccion de los ultimos 3 meses ");
            }
            ?>


 



<div class="modal-body">
  <!--Charts Divs -->
<div id="DateChart<?php echo $id_prov;?>" style="border: 1px solid #ccc; background-color: #e9e9ed ; float:left; width:46vw; margin-left: 3%; "></div>
<div id="ActionChart<?php echo $id_prov;?>" style="border: 1px solid #ccc; background-color: #e9e9ed; float:left; width:46vw; "></div>
<div id="CityChart<?php echo $id_prov;?>" style="border: 1px solid #ccc; background-color: #e9e9ed; float:left; width:46vw; margin-left: 3%;"></div>
<div id="CountryChart<?php echo $id_prov;?>" style="border: 1px solid #ccc; background-color: #e9e9ed; float:left; width:46vw; "></div>
<div id="PerChart<?php echo $id_prov;?>" style="border: 1px solid #ccc; background-color: #e9e9ed; float:left; width:46vw; margin-left: 3%;"></div>
<div id="GenderChart<?php echo $id_prov;?>" style="border: 1px solid #ccc; background-color: #e9e9ed; float:left; width:46vw; "></div>
<div id="AgeChart<?php echo $id_prov;?>" style="border: 1px solid #ccc; background-color: #e9e9ed; float:left; width:46vw; margin-left: 3%;"></div>
<div id="drawOSChart<?php echo $id_prov; ?>" style="border: 1px solid #ccc; background-color: #e9e9ed; float:left; width:46vw;"></div>

</div>
            <input type="text" style="display: none;" name="n_ticket" value="<?php echo $row['x']?>">
            
            <input type="text" name="ide_v"  style="display: none"value="<?php echo $row['x']?>">
            </div>
            </div>
          </div>
        </div>
      </div>                                          
                </td>
              </tr>
            </form>
          <?php
              }
          ?>

            </tbody>
            
            </table>
  </div>
  </main>

</div>
<center>
  

<footer>
<p >  <a href="http://www.diamane.mx" target="_blank" style="color:#486885;">DIAMANE</a>  - STIJ Sistema de Trasmisión de Información Joyera 
     <a href="" style="color:#486885;">|</a>
     <a href="logos/pri.pdf"  style="color:#486885;" download="AvisoDePrivacidad">
Aviso De Privacidad
</a>
</p>
<?php
/*
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


    

$consultaMapa="SELECT * FROM mapa WHERE 1";
$EjecucionMapa=mysqli_query($conn,$consultaMapa) or die ('Error'.mysqli_error($conn));


//header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($rowMap = @mysqli_fetch_assoc($EjecucionMapa)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $rowMap['id_mapa'] . '" ';
  echo 'id_Anillo="' . parseToXML($rowMap['id_anillo']) . '" ';
  echo 'lat="' . $rowMap['latitud'] . '" ';
  echo 'lng="' . $rowMap['longitud'] . '" ';
  echo 'id_Proveedor="' . $rowMap['id_proveedor'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}
//print_r($rowMap);

echo '</markers>';*/
?>

</center>

    <!-- <div id="map"></div> -->
    

</div>

</body>

<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
  
 $(document).ready(function(){
 
 $(window).scroll(function(){
     if( $(this).scrollTop() > 0 ){
         $('div').addClass('top2');
     } else {
         $('div').removeClass('top2');
     }
 });

});

</script>
</html>


 