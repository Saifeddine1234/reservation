<html>

<head>
   <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lamma Reservation</title>
    <!-- Core Stylesheet -->
    <link href="site/style.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">
</head>
<body >
<form method="POST" action="insertproduit.php" >
  <div class="container" style="align:'center';width:70%;">
    <h1 class="p-3 mb-2 bg-success text-white">inserer Un Produit</h1>
    <hr>


<label for="nom"><b>nom de produit :</b></label>
    <input class="form-control" type="text" placeholder="nom produit" name="nomp" required>
<br>
<label for="nom"><b>prix de produit :</b></label>
    <input class="form-control" type="text" placeholder="prix en DT" name="prixp" required>
<br>
<label for="nom"><b>image de produit :</b></label>
    <input class="form-control" type="text" placeholder="lien d'image ici" name="urlp" required>

  <br/>
  <label for="nom"><b>sous categorie :</b></label>
    <input class="form-control" type="text" placeholder="sous categorie de produit" name="souscat" required>

  <label for="nom"><b>ville :</b></label>
    <input class="form-control" type="text" placeholder="ville produit" name="villep" required>

    <label for="desc"><b>description :</b></label>
    <textarea class="form-control" placeholder="donner la description ici"  name="descp"></textarea> 
    <br>
<label for="nom"><b>Categorie :</b></label>
<br>
<?php
include_once("connexion.inc.php");
$req="Select * from categorie";
$res= mysqli_query($conn,$req);
echo"<select class='form-control'  name='nomcat'>";
while(($raw =mysqli_fetch_array($res,MYSQLI_NUM))!=null)    
  { echo "<option>".$raw[0]."</option>";} 
?> 
<br/>
<br>
<br>
  </div>
    <input type="submit" class="btn btn-success" value="Ajouter" >
  <a href='afficheproduit.php'><input  class="btn btn-secondary" type=button value=retour></a>
</form>


</body>
</html>