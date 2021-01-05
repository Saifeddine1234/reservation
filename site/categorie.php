<?php
require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);
if(isset($_GET['idp'])){
  $product = $DB->query('SELECT idp FROM produit WHERE idp=:idp', array('idp' => $_GET['idp']));
  $panier->add($product[0]->idp);
}

if(isset($_GET['idp'])){
    $link = mysqli_connect('localhost','root','','reservation');
    $rec = mysqli_query($link,'SELECT * FROM produit WHERE idp='.$_GET['idp']);
    
    $row = mysqli_fetch_array($rec,MYSQLI_NUM);
    $idp=$row[0];
     $nomp=$row[1];
     $prixp=$row[2];
     $bud=$_GET['budget']; 
      $reqqq = "INSERT INTO paniier (`idp`, `nomp`, `prixp`, `budget`, `pseudo`, `total`) VALUES ('$idp','$nomp','$prixp','$bud','0','0')";
    mysqli_query($link,$reqqq); 
  }
  ?>
<!DOCTYPE html>

<html lang="fr">
<head>

  <link rel="stylesheet"  href="ss.css">
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
 
                                <li class="nav-item active">
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
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg)">
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- Explore Area -->
    <section class="d-md-flex">
            <!-- Explore Search Form -->
            <div   style="margin:0px;padding:0px;" class="col-lg-3 mr-50 explore-search-form ">
                <!-- Tabs -->
                         <!-- Tabs Content -->
                        <div style="margin:0px;padding: 0px;" class="tab-content" id="nav-tabContent">
                            <div  style="margin:0px;padding: 0px;" class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                            <nav  style="margin:0px;padding: 0px;" id="sidebar">
   		<ul id="ul"class="list-unstyled components">
           <li class="components">
            <a id="a" href="#salles">Salles des fetes</a>
   			</li>   
   			<li >
   				<a id="a" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle  components">Troupes musicales   v</a>
   				<ul class="collapse list-unstyled components" id="homeSubmenu" >
   					<li class="components">
   						<a id="a" href="#hadhra">Hadhra</a>
   					</li>
   					<li class="components">
   						<a id="a" href="#orchestre">orchestre </a>
   					</li>
   					<li class="components">
   						<a id="a" href="#TF">Troupe feminine</a>
   					</li>
   				</ul> 
   			</li>
               <li class="components">
   				<a id="a" href="#coiff">Coiffure & beauté</a>
               </li>
               <li class="components">
   				<a id="a" href="#patiss">Patisseries</a>
               </li>
               <li class="components">
   				<a id="a" href="#photo">photographe</a>
   			</li>
   			<li class="components">
   				<a id="a" href="#deco">Décoration & location</a>
   			</li>

   		</ul>
   	</nav>
                                        
                            </div>
                        </div>

                </div>
                <script  type="text/javascript" >
    function Valiate(){
        var b = <?php echo $_GET['budget'];?>;
     
         var a=<?php echo $panier->total();?>+2000;
     if(b < a){ 
       alert("votre BUDGET est insuffisant");
        return false;
    }
return true;}
    
    </script>
        <div class="flex-fill mt-50 ml-50 ">
           <div class="col-12" id="salles">
                    <div class="section-heading dark text-center">
                          <div class="flex-fill mt-50 ml-50 ">
             <div class="col-12" id="salles">
             <center>  <div class="section-heading dark text-center">
                    
                        <div>
                        <div class="content">
   		<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="return2.php?revenir"> <button type="button" class="btn btn-warning btn-sm ">
                <h4>choisir autre budget </h4></button></a> </center>     
 
 
</DIV>
  
                        <div>
    </form>
 
 
</DIV>
<div>
                        <span></span>
                        <h4 >Salles des fetes</h4>
                        <span></span>
                </div>

            <div class="row">



