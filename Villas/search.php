<?php
session_start();

if(!isset($_SESSION['id'])){
  header('location: index.php');
  exit();
}

?>

<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Villas Del Fresno</title>
  <link rel="stylesheet" href="searchStyle.css">

  <link rel="icon" href="x" sizes="32x32">
</head>

<body>

  <div class="imgContainer"><img src="logo.jpeg" class="logo" alt=""></div>
  <div class="container">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca por nombre, dirección o teléfono celular..." title="Type in a name" class="ininputable" autocomplete="off">
    <table id="myTable" align="center">
      <tr >
        <th  colspan="9">Información básica</th>
        <th  colspan="3">Status de pago</th>
      </tr>
      <tr class="clientes">
        <th style="width:20%;">Nombre</th>
        <th style="width:8%;">Contrato/Carta Posesion</th>
        <th style="width:8%;">Escritura</th>
        <th style="width:8%;">INE</th>
        <th style="width:8%;">Pagare</th>
        <th style="width:8%;">Recibo</th>
        <th style="width:5%;">Manzana</th>
        <th style="width:5%;">Lote</th>
        <th style="width:9%;">Forma de pago</th>
        <th style="width:7%;">Apartado</th>
        <th style="width:7%;">Enganche</th>
        <th style="width:7%;">Liquidado</th>
      </tr>
      <?php
        
          $conectar=@mysqli_connect('x','x','x');
        if(!$conectar){
          
        }else{
          $base=mysqli_select_db($conectar,'x');
        if(!$base){
          
          }
        }
        $query = "SELECT * FROM x";
        $result = mysqli_query($conectar, $query );
          $numero = 0;
        while ($row = mysqli_fetch_array($result)) 
        {
          echo "<tr onclick=\"myFunction4('". $row["x"]."', '".$row["x"]."','".$row["x"]."', '".$row["numero_Terreno"]."')\">";
          echo "<td width=\"20%\"><font face=\"Arial\">" . $row ["x"] . "</font></td>";

          if($row ["x"])
         echo "<td width=\"8%\"><font face=\"Arial\"><a href=\"" . $row ["x"] . "\" target=\"_blank\" > <img src=\"https://image.flaticon.com/icons/svg/179/179483.svg\" class=\"icon\" width=\"50\"> <font face=\"Arial\" style=\"font-size:10;\"> </font></a></td>";
       else{
        echo "<td width=\"8%\" height=\"50\" class = \"redCell\"> <font face=\"Arial\"><font face=\"Arial\" style=\"font-size:10;\"> No se ha subido el contrato</font></td>";
       }
       
       if($row ["x"])
         echo "<td width=\"8%\" ><font face=\"Arial\"><a href=\"" . $row ["x"] . "\" target=\"_blank\" > <img src=\"https://image.flaticon.com/icons/svg/179/179483.svg\" class=\"icon\" width=\"50\"> <font face=\"Arial\" style=\"font-size:10;\"> </font></a></td>";
       else{
        echo "<td width=\"8%\" height=\"50\" class = \"redCell\"> <font face=\"Arial\"><font face=\"Arial\" style=\"font-size:10;\"> No se ha subido la escritura</font></td>";
       }

      if($row ["x"])
         echo "<td width=\"8%\" ><font face=\"Arial\"><a href=\"" . $row ["x"] . "\" target=\"_blank\" > <img src=\"https://image.flaticon.com/icons/svg/179/179483.svg\" class=\"icon\" width=\"50\"> <font face=\"Arial\" style=\"font-size:10;\"> </font></a></td>";
       else{
        echo "<td width=\"8%\" height=\"50\" class = \"redCell\"> <font face=\"Arial\"><font face=\"Arial\" style=\"font-size:10;\"> No se ha subido la INE</font></td>";
       }

       if($row ["x"])
         echo "<td width=\"8%\" ><font face=\"Arial\"><a href=\"" . $row ["x"] . "\" target=\"_blank\" > <img src=\"https://image.flaticon.com/icons/svg/179/179483.svg\" class=\"icon\" width=\"50\"> <font face=\"Arial\" style=\"font-size:10;\"> </font></a></td>";
       else{
        echo "<td width=\"8%\" height=\"50\" class = \"redCell\"> <font face=\"Arial\"><font face=\"Arial\" style=\"font-size:10;\"> No se ha subido ningun pagare</font></td>";
       }

       if($row ["x"])
         echo "<td width=\"8%\" ><font face=\"Arial\"><a href=\"" . $row ["x"] . "\" target=\"_blank\" > <img src=\"https://image.flaticon.com/icons/svg/179/179483.svg\" class=\"icon\" width=\"50\"> <font face=\"Arial\" style=\"font-size:10;\"> </font></a></td>";
       else{
        echo "<td width=\"8%\" height=\"50\" class = \"redCell\"> <font face=\"Arial\"><font face=\"Arial\" style=\"font-size:10;\"> No se ha subido ningun recibo</font></td>";
       }


         
         echo "<td width=\"5%\"><font face=\"Arial\">" . $row ["x"] . "</font></td>";
         echo "<td width=\"5%\"><font face=\"Arial\">" . $row ["x"] . "</font></td>";
         echo "<td width=\"9%\"><font face=\"Arial\">" . $row ["x"] . "</font></td>";
         echo "<td width=\"7%\"><font face=\"Arial\">" . $row ["x"] . "</font></td>";
         echo "<td width=\"7%\"><font face=\"Arial\">" . $row ["x"] . "</font></td>";
         echo "<td width=\"7%\"><font face=\"Arial\">" . $row ["x"] . "</font></td></tr>";
         
          //echo "<td width=\"10%\"><button onclick=\"myFunction4('".$numero."', '". $row["ID"]."', '".$row["Score"]."', '".$row["Name"]."', '".$row["Author"]."')\" style=\"width:100%; border-radius:50%; border: none; background-color: Transparent; outline:none; \" class=\"myBtn\" name=\"mao\" type=\"submit\" value=\"" . $row ["ID"] . "\"><img src=\"eye.png\" width=\"20px\" height=\"20px\"></button></td>";
      
          $numero++;
        }
        echo "<tr class=\"clientes\"><td colspan=\"15\"><font face=\"Arial\"><b>Clientes: " . $numero . "<b></font></td></tr>";
        mysqli_free_result($result);
        mysqli_close($conectar);
        ?>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    td2 = tr[i].getElementsByTagName("td")[1];
    td3 = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
