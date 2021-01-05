<html>

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
<body>
	  <div class="container">
<form method="POST" action="insertcat.php" >

    <h1 class="p-3 mb-2 bg-success text-white">inserer categorie</h1>
    <hr>

     <label for="categorie"><b>Nom Categorie :</b></label>
    <input class="form-control" type="text" placeholder="nom categorie" name="nomcat" required>
       <br>
 <label for="type"><b>image source</b></label>
    <input class="form-control" class="form-control"type="text" placeholder="lien de l'image" name="imgsource" required>
<br> 
<input class="btn btn-success" type="submit"  value="Ajouter " >
</form>
<div style="float:right;"><a href="affichecategorie.php"><button name="retour" class="btn btn-dark" value="Retour">Retour</button></a>
</div>   </div>
</body>
</html>