<?php $menu = $DB->query('SELECT * FROM produit WHERE nomcat="salles des fetes"'); ?>
<?php foreach ($menu as $product): ?>
<div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '> 
<?php if(isset($_SESSION['budget'])){ ?>

    <a href="reservpage.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>" ><img class='card-img-top' src="<?php echo $product->urlp; ?>" ></a>
<?php
} ?>
<div class='feature-content d-flex align-items-center justify-content-between '>
<div class='feature-title'>
<h5><?php echo $product->nomp; ?> </h5>
<br/>
<p><?php echo $product->prixp; ?> DT</p>
</div>
<?php
if(isset($_SESSION['budget']))
    {          ?> 
    <a id="aa" onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>#salles"><img  style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
 <?php   }else {   ?>   
<a id="aa" onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>#salles"><img   style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
<?php 
} ?>
</div>
</div>
<?php endforeach ?> 
</div>
 <div>
                        <span id="hadhra"></span>
                        <br><br><br>
                        <h4 >Troupes musicales</h4>
                        <h6>hadhra</h6>
                        <span></span>
                </div>

                <div class="row">



<?php $menu = $DB->query('SELECT * FROM produit WHERE souscat="tr-hadhra"'); ?>
<?php foreach ($menu as $product): ?>
<div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '> 
<?php if(isset($_SESSION['budget'])){ ?>

<a href="reservpage.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>" ><img class='card-img-top' src="<?php echo $product->urlp; ?>" ></a>
<?php
} ?>
<div class='feature-content d-flex align-items-center justify-content-between '>
<div class='feature-title'>
<h5><?php echo $product->nomp; ?> </h5>
<br/>
<p><?php echo $product->prixp; ?> DT</p>
</div>
<?php
if( isset($_SESSION['budget']))
    {          ?> 
    <a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>#hadhra"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
 <?php   }else {   ?>   
<a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>#hadhra"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
<?php 
} ?>
</div>
</div>
<?php endforeach ?> 
</div>
 <div>
                        <span id="orchestre"></span>
                        <br/>
                        <br>
                        <br>
                        <h4 >Troupes musicales</h4>
                        <h6>orchestre</h6>
                        <span></span>
                </div>

                <div class="row">



<?php $menu = $DB->query('SELECT * FROM produit WHERE souscat="tr-troupe"'); ?>
<?php foreach ($menu as $product): ?>
<div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '> 
<?php if(isset($_SESSION['budget'])){ ?>

<a href="reservpage.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>" ><img class='card-img-top' src="<?php echo $product->urlp; ?>" ></a>
<?php
} ?>
<div class='feature-content d-flex align-items-center justify-content-between '>
<div class='feature-title'>
<h5><?php echo $product->nomp; ?> </h5>
<br/>
<p><?php echo $product->prixp; ?> DT</p>
</div>
<?php
if(isset($_SESSION['budget']))
    {          ?> 
    <a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>#orchestre"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
 <?php   }else {   ?>   
<a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>#orchestre"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
<?php 
} ?>
</div>
</div>
<?php endforeach ?> 
</div>
 <div>
                        <span id="TF"></span>
                        <br>
                        <br>
                        <br>
                        <h4 >Troupes musicales</h4>
                        <h6>Troupe femenine</h6>
                        <span></span>
                </div>

           
                <div class="row">



<?php $menu = $DB->query('SELECT * FROM produit WHERE souscat="tf"'); ?>
<?php foreach ($menu as $product): ?>
<div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '> 
<?php if(isset($_SESSION['budget'])){ ?>

<a href="reservpage.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>" ><img class='card-img-top' src="<?php echo $product->urlp; ?>" ></a>
<?php
} ?>
<div class='feature-content d-flex align-items-center justify-content-between '>
<div class='feature-title'>
<h5><?php echo $product->nomp; ?> </h5>
<br/>
<p><?php echo $product->prixp; ?> DT</p>
</div>
<?php
if(isset($_SESSION['budget']))
    {          ?> 
    <a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>#TF"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
 <?php   }else {   ?>   
<a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>#TF"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
<?php 
} ?>
</div>
</div>
<?php endforeach ?> 
</div>
      <br/>
 <div>
                        <span id="coiff"></span>
                        <br><br><br>
                        <h4 >Coiffure & beauté</h4>
                        <h6> </h6>
                        <span></span>
                </div>

                <div class="row">



