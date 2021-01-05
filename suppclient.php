<?php
include_once("connexion.inc.php");
$req="DELETE FROM `client` WHERE `client`.`idc`='".$_GET['idc']."'";
$res=mysqli_query($conn,$req);
if($res){
	header("location:contactadmin.php");
}else
	echo"echec de suppression";
?>