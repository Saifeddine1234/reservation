
<?php
$blog=1;
include_once("connexion.inc.php");
$req="UPDATE client SET bloquage='".$blog."' WHERE idc=".$_GET['idc']."";
$res=mysqli_query($conn,$req)or die (mysqli_error($conn));
if($res){
	header("location:afficheclient.php");
}
else
echo"error";
	?>