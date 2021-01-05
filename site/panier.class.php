<?php
 class panier{
 	private $DB;
 	   public function __construct($DB){
 	   	if(!isset($_SESSION)){
 	   		session_start();
 	   	}
 	  if(!isset($_SESSION['panier'])){
 	  	$_SESSION['panier'] = array();
 	  }
 	  $this->DB = $DB;
 }
 public function count(){
 return	array_sum($_SESSION['panier']);

 }
 public function total(){
 	$total = 0;
 	$idps= array_keys($_SESSION['panier']);
		if (empty($idps)) {
			$menu = array();
			}else {
				$menu = $this->DB->query(' SELECT idp, prixp FROM produit WHERE idp IN ('.implode(',',$idps).')');	
			}
			foreach( $menu as $product) {
				$total += $product->prixp * $_SESSION['panier'][$product->idp];
			}
			return $total;
}

 public function add($product_idp){
 	if (isset($_SESSION['panier'][$product_idp])) {
 		$_SESSION['panier'][$product_idp]++;
 	}else{
 	$_SESSION['panier'][$product_idp] = 1;
 }
 }
 public function del($product_idp){
 	unset($_SESSION['panier'][$product_idp]);
 }
}