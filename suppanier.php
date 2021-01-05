<?php
include_once("connexion.inc.php");
$req="DELETE  from paniier";
$res=mysqli_query($conn,$req);
	header("location:affichepanier.php");

?>
