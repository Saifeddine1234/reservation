<?php
include_once("connexion.inc.php");

$req="UPDATE client SET nomc='".$_POST['nomc']."',prenomc='".$_POST['prenomc']."',emailc='".$_POST['emailc']."',login='".$_POST['login']."',mdp='".$_POST['mdp']."' WHERE idc=".$_POST['idc']."";
$res=mysqli_query($conn,$req)or die (mysqli_error($conn));
if($res){
	header("location:afficheclient.php");
}
else
echo"error";
	?>