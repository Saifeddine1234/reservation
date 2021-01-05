<?php
require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);
if(isset($_GET['idp'])){
  $product = $DB->query('SELECT idp FROM produit WHERE idp=:idp', array('idp' => $_GET['idp']));
  $panier->add($product[0]->idp);
}

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
                                <li class="nav-item active">
                                    <?php
    if(isset($_SESSION['login']))
    {       
        if(isset($_SESSION['budget'])){                
         echo"<a class='nav-link' href='index.php?budget=".$_GET['budget']."'>acceuil<span class='sr-only'></span> </a>" ?>
          <?php
        }else{
echo"<a class='nav-link' href='index.php'>acceuil<span class='sr-only'></span> </a>";
         
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
 
    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="hero-content">
                        <h2 >Meilleur planificateur des évènements En Tunisie</h2>
                        <h4 >chercher votre meilleur offre et reserver votre place chez nous </h4>
                    </div>
                    <br>
                              
                    <!-- Hero Search Form -->
                    <div class="hero-search-form">
            
                        <!-- Tabs Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                                <h6>Tu veut reserver ?</h6>
                                <?php
                        if(isset($_SESSION['login']))
                        { if(isset($_SESSION['budget'])){
                            echo" <a  href='categorie.php?budget=".$_GET['budget']."'>  <button  style='width: 40%;color: float:right;' class='btn active'>Commencer</button></a>" ?>
        <?php
                            }else{                         
                echo" <a  href='bud.php'>  <button  style='width: 40%;color: float:right;' class='btn active'>Commencer</button></a>"; ?>
                <?php   }}else{ 
                      if(isset($_SESSION['budget'])){
            echo" <a  href='categorie.php?budget=".$_GET['budget']."'>  <button  style='width: 40%;color: float:right;' class='btn active'>Commencer</button></a>" ?>
        <?php
                            }else{
                                echo" <a  href='bud.php'>  <button  style='width: 40%;color: float:right;' class='btn active'>Commencer</button></a>" ?>              
     <?php            

    }}
 
?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Social Btn -->
        <div class="hero-social-btn">
            <div class="social-title d-flex align-items-center">
                <h6>pour plus de détails</h6>
                <span></span>
            </div>
            <div class="social-btns">
                <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
            </div>
        </div>
    </section>

<?php
if(isset($_POST['submit'])){
include_once("connexion.inc.php");
if(($_POST['destination']=="")&&($_POST['categorie']=="")){
    $req="Select * from loal " ;
}elseif($_POST['destination']==""){
    $req="Select * from local where nomcat='".$_POST['categorie']."'" ;
}elseif($_POST['categorie']==""){   
    $req="Select * from loal where villeloc='".$_POST['destination']."'" ;
}else{
$req="Select * from local where villeloc='".$_POST['destination']."' and nomcat='".$_POST['categorie']."'";
}
$res= mysqli_query($conn,$req);
while(($raw =mysqli_fetch_array($res,MYSQLI_NUM))!=null){
echo" <div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '>";
if(isset($_SESSION['login']))
    {               
echo "<a href='reservpage.php?idp=".$raw[0]."&pseudo=".$_GET['pseudo']."' ><img class='card-img-top' src='".$raw[3]."' ></a>";
}else
echo "<a href='reservpage.php?idp=".$raw[0]."' ><img class='card-img-top' src='".$raw[3]."' ></a>";
//Rating & Map Area
echo " <div class='ratings-map-area d-flex'>";
echo " <a href='#'>8.5</a>";
echo "<a href='#'><img src='img/core-img/map.png' alt=''></a>";
echo "</div>";
//Price
echo " <div class='feature-content d-flex align-items-center justify-content-between '>";
echo "<div class='feature-title'>";
echo "<h5>".$raw[4]."</h5>";
echo "<p>".$raw[1]."</p>";
echo"</div>";
echo"</div>";
echo"</div>";
}
  }
 
      ?>

    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Catagory Area Start ***** -->
    <section class="dorne-catagory-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="all-catagories">
                        <div class="row">
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.2s">
                                    <div class="catagory-content">
                                        <img    style="height: 70px;width: 70px;" id="img" src="img/core-img/salles.png" alt="">
                                        <?php
                        if(isset($_SESSION['login']))
    {  if(isset($_SESSION['budget'])){
        echo" <a href='categorie.php?budget=".$_GET['budget']."'><h6 style='color:#000;'>Salles <br/>des fetes</h6> </a>" ?>
       <?php  }else { echo" <a href='bud.php?'><h6 style='color:#000;'>Salles <br/>des fetes</h6> </a>" ?>
        
         <?php
 }}
    else
    { if(isset($_SESSION['budget'])){
        ?> <a href="categorie.php?budget=<?php echo$_GET['budget'];?>"><h6 style="color:#000;">Salles <br/>des fetes</h6> </a>
  <?php  }else{ ?>
        <a href="bud.php"><h6 style="color:#000;">Salles <br/>des fetes</h6> </a>
        <?php  
     }
    }
 
?>               
                                
                                    </div>
                                </div>
                            </div>
                              <!-- Single Catagory Area -->
                              <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.2s">
                                    <div class="catagory-content">
                                        <img   style="height: 70px;width: 70px;" id="img" src="img/core-img/music.jpg" alt="">
                                        <?php
                        if(isset($_SESSION['login']))
    {  if(isset($_SESSION['budget'])){
        echo" <a href='categorie.php?budget=".$_GET['budget']."'><h6 style='color:#000;'>Troupe <br/>musicale</h6> </a>" ?>
       <?php  }else { echo" <a href='bud.php'><h6 style='color:#000;'>Troupe <br/>musicale</h6> </a>" ?>
        
         <?php
 }}
    else
    { if(isset($_SESSION['budget'])){
        ?> <a href="categorie.php?budget=<?php echo$_GET['budget'];?>"><h6 style="color:#000;">Troupe <br/>musicale</h6> </a>
  <?php  }else{ ?>
        <a href="bud.php"><h6 style="color:#000;">Troupe <br/>musicale</h6> </a>
        <?php  
     }
    }
 
?>  
                                    </div>
                                </div>
                            </div>
                          <!-- Single Catagory Area -->
                          <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.4s">
                                    <div class="catagory-content">
                                        <img style="height: 70px;width: 60px;" id="im" src="img/core-img/beauté.png" alt="">
                                        <?php
                        if(isset($_SESSION['login']))
    {  if(isset($_SESSION['budget'])){
        echo" <a href='categorie.php?budget=".$_GET['budget']."'><h6 style='color:#000;'>Coiffure <br/>et beauté</h6> </a>" ?>
       <?php  }else { echo" <a href='bud.php'><h6 style='color:#000;'>Coiffure <br/>et beauté</h6> </a>" ?>
        
         <?php
 }}
    else
    { if(isset($_SESSION['budget'])){
        ?> <a href="categorie.php?budget=<?php echo$_GET['budget'];?>"><h6 style="color:#000;">Coiffure <br/>et beauté</h6> </a>
  <?php  }else{ ?>
        <a href="bud.php"><h6 style="color:#000;">Coiffure <br/>et beauté</h6></a>
        <?php  
     }
    }
 
?>  
                                    </div>
                                </div>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.4s">
                                    <div class="catagory-content">
                                        <img  style="height: 70px;width: 60px;" src="img/core-img/patiss.png" alt="">
                                        <?php
                        if(isset($_SESSION['login']))
    {  if(isset($_SESSION['budget'])){
        echo" <a href='categorie.php?budget=".$_GET['budget']."'><h6 style='color:#000;'>patisseries <br/> <br/></h6> </a>" ?>
       <?php  }else { echo" <a href='bud.php'><h6 style='color:#000;'>patisseries <br/><br/></h6> </a>" ?>
        
         <?php
 }}
    else
    { if(isset($_SESSION['budget'])){
        ?> <a href="categorie.php?budget=<?php echo$_GET['budget'];?>"><h6 style="color:#000;">patisseries<br/> <br/></h6> </a>
  <?php  }else{ ?>
        <a href="bud.php"><h6 style="color:#000;">patisseries <br/><br/></h6> </a>
        <?php  
     }
    }
 
?>  
                                    </div>
                                </div>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.6s">
                                    <div class="catagory-content">
                                        <img  style="height: 70px;width: 60px;" src="img/core-img/photo.png" alt="">
                                        <?php
                        if(isset($_SESSION['login']))
    {  if(isset($_SESSION['budget'])){
        echo" <a href='categorie.php?budget=".$_GET['budget']."'><h6 style='color:#000;'>photographe <br><br/></h6> </a>" ?>
       <?php  }else { echo" <a href='bud.php'><h6 style='color:#000;'>photographe <br/><br/> </h6> </a>" ?>
        
         <?php
 }}
    else
    { if(isset($_SESSION['budget'])){
        ?> <a href="categorie.php?budget=<?php echo$_GET['budget'];?>"><h6 style="color:#000;">photographe <br/> <br/></h6> </a>
  <?php  }else{ ?>
        <a href="bud.php"><h6 style="color:#000;">photographe <br/> <br/></h6> </a>
        <?php  
     }
    }
 
?>  
                                    </div>
                                </div>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.8s">
                                    <div class="catagory-content">
                                        <img style="height: 70px;width: 60px;" src="img/core-img/deco.png" alt="">
                                        <?php
                        if(isset($_SESSION['login']))
    {  if(isset($_SESSION['budget'])){
        echo" <a href='categorie.php?budget=".$_GET['budget']."'><h6 style='color:#000;'>Location<br/> et decoration</h6> </a>" ?>
       <?php  }else { echo" <a href='bud.php'><h6 style='color:#000;'>Location<br/> et decoration</h6> </a>" ?>
        
         <?php
 }}
    else
    { if(isset($_SESSION['budget'])){
        ?> <a href="categorie.php?budget=<?php echo$_GET['budget'];?>"><h6 style="color:#000;">Location<br/> et decoration</h6> </a>
  <?php  }else{ ?>
        <a href="bud.php"><h6 style="color:#000;">Location<br/> et decoration</h6> </a>
        <?php  
     }
    }
 
?>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Catagory Area End ***** -->

    <!-- ***** About Area Start ***** -->
    <section class="dorne-about-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content text-center">
                        <h2>TROUVER VOTRE OFFRE AVEC <br><span>lama</span></h2>
                        <p> organiser votre mariage suivant votre budget et moins chére  </p>
                        <p>selection le choix convenable .</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area End ***** -->
    <section class="slid"  >
    
    <slider>
            <slide><p></p></slide>
            <slide><p></p></slide>
            <slide><p></p></slide>
            <slide><p></p></slide>

        </slider> 
            </section><br/>
    <!-- ***** Features Destinations Area Start ***** -->
    <section class="dorne-features-destinations-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading  text-center">
                        <span></span>
                        <h4>LES catégories</h4>
                        <p>notre catégories disponible</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="features-slides owl-carousel">


                        <!-- Single Features Area -->
                          <?php
include_once("connexion.inc.php");
$req="Select * from categorie " ;
$res= mysqli_query($conn,$req);
while(($raw =mysqli_fetch_array($res,MYSQLI_NUM))!=null){
                        echo"<div class='single-features-area'>";
                       if(isset($_SESSION['login'])){
                          
         if(isset($_SESSION['budget'])){
echo "<a href='categorie.php?budget=".$_GET['budget']."' ><img src='".$raw[1]."' ></a>";
    }else{
        echo "<a href='bud.php><img src='".$raw[1]."' ></a>";
    }}else{
        if(isset($_SESSION['budget'])){
echo "<a href='categorie.php?budget=".$_GET['budget']."'><img src='".$raw[1]."' ></a>";
        }else{
            echo "<a href='bud.php'><img src='".$raw[1]."' ></a>";
        }}
                            echo"<div class='feature-content d-flex align-items-center justify-content-between'>";
                               echo" <div class='feature-title'>";
                                   echo" <h5>".$raw[0]."</h5>";
                                   
                               echo" </div>";
                               
                                                         echo"  </div>";
                       echo" </div>";

    }           
                
                   ?>
                    




                    </div>
                </div>
            </div>
   
        </div>
   <div class="boutton">
  
       
     </form></div>
    </section>
    <!-- ***** Features Destinations Area End ***** -->
   
    <!-- ***** Features Events Area Start ***** -->
    <section class="dorne-features-events-area bg-img bg-overlay-9 section-padding-100-50" style="background-image: url(img/bg-img/hero-3.jpg)">
        <div class="container">

           
                <div class="col-12">
                    <div class="section-heading text-center">
                        <span></span>
                        <h4>OFFRE SPéciale</h4>
                        <p>les offres les moins cher</p>
                    </div>
           

<div class="row">
 
        <div class=" text-center">
        <img name="slide" src="pub1.jpg"width="100%" heigth="50%" >
</div>
</div>
    </div>
  </div>
    </div>
  </div>
 
            </div>
        </div>
    </section>
    <!-- ***** Features Events Area End ***** -->



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
<script>
var i = 1 ;
var images = [];
var time = 2000;
<?php
 $link = mysqli_connect('localhost','root','','reservation');
$req="SELECT * FROM pub";
$res= mysqli_query($link,$req);
while(($raw =mysqli_fetch_array($res,MYSQLI_NUM))!=null)
      { echo "images[".$raw[0]."] = './img/pub-img/".$raw[3]."';";}
      ?>
      function changeImg(){
          document.slide.src = images[i];
          if(i < images.length - 2){
              i++;
          }else {
              i = 1;
          }
          setTimeout("changeImg()", time);
          }
          window.onload = changeImg;
     
</script>
</html>