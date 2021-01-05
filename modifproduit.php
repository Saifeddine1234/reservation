<html>
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>
<div class="container">
<form name="forme" Method="POST" action="traitementmodifarticle.php">

<?php
include_once("connexion.inc.php");
$req="select * FROM produit WHERE idp=".$_GET['idp'];
$res=Mysqli_query($conn,$req) or die (mysqli_error($conn)); 
$raw=Mysqli_fetch_array($res,MYSQLI_NUM);
$nomp=$raw[1];
$prixp=$raw[2];
$urlp=$raw[3];
$nomcat=$raw[4];
$souscat=$raw[5];
$villep=$raw[6];
$descp=$raw[7];
$idp=$raw[0];
?>
<div class="container" style="align:'center';padding:10px;margin:10px;width:70%;">

<h1 class="p-3 mb-2 bg-success text-white">modifier Un Produit</h1>
<h5>numero produit</h5><input type="text" name="idp" class="form-control" value="<?php echo $idp ;?>">
<h5>nom produit</h5><input type="text" name="nomp" class="form-control" value="<?php echo $nomp ;?>">
<h5>prix </h5><input type="text" name="prixp" class="form-control" value="<?php echo $prixp ;?>">
<h5>image </h5><input type="text" name="urlp" class="form-control" value="<?php echo $urlp ;?>">
<h5>ville </h5><input type="text" name="villep" class="form-control" value="<?php echo $villep ;?>">
<h5>Sous categorie </h5><input type="text" name="souscat" class="form-control" value="<?php echo $souscat ;?>">
<h5>description </h5><textarea type="text" name="descp"  class="form-control" ><?php echo $descp ;?></textarea>
 
<h5>Categorie</h5>  
<?php
include_once("connexion.inc.php");
$reqt="Select * from categorie";
$ress= mysqli_query($conn,$reqt);
echo"<select class='form-control' name='nomcat'>";
while(($raw =mysqli_fetch_array($ress,MYSQLI_NUM))!=null)              
  { echo "<option >".$raw[0]."</option>";}

  ?>
<input style="margin:30px;"class="btn btn-success" type="submit" value="modifier">
<a href='afficheproduit.php'><input  class="btn btn-secondary" type=button value=retour></a>



</div>
</form>
</div>

</body>
</html>