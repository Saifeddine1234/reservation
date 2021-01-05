<?php
include_once("connexion.inc.php");
$req="DELETE from categorie WHERE	
categorie.nomcat='".$_GET['nomcat']."'";
$res=mysqli_query($conn,$req);
if($res){
	header("location:affichecategorie.php");
}else
	echo"echec de suppression";
?>