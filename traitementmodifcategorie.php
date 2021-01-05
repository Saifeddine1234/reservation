<?php
include_once("connexion.inc.php");
$req="UPDATE categorie SET nomcat= '".$_POST['nomcat']."',imgsource='".$_POST['imgsource']."' WHERE nomcat='".$_POST['nomcat']."'";
$res=mysqli_query($conn,$req);
if($res){
	header("location:affichecategorie.php");
}
	?>