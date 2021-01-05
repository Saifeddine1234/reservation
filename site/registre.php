<?php
include_once("db.class.php");
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);
?>
<?php
if(isset($_POST['connexion']))
{
include_once("connexion.inc.php");
 $reqt = "SELECT * FROM client WHERE login='".($_POST['login'])."'and mdp='".($_POST['mdp'])."'";
$rest= mysqli_query($conn,$reqt) or die (mysqli_error($conn)); ;
$raw =mysqli_fetch_array($rest,MYSQLI_NUM);
if (empty($_POST['login'])|| empty($_POST['mdp']))
    {
        header("location:signin.php?Empty=remplir correctement  les champs login et mot de passe;");
}if($raw[6]==1){
 header("location:signin.php?bloque=Votre Compte est bloquee , contactez l'admin");

}else{
             $sql = 'SELECT * FROM client WHERE login="'.($_POST['login']).'" and mdp="'.($_POST['mdp']).'"';
             $req = mysqli_query($conn,$sql);
      
             if ( $data= mysqli_fetch_array($req))

			 {
        if(isset($_SESSION['budget'])){ 
      
        $link = mysqli_connect('localhost','root','','reservation');
         $total = $panier->total();
         $budd = $_GET['budget'] ; 
         $pseudo=$_POST['mdp']; 
         $var = NULL;
    $sql = "INSERT INTO paniier(`idp`, `nomp`, `prixp`, `budget`, `pseudo`, `total`)  VALUES ('0','', '0', '0', '$pseudo', '$total')";
         mysqli_query($link,$sql);
       
       header("location:return.php?revenir");
      }
      else{
        header("location:bud.php");
      }
       }else {
        if(isset($_SESSION['budget'])){ 
          header("location:signin.php?Invalid=verifier les champs&budget=200");
         } else{
            header("location:signin.php?Invalid=verifier les champs");
 
          }
             
                 
             }

            }}
?>