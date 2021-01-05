<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Lamma Reservation</title>
<!-- Core Stylesheet -->
<link href="site/style.css" rel="stylesheet">
<!-- Responsive CSS -->
<link href="css/responsive/responsive.css" rel="stylesheet">
</head>
<center>
<?php
include_once("connexion.inc.php");
$req="Select * from produit";
$res= mysqli_query($conn,$req);
//entete du tableau
echo"<table style='margin-top: 50px;'class='table table-striped' align='center' border=2><tr><th>numero</th><th>nom produit</th><th>prix </th><th>lien de l'image</th><th>categorie </th><th>Sous categorie</th><th>ville </th><th>description</th><th>Modifier</th><th>Supprimer</th>";
while(($raw =mysqli_fetch_array($res,MYSQLI_NUM))!=null)
	{ echo "<tr><td>".$raw[0]."</td><td>".$raw[1]."</td><td>".$raw[2]."</td><td>".$raw[3]."</td><td>".$raw[4]."</td><td>".$raw[5]."</td><td>".$raw[6]."</td></td><td>".$raw[7]."</td><td><a href=modifproduit.php?idp=".$raw[0].">modifier</a></td><td><a href=suppproduit.php?idp=".$raw[0].">supprimer</a></td></tr>";
	}
?>
</center>
	<a href='aceuill.php'><input  class="btn btn-secondary" type=button value=retour></a>
	
	<a href='ajoutproduit.php'><input type=button class="btn btn-dark" value="Ajouter un produit"></a>

