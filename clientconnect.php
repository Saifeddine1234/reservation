<?php
include_once("connexion.inc.php");
 $sql = 'SELECT nomc,prenomc,login FROM client WHERE login="'.($_GET['login']);
           $req=Mysqli_query($conn,$sql) or die (mysqli_error($conn)); 
$raw=Mysqli_fetch_array($req,MYSQLI_NUM);
$nomc=$raw[0]; 	
$prenomc=$raw[1];	 
echo"Bienvenue".$nomc." ".$prenomc;
?>