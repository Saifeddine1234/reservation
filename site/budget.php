<?php
session_start();


if(isset($_POST['validation']))
{
    if (empty($_POST['budget']))
    {
        header("location:bud.php?Empty=remplir correctement  le champs;");
}else{
  
    $_SESSION['budget'] = $_POST['budget'];
header("location:categorie.php?budget=".$_POST['budget']." ");
    }
}
?>