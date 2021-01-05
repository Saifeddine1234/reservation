<?php
session_start();

if(empty($_POST['nomcontact'])||empty($_POST['emailcontact'])||empty($_POST['msgcontact'])){

if(isset($_SESSION['budget'])){
	header("location:contact.php?budget=".$_GET['budget']."&error=Svp remplir tous les champs ");
}elseif(isset($_SESSION['budget'])==false){
	header("location:contact.php?error=Svp remplir tous les champs ");
}
}else{
include_once("connexion.inc.php");
$req="Insert into contact values(NULL,'".$_POST['nomcontact']."','".$_POST['emailcontact']."','".$_POST['msgcontact']."')";
$res= mysqli_query($conn,$req);
if(($res)&&(isset($_SESSION['budget']))){
	header("location:contact.php?budget=".$_GET['budget']."&contact=votre message est envoyer");
}elseif(($res)&&(isset($_SESSION['budget'])==false)){
	header("location:contact.php?contact=votre message est envoyer");
}else{
echo "error";
}
}
?>