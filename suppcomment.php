<?php
include_once("connexion.inc.php");
$req="DELETE from comment WHERE	
comment.`int`=".$_GET['id']; 
$res=mysqli_query($conn,$req);
if($res){
	header("location:affichecomment.php");
}else
	echo"echec de suppression";
?>