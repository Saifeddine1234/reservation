<?php
session_start();
?>
<?php
include_once("connexion.inc.php");

             $sql = 'SELECT * FROM client WHERE login="'.($_POST['login']).'" and mdp="'.($_POST['mdp']).'"';
             $req = mysqli_query($conn,$sql);
      
             if ( $data= mysqli_fetch_array($req))
			 {$_SESSION['login'] = $_POST['login'];
			 $_SESSION['mdp'] = $_POST['mdp'];
             header("location:clientpage.php?pseudo=".$data[2]." ".$data[1]."   ");
             }
             else {
               header("location:connect.html");
                 
             }	 
?>