</table>
  </div>

  <div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <form action="invoice.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="idCliente" id="sem" value="hola">
    <div align="right"><p onclick="document.getElementById('myModal').style.display='none'" style="font-size: 2vh;cursor: pointer;">&times;</p></div>

    <label id="clientName" value="Varios" align="center">Hola</label><br>
    <label id="terrain" value="La Biblia" align="center">Hola Hola</label><br>
    <label id="apple" value="La Biblia 2" align="center">Hola Hola</label><br>

<br>
<div>
<br>

<input type="submit" <?php $check=$_SESSION['id']; if($check!=1&&$check!=4){echo "style=\"visibility:hidden;\"";} ?>class="button buttonBlue" value="Añadir factura">
<br><br>
<div align="center">
<table id="ReseñasTable" width="20%">
  <?php
  
    
       
  $query = "SELECT x, x, x FROM x";
  $result = mysqli_query($conectar, $query );
  $numero = 0;
  while ($row = mysqli_fetch_array($result)) 
  {
    echo "<tr class=\"tron\"><td class=\"teddo\" width=\"1px\" height=\"60px\" style=\"display:none;\">" . $row ["x"] . "</td>";

    echo "<td style=\"text-align:center;\" width=\"100%\" height=\"60px\" colspan=\"2\"><a href=\"" . $row ["x"] . "\" target=\"_blank\" > <img src=\"https://image.flaticon.com/icons/svg/179/179483.svg\" class=\"icon\" width=\"50\"> <BR><font face=\"Arial\" style=\"font-size:10;\">" . $row ["x"] . " </font></a></td> </tr>";

    $numero++;
  }
  
  mysqli_free_result($result);
  mysqli_close($conectar);
  ?>
</table>


</div>



</form>
<form action="modify.php" method="POST"  enctype="multipart/form-data">

<input type="hidden" name="idCliente" id="sem2" value="hola">

<input type="submit" <?php $check=$_SESSION['id']; if($check!=1&&$check!=4){echo "style=\"visibility:hidden;\"";} ?>class="button buttonBlue" value="Modificar cliente">

</form>
  </div>
    </div>
  </form>
</div>
</div>
<form  class="boxs" action="Add.php">
    <h1>Acceder</h1>
    
    <input class="changeButton" type="submit" name="" value="Añadir clientes">
  </form>

  <form  class="boxs" action="Add.php" >
    <h1>Acceder</h1>
    
    
  </form>
</body>

<script>

  var modal = document.getElementById("myModal");

  function myFunction4(indie, name, apple, terrain){
  modal.style.display = "block";
  var ham = document.getElementById("sem");
  var ham2 = document.getElementById("sem2");
  ham.value=indie;
  ham2.value=indie;

  var bookname = document.getElementById("clientName");
  bookname.innerText = name;

  var authorname = document.getElementById("terrain");
  authorname.innerText = "Terreno: "+terrain;
   
    var appleNumber = document.getElementById("apple");
  appleNumber.innerText = "Manzana: "+apple;


  var filter, table, tr, td, i;
  filter = indie;
  table = document.getElementById("ReseñasTable");
  //tr = table.getElementsByTagName("tr");
  tr = table.getElementsByClassName("tron");
 
  for (i = 0; i < tr.length; i++) {
    //td = tr[i].getElementsByTagName("td")[0];
    td = tr[i].getElementsByClassName("teddo")[0];
    if (td) {
      if (td.innerText.toUpperCase()==filter) {
        tr[i].style.display = "";
      } else {
      tr[i].style.display = "none";
      }
    } 
  }


}

  </script>
</html>