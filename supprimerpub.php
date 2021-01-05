<?php
include_once("connexion.inc.php");
$req="DELETE from pub WHERE	
id='".$_GET['id']."'";
$res=mysqli_query($conn,$req);
if($res){
	header("location:affichepub.php");
}else
	echo"echec de suppression";
?>