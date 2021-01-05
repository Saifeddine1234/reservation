<?php
include_once("connexion.inc.php");

//- ------------------------------------------------------
$req="insert into inscription values('".$_POST['login']."','".$_POST['mdp']."')";
$res1=mysqli_query($conn,$req);
$reqt="insert into client values(null,'".$_POST['nomc']."','".$_POST['prenomc']."','".$_POST['emailc']."','".$_POST['login']."','".$_POST['mdp']."','".$_POST['num1']."','".$_POST['num2']."')";
$res=mysqli_query($conn,$reqt);
//$id=Mysqli_Insert_id($conn);
$bb = $_GET['budget'];
if ($res){
	if(isset($_SESSION['budget']))
    {
	header("Location:categorie.php?budget=20000");
	}else{
		header("Location:bud.php");
	}
	
	} else echo ("erreur");
?>