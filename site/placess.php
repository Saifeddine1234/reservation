<?php
include_once("db.class.php");
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);
?>
<?php
if(isset($_GET['del'])){
    $panier->del($_GET['del']);
    $link= mysqli_connect('127.0.0.1','root','','reservation');
    $id=$_GET['del'];
    $budd=$_GET['budget'];
    $sql = " DELETE FROM `panier` WHERE idp ='$id' AND budget='$budd'";
    	mysqli_query($link,$sql);
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
     <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="stylesheet" type="text/css" href="style1.css">
 
       <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Lamma reservation</title>
    <!-- Favicon -->
    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search" placeholder="Search Your Desire Destinations or Events">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                    <?php 
                                       
 
   if(isset($_SESSION['login']))
         { 
        if(isset($_SESSION['budget']))
              {  
     echo" <a class='navbar-brand' href='index.php?budget=".$_GET['budget']."'><img class='logo' src='img/core-img/lam.png' alt=''></a>";                               
     } else{
     echo" <a class='navbar-brand' href='index.php?'><img class='logo' src='img/core-img/lam.png' alt=''></a>";                               
    }}else{
      if(isset($_SESSION['budget']))
         {                        
         echo" <a class='navbar-brand' href='index.php?budget=".$_GET['budget']."'><img class='logo' src='img/core-img/lam.png' alt=''></a>";
        }else{
         ?>
        <a class="navbar-brand" href="index.php"><img class="logo" src="img/core-img/lam.png" alt=""></a>
<?php  }
         }
                                   ?>                   
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item ">
                                    <?php
    if(isset($_SESSION['login']))
    {       
        if(isset($_SESSION['budget'])){                
         echo"<a class='nav-link' href='index.php?budget=".$_GET['budget']."'>Home<span class='sr-only'></span> </a>" ?>
          <?php
        }else{
echo"<a class='nav-link' href='index.php'>Home<span class='sr-only'></span> </a>";
         
        }
 }
    else
    { if(isset($_SESSION['budget'])){   ?>
          <a class="nav-link" href="index.php?budget=<?php echo $_GET['budget']; ?>">Acceuil <span class="sr-only">(current)</span></a>
         <?php

    }else{
        ?>
        <a class="nav-link" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
  <?php
    }
}
?>

                                </li>
 
                                <li class="nav-item ">
                                   <?php 
                                  
 
    if(isset($_SESSION['login']))
    { if(isset($_SESSION['budget'])){
        echo" <a class='nav-link '' href='categorie.php?budget=".$_GET['budget']."'>categories </a>";
    }else{
        echo" <a class='nav-link '' href='bud.php'>categories </a>";
    } 
 }
    else
    {
      if(isset($_SESSION['budget']))
      {                        
        echo" <a class='nav-link '' href='categorie.php?budget=".$_GET['budget']."'>categories </a>" ?>
  
   <?php
    }else{
      ?>
        <a class="nav-link " href="bud.php">categories </a>
        <?php
    }
}
?>                             
                                </li>
                                <li class="nav-item ">
                                      <?php 
                                       
 
    if(isset($_SESSION['login']))
    { 
        if(isset($_SESSION['budget']))
        {  
            echo" <a class='nav-link '' href='contact.php?budget=".$_GET['budget']."'>contact </a>" ?>   
<?php
      } else{
        echo" <a class='nav-link '' href='contact.php?'>contact </a>";
    }
    }
   else
   {
     if(isset($_SESSION['budget']))
     {                        
       echo" <a class='nav-link '' href='contact.php?budget=".$_GET['budget']."'>contact </a>"; 
   }else{
     ?>
       <a class="nav-link " href="contact.php">contact </a>
       <?php
   }
}
?>                               
                                       
                                </li>
                            </ul>
                            <!-- Search btn -->
                           <?php
                            if(isset($_SESSION['login'])){    
        if(isset($_SESSION['budget'])){ 
            ?>
            <div class="text-white p-3">
            
                           
                                   <a href="logout.php?logout"> <button type="button" class="btn btn-default btn-sm ">
               Log out  </button></a>  
                                  </div>
              <?php
        }else{
            ?>
            <div class="text-white p-3">
                <a href="logout.php?logout"> <button type="button" class="btn btn-default btn-sm ">
               Log out  </button></a>  
                                  </div>
              <?php
        }  } else{ 
         if(isset($_SESSION['budget'])){ 
            ?>
              <div id="bdd" class="dorne-signin-btn">
         <!--    <a href="signin.php?budget=<?php echo $_GET['budget']; ?>">Compte</a> -->
             </div>
            
             <?php
             }else{
                ?>  
                <div id="bdd" class="dorne-signin-btn">
                <a href="signup.php">Compte</a>
                </div>
            
             
    <?php

    }}

 
?>
                               <li class="nav-item ">

<?php 
   

if(isset($_SESSION['login']))
{ 
    if(isset($_SESSION['budget'])){
        echo" <a class='nav-link ' href='placess.php?budget=".$_GET['budget']."'>Panier (<b style='color:red;'>".$panier->count()."</b>)</a>";

    }
    else{
        echo" <a class='nav-link ' href='placess.php?'>Panier (<b style='color:red;'>".$panier->count()."</b>)</a>"?>
<?php
    }
}else
{     if(isset($_SESSION['budget'])){ ?>
    <a class="nav-link" href="placess.php?budget=<?php echo $_GET['budget'];?>">Panier (<b style="color:red;"><?php echo $panier->count(); ?></b>)<span class="sr-only"></span></a>
<?php
}
else{   ?>
<a class="nav-link" href="placess.php">Panier (<b style="color:red;"><?php echo $panier->count(); ?></b>)<span class="sr-only"></span></a>
<?php

}
}

?>
</li>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>



    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg)"></div>
    <!-- ***** Breadcumb Area End ***** --> 


    <!-- Explore Area -->
    <section  style="width:100%;">
  
          
           <!-- ***** Listing Destinations Area Start ***** -->
        <div class="flex-fill mt-50 ml-50 ">
             <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Panier</h4>
                        <p>passer votre commande</p>
                    </div>
                </div>
                <div class="col-12">

                    <center>
     <table <table style='width:80%;margin-top: 50px;'class='table table-striped' align='center' border=2> 
