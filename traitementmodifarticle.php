<?php
include_once("connexion.inc.php");
$req="UPDATE produit SET idp='".$_POST['idp']."',nomp='".$_POST['nomp']."',prixp='".$_POST['prixp']."',urlp='".$_POST['urlp']."',nomcat='".$_POST['nomcat']."',villep='".$_POST['villep']."',descp='".$_POST['descp']."' WHERE idp=".$_POST['idp'];
$res=mysqli_query($conn,$req);
if($res){
	header("location:afficheproduit.php");
}
	?>