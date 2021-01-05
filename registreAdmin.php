<head>
<link rel="stylesheet" type="text/css" href="theme.css">

     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  </head>
<div class="container" style="margin-top: 100px;" align="center">
<?php
session_start();
?>
<?php
include_once("connexion.inc.php");


 // on recherche si ce login est déjà utilisé par un autre membre
 
             $sql = 'SELECT * FROM admin WHERE emaila="'.($_POST['emaila']).'" and mdpa="'.($_POST['mdpa']).'"';
             $req = mysqli_query($conn,$sql) or die(mysqli_error());
      
             if ( $data= mysqli_fetch_array($req))
			 {$_SESSION['emaila'] = $_POST['emaila'];
		 $_SESSION['mdpa'] = $_POST['mdpa'];			 
echo"felicitation vous etes connecté- ADMIN-- ";
header("Location:aceuill.php");
             }
             else {

                echo"<h2 class='p-3 mb-2 bg-danger text-white'align='center''> Email ou mot de passe est incorrect.</h2>";
                echo"<a  href='connectAdmin.html'><input style='width:100%;' type=button value=retour></a>";
             }
			 
?>
</div>