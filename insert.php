<?php
include_once("connexion.inc.php");
$error1="";
$error2="";
$error3="";
$error5="";
$error4="";
$error6="";

//------------------- email controle -------------------

// define variables and set to empty values

  if (empty($_POST["nomc"])) {
    $nomE = "Name is required";
  
  } else {
   if (!preg_match("/^[a-zA-Z ]*$/", $_POST['nomc'])) {
      $nomE = "Only letters and white space allowed";
       $error1="nom ne contient pas des chiffres";
  }
}

 if (empty($_POST["prenomc"])) {
    $prenomE = "Name is required";
  
  } else {
   if (!preg_match("/^[a-zA-Z ]*$/", $_POST['prenomc'])) {
      $prenomE = "Only letters and white space allowed";
       $error2="prenom ne contient pas des chiffres";
  }
}


  if ( !(preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $_POST['emailc'] )) ) {
    $emailE = "Email is required";
       $error3="Email is required";

  }

   if(strlen($_POST['telc'])<8){
    $telE = "Remplir la case tel";
       $error4="Remplir la case tel";

  }

  if (empty($_POST["villec"])) {
    $villeE = "";
  } else {
   if (!preg_match("/^[a-zA-Z ]*$/", $_POST['villec'])) {
      $villeE = "Only letters and white space allowed"; 
       $error5="la ville ne contient pas des chiffres";

  }
}
  if (empty($_POST["login"])) {
    $loginE = "Login is required";
  }

   if(strlen($_POST['mdp'])<8){
    $mdpE = "Remplir la case tel";
       $error6="la mot de passe doit contient au moins 8 caractéres";

  }

if(!($error1=="")|| !($error2=="")|| !($error3=="")|| !($error4=="") )
	{echo $error1."'<br>'";
echo $error2."'<br>'";
echo $error3."'<br>'";
echo $error4."'<br>'";
echo $error5."'<br>'";
echo $error6."'<br>'";

}else{
//- ------------------------------------------------------
$req="insert into inscription values('".$_POST['login']."','".$_POST['mdp']."')";
$res1=mysqli_query($conn,$req);
$reqt="insert into client values(null,'".$_POST['nomc']."','".$_POST['prenomc']."','".$_POST['emailc']."','".$_POST['villec']."','".$_POST['telc']."','".$_POST['login']."','".$_POST['mdp']."')";
$res=mysqli_query($conn,$reqt);
//$id=Mysqli_Insert_id($conn);
if ($res){
	header("Location: inscription.php");
	echo("felicitation votre inscription est effecué avec success");
	
	} else echo ("erreur");
}
?>