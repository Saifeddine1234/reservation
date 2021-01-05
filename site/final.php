<?php
if(isset($_POST['submit'])){

include_once("connexion.inc.php");
 $reqt = "SELECT * FROM reserver WHERE codelocal='".($_GET['codelocal'])."'";
$rest= mysqli_query($conn,$reqt) or die (mysqli_error($conn)); ;
$raw =mysqli_fetch_array($rest,MYSQLI_NUM);
if(($_POST['time']=="")||($_POST['peaple']=="")){
    header("location:reservpage.php?pseudo=".$_GET['pseudo']."&codelocal=".$_GET['codelocal']."&error=Svp remplir les champs ");
}elseif($_POST['date']==$raw[2]){
    header("location:reservpage.php?pseudo=".$_GET['pseudo']."&codelocal=".$_GET['codelocal']."&daterror=Cette local ete reservée dans la meme date: ".$raw[2]."");
}


    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     <link rel="stylesheet" type="text/css" href="style.css">
       <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/sign.css">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Lamma booking website</title>

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
                                session_start();            
 
    if(isset($_SESSION['login']))
    { 
        echo" <a class='navbar-brand' href='index.php?pseudo=".$_GET['pseudo']."'><img class='logo' src='img/core-img/lam.png' alt=''></a>";?>
                               
                                <?php
 }
    else
    { ?>
            <a class="navbar-brand" href="index.php"><img class="logo" src="img/core-img/lam.png" alt=""></a>
         <?php

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
         echo"<a class='nav-link' href='index.php?pseudo=".$_GET['pseudo']."'>Home <span class='sr-only'>(current)</span></a>" ?>
          <?php
 }
    else
    { ?>
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
         <?php

    }
 
?>

                                </li>
                                <li class="nav-item ">

                                   <?php 
                                      
 
    if(isset($_SESSION['login']))
    { 
        echo" <a class='nav-link ' href='placess.php?pseudo=".$_GET['pseudo']."'>Places </a>"?>
                               
                                <?php
 }
    else
    { ?>
          <a class="nav-link" href="placess.php">Places <span class="sr-only"></span></a>
         <?php

    }
 
?>
                                </li>
                                <li class="nav-item active">
                                   <?php 
                                  
 
    if(isset($_SESSION['login']))
    { 
        echo" <a class='nav-link '' href='categorie.php?pseudo=".$_GET['pseudo']."'>categories </a>" ?>
        
         <?php
 }
    else
    { ?> <a class="nav-link " href="categorie.php">categories </a>

   <?php

    }
 
?>                             
                                </li>
                                <li class="nav-item">
                                      <?php 
                                       
 
    if(isset($_SESSION['login']))
    { 
                                      echo" <a class='nav-link '' href='contact.php?pseudo=".$_GET['pseudo']."'>Contact </a>" ?>
       <?php
 }
    else
    { ?> 
       <a class="nav-link" href="contact.php">Contact</a> 

       <?php

    }
 
?>                             
                                       
                                </li>
                            </ul>
                            <!-- Search btn -->
                          
                            <?php
      
 
    if(isset($_SESSION['login']))
    {                       
?>
  
      <div class="text-white p-3">
                             <?php echo $_GET['pseudo'] ?>
                            </div>

                            <button type="button" class="btn btn-default btn-sm ">
          <span class="glyphicon glyphicon-log-out"></span><a href="logout.php?logout">Log out</a>
        </button>

        <?php
 }
    else
    { ?>
   <!-- Signin btn -->
                            <div class="dorne-signin-btn">
                                <a href="signup.php">Sign in  or sign up</a>
                            </div>
    <?php

    }
 
?>
                            <!-- Add listings btn 
                            <div class="dorne-add-listings-btn">
                                <a href="#" class="btn dorne-btn">+ Add Listings</a>
                            </div>-->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg)"></div>
    <!-- ***** Breadcumb Area End ***** -->



               <!-- ***** Listing Destinations Area Start ***** -->
          <section class="dorne-explore-area d-md-flex mb-50">   
            <div class="container mt-40">
             <div class="row ml-40 col-sm-12 "> 
     
 <div class="col-sm-11 form-group-lg">
     <div class="hero-content">
        <?php 
 include_once("connexion.inc.php");
$req="Select * from produit where 
idp=".$_GET['idp'];
$res= mysqli_query($conn,$req);
$raw =mysqli_fetch_array($res,MYSQLI_NUM);
                echo"<h3 >Place :  ".$raw[4]." </h3>";
?>
            </div>
        </div>
            <br>
             
                <div class="col-sm-11">
                    <?php
                  echo "<p>".$raw[2]."</p>";


 

if(!empty($_POST['box'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['box'] as $selected){
//echo $selected."</br>";
}
}

$selected_time = $_POST['time'];  // Storing Selected Value In Variable
echo "<h6 name='time'>You have selected :" .$selected_time."</h6>";  // Displaying Selected Value
$selected_peaple = $_POST['peaple'];  // Storing Selected Value In Variable
echo "<h6 name='guests'>You have selected :" .$selected_peaple." guests</br></h6>";  // Displaying Selected Value

$final=0;
if(!empty($_POST['box'])){
foreach($_POST['box'] as $selected){
$final=$selected+$final;
}
}else $final=0;
$date = $_POST['date'];
if(!empty($_POST['date'])){
echo "<h6 name='date'>You have selected date on :" .$date."</h6>";
    }

echo" <h6>PRIX SERVICES = ".$final." DT<br></h6><br>";


 include_once("connexion.inc.php");
$req="Select * from local where 
codelocal=".$_GET['codelocal'];
$res= mysqli_query($conn,$req);
$raw =mysqli_fetch_array($res,MYSQLI_NUM);
$total=$final+$raw[1];



echo "<h5 name='prixtotal'>PRIX TOTAL = <b>".$total." DT</b></h5><br>";
echo"<form action='confirm.php?codelocal=".$_GET['codelocal']."&pseudo=".$_GET['pseudo']."&time=".$selected_time."
 &guests=".$selected_peaple."&prixtotal=".$total."&date=".$date."' method='POST'>";
//to run PHP script on submit
?>

                </div>
          

<br>
  <br>
<div class="col-sm-11 justify-content-center ">
    <input type="submit" name="submit" value="Confirmation" class="btn dorne-btn mt-20 col-sm-12">
  </div>

</form>

</div>

            </div>

  <div class=" col-md-6 mt-40 mr-50  " >
           <div class="col-sm-12 justify-content-center ">
          <?php
          include_once("connexion.inc.php");
$req="Select * from local where 
codelocal=".$_GET['codelocal'] ;
$res= mysqli_query($conn,$req);
$raw =mysqli_fetch_array($res,MYSQLI_NUM);
echo"<img src=".$raw[3]." alt='' style='border-radius: 25px;'>";
          ?></div>
     
          
        </div>
    

  </section>
    <!-- ***** Listing Destinations Area End ***** -->

    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                       <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://alphox.com" target="_blank">Alphox</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
<?php
}elseif(isset($_POST['comment']))
{
include_once("connexion.inc.php");
$reqt="insert into comment values(NULL,'".$_GET['idp']."','".$_POST['titrec']."','".$_POST['commentc']."')";
$res=mysqli_query($conn,$reqt);
//$id=Mysqli_Insert_id($conn);
if ($res){
    header("Location:reservpage.php?budget=".$_GET['budget']."");

    
    } else echo ("erreur");

}
?>