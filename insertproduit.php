<?php
include_once ("connexion.inc.php");
$reqt= "INSERT INTO produit values (NULL,'".$_POST['nomp']."','".$_POST['prixp']."','".$_POST['urlp']."','".$_POST['nomcat']."','".$_POST['souscat']."','".$_POST['villep']."','".$_POST['descp']."')";
$res=mysqli_query($conn,$reqt);
if ($res==1){
	header("Location: afficheproduit.php");
}
else echo ("erreur");
?>



