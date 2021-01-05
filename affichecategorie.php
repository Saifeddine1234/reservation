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
<center><?php
include_once("connexion.inc.php");
$req="Select * from categorie";
$res= mysqli_query($conn,$req);
echo"<table style='width:80%;margin-top: 50px;'class='table table-striped' align='center' border=2><tr><th>Nom categorie </th><th> image </th><th>Modifier</th><th>Supprimer</th>";
while(($raw =mysqli_fetch_array($res,MYSQLI_NUM))!=null)
                                 
	{ echo "<tr><td>".$raw[0]."</td><td>".$raw[1]."</td><td><a href=modifcatg.php?nomcat=".$raw[0].">modifier</a></td><td><a href=suppcatg.php?nomcat=".$raw[0].">supprimer </a></td></tr>";
	}
  ?>
  <div><a href="aceuill.php"><input  class="btn btn-secondary" type="submit" name="retour" value="Retour"></a>
  </div>
  </center>

		