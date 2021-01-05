<?php
include_once("connexion.inc.php");
$req="UPDATE pub SET name= '".$_POST['name']."',lien='".$_POST['lien']."' WHERE id='".$_POST['id']."'";
$res=mysqli_query($conn,$req);
if($res){
	header("location:affichepub.php");
}
	?>