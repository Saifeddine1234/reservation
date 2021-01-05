<?php
include_once ("connexion.inc.php");
$reqt= "insert into categorie values('".$_POST['nomcat']."','".$_POST['imgsource']."')";
$res=mysqli_query($conn,$reqt);
$id=Mysqli_Insert_id($conn);
if ($res==1){
	header("Location: affichecategorie.php");
}
else echo ("erreur");
?>