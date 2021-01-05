<?php
include_once("connexion.inc.php");
$req="DELETE from contact WHERE	
ID=".$_GET['ID'];
$res=mysqli_query($conn,$req);
if($res){
	header("location:contactadmin.php");
}else
	echo"echec de suppression";
?>
