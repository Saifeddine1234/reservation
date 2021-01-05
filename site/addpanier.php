<?php
require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);
if(isset($_GET['idp'])){
	$product = $DB->query('SELECT idp FROM produit WHERE idp=:idp', array('idp' => $_GET['idp']));
	if (empty($product)) {
		die("fffffff");
	}
	
	$panier->add($product[0]->idp);
	die('LE PRODUIT A BIEN AJOUTER  <a href="javascript:history.back()">RETOURNER AU CATALOGUE</a>');
}else{
	die("vous n'avez selectionner rien");

}
?>
