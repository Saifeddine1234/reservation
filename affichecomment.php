<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <title>Lamma Reservation</title>
<!-- Core Stylesheet -->
<link href="site/style.css" rel="stylesheet">
<!-- Responsive CSS -->
<link href="css/responsive/responsive.css" rel="stylesheet">
</head>
<div class="container">
	<center>
	<?php
include_once("connexion.inc.php");
$req="Select * from comment";
$res= mysqli_query($conn,$req);
//entete du tableau
echo"<table style='margin-top: 50px;'class='table table-striped' align='center'border=2><tr><th>ID</th><th>code produit</th><th>Titre</th><th>Commentaire</th><th>Supprimer</th>";
while(($raw =mysqli_fetch_array($res,MYSQLI_NUM))!=null)
                                   // MYSQLI_ASSOC
									//MYSQLI_BOTH
							
	{ echo "<tr><td>".$raw[0]."</td><td>".$raw[1]."</td><td>".$raw[2]."</td><td>".$raw[3]."</td><td><a href=suppcomment.php?id=".$raw[0].">supprimer </a></td></tr>";
	}
	//echo "<option value=".$raw[0].">".$raw[1]."</option>";}
	?>
	</center>

	<a href="aceuill.php"><input type="submit" class="btn btn-secondary" name="retour" value="Retour"></a>
	</div>
