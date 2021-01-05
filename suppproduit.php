<?php
include_once("connexion.inc.php");
$req="DELETE from produit WHERE idp=".$_GET['idp'];
$res=mysqli_query($conn,$req);
if($res){
	header("location:afficheproduit.php");
}
?>