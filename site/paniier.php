<?php
include_once("db.class.php");
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);
?>
<?php
if(isset($_GET['del'])){
	$panier->del($_GET['del']);
}
?>
<?php
$link= mysqli_connect('127.0.0.1','root','','reservation');
if (isset($_POST['cmd'])){
	$email = $_POST['table'];
	$password2 = $panier->total();
	$password = $panier->count();

		$sql = " INSERT INTO `table`(`numT`, `PrixT`, `item`) VALUES  ('$email','$password2','$password')";
	mysqli_query($link,$sql);
}

$idps= array_keys($_SESSION['panier']);
if (empty($idps)) {
    $menu = array();
}else {
    $menu = $DB->query('SELECT * FROM produit WHERE idp IN ('.implode(',',$idps).')');
}
$idList = implode('-',$idps);
?>
<!DOCTYPE html>
<html>
<head>
	<title>panier</title>
<link rel="stylesheet" type="text/css" href="stylepanier.css">
</head>
<body>
<form method="POST" action="paniier.php" name="panier">
 <header>
        <center>
          <div class="abc">
            <div class="b">
			<table style='width:80%;margin-top: 50px;'class='table table-striped' align='center' border=2>
        <tr>
          <td class="td">
        <a href="#menu" class="bar"><b>TOTAL </b></a>
          </td>
          <td class="td">
      <a href="#contact" class="bar"> ITEMS</a>
    </td>

      </tr>
         <tr>
          <td class="td"></td>
          <td class="td"></td>
          <td class="td">
        <a href="total" class="bar"><b><?php echo $panier->total();?> DT </b></a></td>
        <td class="td">
      <a href="#contact" class="bar"><?php echo $panier->count(); ?></a></td>
      </tr>
      </table>
      </div>
    </div>
        </center>
</header>

<section>
    <center>

        <div class="abcd">

       <a href="" class="bar">Numero Table: </a>
      <a href="#menu" class="bar"><b><input type="text" class="input" name="table"></b></a>
      <button type="button" onclick="location.href='order.php?ids=<?= $idList?>'"  name="cmd" class="envoyer"><b>Valider <br> commande
      </b></button>

        </div>
    </center>

</section>

	<div class="chechout">
	<div class="title">
		<div class="wrap">
      <center> <h1> Panier</h1></center>
      </div>
		</div>
	</div>
<div><center>
	<table class="table" border="1" >


			<tr class="rowtitle">
				<td> .........</td>
				<td class="nom"><B>nom produit</B></td>
				<td class="prix"><B>prix</B></td>
				<td class="quantité"><B>quantité</B></td>
				<td class="subtotal"><B>prix taxeé(%)</B></td>
			    <td class="action"><B>Supprimer</B></td>

			</tr>
			<?php

			foreach($menu as $product) :
			?>
			<tr class="row">
				<td><a href="#" class="image"><img src="<?php echo $product->urlp ; ?>"></a></td>
				<td name="nom" class="nom"><?php echo $product->nomp ; ?></td>
				<td name="prix" class="prix"> <?php echo $product->prixp ; ?> DT</td>
				<td name="quantite" class="quantité"><?php echo $_SESSION['panier'][$product->idp]; ?></td>
				<td class="subtotal"> <?php echo $product->prixp ; ?> DT</td>
				<center><td class="td"><a href="paniier.php?del=<?php echo $product->idp; ?>" class="del"><img src="del.png"></a></td></center>
			</tr>
		<?php endforeach; ?>
			<tr class="rowtotal">
				<td>TOTAL: </td>
				 <td class=""><?php echo number_format($panier->total(),3,',',' ');?> DT </td>
			</tr>
   </table>
</center>	
</div>
</div>
</form>
</body>
</html>