<tr class="rowtitle">
    <td> </td>
    <td class="nom"><B>nom produit</B></td>
    <td class="prix"><B>prix</B></td>
    <td class="quantité"><B>quantité</B></td>
    <td class="subtotal"><B>prix taxeé(%)</B></td>
    <td class="action"><B>Supprimer</B></td>

</tr>
<?php

foreach($menu as $product) :
?>
<tr >
    <td style="width:200px;heigth:170px;"><a href="#" class="image"><img  src="<?php echo $product->urlp ; ?>"></a></td>
    <td name="nom" class="nom"><?php echo $product->nomp ; ?></td>
    <td name="prix" class="prix"> <?php echo $product->prixp ; ?> DT</td>
    <td name="quantite" class="quantité"><?php echo $_SESSION['panier'][$product->idp]; ?></td>
    <td class="subtotal"> <?php echo $product->prixp ; ?> DT</td>
    <?php if(isset($_SESSION['login']))
 {  if(isset($_SESSION['budget']))
    { ?>
    <center><td class="td"><a href="placess.php?del=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget']; ?>" class="del"><img style="width:60px;heigth:100px;" src="img/core-img/del.png"></a></td></center>
<?php }else{ ?>
    <center><td class="td"><a href="placess.php?del=<?php echo $product->idp; ?>" class="del"><img style="width:60px;heigth:100px;" src="img/core-img/del.png"></a></td></center>
    <?php
}
 }else { 
  if(isset($_SESSION['budget']))
    { ?>
    <center><td class="td"><a href="placess.php?del=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget']; ?>" class="del"><img style="width:60px;heigth:100px;" src="img/core-img/del.png"></a></td></center>
<?php }else{ ?>
 
    <center><td class="td"><a href="placess.php?del=<?php echo $product->idp; ?>" class="del"><img style="width:60px;heigth:100px;" src="img/core-img/del.png"></a></td></center>
<?php 
}} ?>
</tr>
<?php endforeach; ?>
<tr class="rowtotal">
    <td>TOTAL: </td>
     <td class=""><?php echo number_format($panier->total(),3,',',' ');?> DT </td>
</tr>
</table>  
  
<center>   
<div class="listing-verify" style="width:50%;">
        <?php
    if(isset($_SESSION['login']))
    { 
        echo" <b class='btn dorne-btn w-100'>passer la commande </B>" ?>
        
         <?php
 }
    else 
    {  if(isset($_SESSION['budget']))
        {
            $p=0;
            if(($panier->count()) ==$p)
            {
                ?> <a class='btn dorne-btn w-100' href="placess.php?budget=<?php echo $_GET['budget'];?>">passer la commande </a>
    
    <?php   }else{ ?>
                <a class='btn dorne-btn w-100' href="signin.php?budget=<?php echo $_GET['budget'];?>">passer la commande </a>
                <?php
           
          } }else {
            $p=0;
            if(($panier->count()) ==$p)
            {
                ?> <a class='btn dorne-btn w-100' href="placess.php">passer la commande </a>
    
    <?php   }else{ ?>
                <a class='btn dorne-btn w-100' href="signin.php">passer la commande </a>
                <?php
           
          }
    }}
 
?>               
                        </div>                
 </div>
 
    </div>
    
        </section>
        <br>


     <!-- ****** Footer Area Start ****** -->

 <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> - Tous droits réservés 


                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>