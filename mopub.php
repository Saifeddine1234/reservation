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
</head>
<body>
<form name="formee" Method="POST" action="traitementmodifpub.php">

<?php
include_once("connexion.inc.php");
$req="select name,lien FROM 
pub WHERE id='".$_GET['id']."'";
$res=Mysqli_query($conn,$req) or die (mysqli_error($conn)); 
$raw=Mysqli_fetch_array($res,MYSQLI_NUM);
$lien=$raw[1];
$name=$raw[0];
?>
   <h1 class="p-3 mb-2 bg-success text-white">inserer categorie</h1>
<h5>Nom publicité </h5><input class="form-control"  type="text" name="name" value="<?php echo $name ;?>">
<h5>lien de l'image</h5><input class="form-control"  type="text" name="lien" value="<?php echo $lien ;?>">
  <br>

<input type="submit" value="modifier">

</body>
</html>