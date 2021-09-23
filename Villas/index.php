<?php

   define('DB_SERVER', 'x');
   define('DB_USERNAME', 'x');
   define('DB_PASSWORD', 'x');
   define('DB_DATABASE', 'x');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   session_start();
   
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT x FROM x WHERE x = '$myusername' and x = '$mypassword'";
      $result = mysqli_query($db,$sql);

   while($row = mysqli_fetch_array($result)) {
            $idResult=$row['id_Usuario'];
   }

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         $_SESSION['id']  = $idResult;

         header("location: search.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
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

<body>

  <img src="logo.jpeg" class="logo" alt="">
  <form class="box" method="POST" action="">
    <h1>Acceder</h1>
    <input type="email" name="email" placeholder="Nombre de Usuario">
    <input type="password" name="pass" placeholder="Contraseña">
    <input type="submit" name="" value="Entrar">
  </form>

</body>

</html>