<?php $menu = $DB->query('SELECT * FROM produit WHERE nomcat="Beaute & coiffure"'); ?>
<?php foreach ($menu as $product): ?>
<div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '> 
<?php if(isset($_SESSION['budget'])){ ?>

<a href="reservpage.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>" ><img class='card-img-top' src="<?php echo $product->urlp; ?>" ></a>
<?php
} ?>
<div class='feature-content d-flex align-items-center justify-content-between '>
<div class='feature-title'>
<h5><?php echo $product->nomp; ?> </h5>
<br/>
<p><?php echo $product->prixp; ?> DT</p>
</div>
<?php
if(isset($_SESSION['budget']))
    {          ?> 
    <a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>#coiff"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
 <?php   }else {   ?>   
<a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>#coiff"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
<?php 
} ?>
</div>
</div>
<?php endforeach ?> 
</div>
      <br/>
 <div>
                        <span id="patiss"></span>
                        <br><br><br>
                        <h4 >Patisserie</h4>
                        <h6> </h6>
                        <span></span>
                </div>

                <div class="row">



<?php $menu = $DB->query('SELECT * FROM produit WHERE nomcat="Patisserie"'); ?>
<?php foreach ($menu as $product): ?>
<div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '> 
<?php if(isset($_SESSION['budget'])){ ?>

<a href="reservpage.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>" ><img class='card-img-top' src="<?php echo $product->urlp; ?>" ></a>
<?php
} ?>
<div class='feature-content d-flex align-items-center justify-content-between '>
<div class='feature-title'>
<h5><?php echo $product->nomp; ?> </h5>
<br/>
<p><?php echo $product->prixp; ?> DT</p>
</div>
<?php
if(isset($_SESSION['budget']))
    {          ?> 
    <a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>#patiss"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
 <?php   }else {   ?>   
<a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>#patiss"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
<?php 
} ?>
</div>
</div>
<?php endforeach ?> 
</div>
      <br/>
 <div>
                        <span id="photo"></span>
                        <br><br><br>
                        <h4 >photographe</h4>
                        
                        <h6> </h6>
                        <span></span>
                </div>

                <div class="row">



<?php $menu = $DB->query('SELECT * FROM produit WHERE nomcat="photographe"'); ?>
<?php foreach ($menu as $product): ?>
<div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '> 
<?php if(isset($_SESSION['budget'])){ ?>

<a href="reservpage.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>" ><img class='card-img-top' src="<?php echo $product->urlp; ?>" ></a>
<?php
} ?>
<div class='feature-content d-flex align-items-center justify-content-between '>
<div class='feature-title'>
<h5><?php echo $product->nomp; ?> </h5>
<br/>
<p><?php echo $product->prixp; ?> DT</p>
</div>
<?php
if(isset($_SESSION['budget']))
    {          ?> 
    <a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>#photo"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
 <?php   }else {   ?>   
<a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>#photo"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
<?php 
} ?>
</div>
</div>
<?php endforeach ?> 
</div>
      <br/>
 <div>
                        <span id="deco"></span>
                        <br><br><br>
                        <h4 >decoration & location</h4>
                        <h6> </h6>
                        <span></span>
                </div>

                <div class="row">



<?php $menu = $DB->query('SELECT * FROM produit WHERE nomcat="Decoration & location"'); ?>
<?php foreach ($menu as $product): ?>
<div class='col-lg-3 col-sm-6 px-0 single-features-area' style='margin:20px 20px 20px 20px '> 
<a href="reservpage.php?idp=<?php echo $product->idp; ?>" ><img class='card-img-top' src="<?php echo $product->urlp; ?>" ></a>
<div class='feature-content d-flex align-items-center justify-content-between '>
<div class='feature-title'>
<h5><?php echo $product->nomp; ?> </h5>
<br/>
<p><?php echo $product->prixp; ?> DT</p>
</div>
<?php
if(isset($_SESSION['budget']))
    {          ?> 
    <a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>&budget=<?php echo $_GET['budget'];?>#deco"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
 <?php   }else {   ?>   
<a onclick="return Validate()" href="categorie.php?idp=<?php echo $product->idp; ?>#deco"><img style ='width:40px;heigth:40px;' src='img/core-img/add.png'></a>
<?php 
} ?>
</div>
</div>
<?php endforeach ?> 
</div>
</form>
        </div>      
          
        

        </section>
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
   <div id="box">
   <h1>Votre Budget est Insuffisant</h1>
   <a href="return2.php?revenir" class="close">Fermer</a>
   </div>  
           <script  type="text/javascript" >
    function Validate(){
        var b = <?php echo $_GET['budget'];?>;
     
         var a=<?php echo $panier->total();?>+2000;
     if(b < a){ 
      document.getElementById("box").style.display = "block";
        return false;
    }
return true;}
    
    </script>
</body>
</html>