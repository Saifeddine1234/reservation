<?php
include_once ("connexion.inc.php");
$reqt= "insert into pub (`name`, `Slide`, `lien`)values('".$_POST['nompub']."',slide,'".$_POST['urlpub']."')";
$res=mysqli_query($conn,$reqt);
$id=Mysqli_Insert_id($conn);
if ($res==1){
	header("Location: affichepub.php");
}
else echo ("erreur");
?>