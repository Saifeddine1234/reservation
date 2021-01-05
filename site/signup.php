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


    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg)"></div>
    <!-- ***** Breadcumb Area End ***** --> 
    <section class="dorne-explore-area d-md-flex mb-50">
        <!-- Explore Search Area -->
        <div class="container mt-40">
             <div class="row mr-50 mt-40 ml-50 ">
    <!-- ****** Start Sign up ******* -->
    

 <h1 style="margin-left:100px">Créer Compte</h1>
 <br>

 <form method="POST" action="insert.php"  name="vform"  >

  <div classe="mt-50 ml-50 mr-50 justify-content-center">
  <div class="row">
<div class="col-12">
    <div id="name_div">
  <label for="nom"><b>Nom</b> <b style="color:red;"> *</b></label><div class="ml-5" id="name_error"></div>
    <input type="text" placeholder="nom" class="form-control" name="nomc"  required> 
</div>
</div>
<div class="col-12">
<div id="prenom_div">
    <label for="prenom"><b>Prénom</b> <b style="color:red;"> *</b></label><div class="ml-5" id="prenom_error"></div>
    <input type="text" placeholder="Prénom" class="form-control" name="prenomc" required>
  </div>
</div>
<div class="col-12">
 <div id="login_div">
    <label for="Pseudo"><b>Pseudo</b> <b style="color:red;"> *</b></label><div class="ml-5" id="login_error"></div>
    <input type="text" placeholder="Pseudo" name="login" class="form-control" required>
 </div>
</div>
<div class="col-12">
<div id="password_div">
    <label for="password"><b>Mot de passe</b><b style="color:red;"> *</b></label><div class="ml-5" id="password_error"></div>
    <input type="password" placeholder="Mot de passe" class="form-control" name="mdp" required>
    
      </div>
    </div>
<br>
<div class="col-12">
 <div id="login_div">
    <label><b>numero de Telephone 1 :</b> <b style="color:red;"> *</b></label><div class="ml-5" id="login_error"></div>
    <input type="text" placeholder="numero 1" name="num1" class="form-control" required>
 </div>
</div>
<div class="col-12">
<div id="password_div">
    <label><b>numero de Telephone 2 :</b><b style="color:red;"> *</b></label><div class="ml-5" id="password_error"></div>
    <input type="text" placeholder="numero 2" class="form-control" name="num2" required>
    
      </div>
    </div>
<br>
<br>
<div class="col-12">
<div id="emailc_div">
    <label for="mail"><b>Email</b> <b style="color:red;"> *</b></label><div class="ml-5" id="emailc_error"></div>
    <input  type="text" placeholder="E-mail" class="form-control" name="emailc" required>
      </div>
  </div>
<br>
<br>

<div class="col-12">
<br>
<br>
    <input type="submit" class="btn btn-primary" name="registre" value="Inscription" onclick=" return Validate(); ">
  </div>
  <div class="signin">
  <?php 
 if(isset($_SESSION['budget']))
 { ?>
  <p>Vous avez déjà un compte?<a href="signin.php?budget=<?php echo $_GET['budget'];?>">Connexion</a>.</p>
 <?php }else{ ?>
  <p>Vous avez déjà un compte? <a href="signin.php">Connexion</a>.</p><?php
 } ?>

  </div>
</div>
</div>
</form>
</div>
     <!-- ****** end Sign up ******* -->
            </div>
        </div>
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

<script type="text/javascript">

// SELECTING ALL TEXT ELEMENTS
var firstname = document.forms['vform']['nomc'];
var lastname = document.forms['vform']['prenomc'];
var login = document.forms['vform']['login'];
var password = document.forms['vform']['mdp'];
var emailc = document.forms['vform']['num2'];
var tel = document.forms['vform']['num1'];
var emailc = document.forms['vform']['emailc'];
var tel = document.forms['vform']['telc'];

// SELECTING ALL ERROR DISPLAY ELEMENTS
var name_error = document.getElementById('name_error');
var prenom_error = document.getElementById('prenom_error');
var login_error = document.getElementById('login_error');
var password_error = document.getElementById('password_error');
var emailc_error = document.getElementById('emailc_error');
var tel_error = document.getElementById('tel_error');
var num1_error = document.getElementById('num1_error');
var num2_error = document.getElementById('num2_error');
// SETTING ALL EVENT LISTENERS
firstname.addEventListener('blur', nameVerify, true);
lastname.addEventListener('blur', prenomVerify, true);
login.addEventListener('blur', loginVerify, true);
tel.addEventListener('blur', telVerify, true);
emailc.addEventListener('blur', emailcVerify, true);
password.addEventListener('blur', passwordVerify, true);
num1.addEventListener('blur', num1Verify, true);
num2.addEventListener('blur', num2Verify, true);
// validation function



function Validate() {
 


  // validate username
  if (firstname.value==""){
    firstname.style.border = "1px solid red";
    document.getElementById('name_div').style.color = "red";
    name_error.textContent = " remplir le champ Nom";
    firstname.focus();
    return false;
  }
  // validate lastname
   if (lastname.value=="") {
    lastname.style.border = "1px solid red";
    document.getElementById('prenom_div').style.color = "red";
    prenom_error.textContent = " remplir le champ Prénom";
    lastname.focus();
    return false;
  }
 // validate num1
 if (num1.value==""){
    num1.style.border = "1px solid red";
    document.getElementById('num1_div').style.color = "red";
    num1_error.textContent = " remplir le champ numero";
    num1.focus();
    return false;
  }
  // validate num1
 if (num2.value==""){
    num2.style.border = "1px solid red";
    document.getElementById('num2_div').style.color = "red";
    num2_error.textContent = " remplir le champ numero";
    num2.focus();
    return false;
  }

  // validate pseudo
   if (login.value =="") {
    login.style.border = "1px solid red";
    document.getElementById('login_div').style.color = "red";
    login_error.textContent = " remplir le champ Pseudo";
    pseudo.focus();
    return false;
  }
  // validate password
     if (password.value =="" ) {
    password.style.border = "1px solid red";
    document.getElementById('password_div').style.color = "red";
    password_error.textContent = " remplir le champ de mot de passe";
    return false;
  }

   // validate email
 if(vform.emailc.value=="")
{
  vform.emailc.style.border = "1px solid red";
    document.getElementById('emailc_div').style.color = "red";
  emailc_error.textContent = " remplir le champ Email";
  vform.emailc.focus();  
  return false;
} 

var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

if (reg.test(vform.emailc.value) == false) 
{
  vform.emailc.style.border = "1px solid red";
    document.getElementById('emailc_div').style.color = "red";
  emailc_error.textContent = "forme incorrect";
  vform.emailc.focus();  
  return false;
}

}

function nameVerify() {
  if (firstname.value !=="") {
   firstname.style.border = "1px solid #5e6e66";
   document.getElementById('name_div').style.color = "#5e6e66";
   name_error.innerHTML = "";
   return true;
  }
}
function prenomVerify() {
  if (lastname.value !=="") {
   lastname.style.border = "1px solid #5e6e66";
   document.getElementById('prenom_div').style.color = "#5e6e66";
   prenom_error.innerHTML = "";
   return true;
  }
}
function loginVerify() {
  if (login.value !=="") {
   login.style.border = "1px solid #5e6e66";
   document.getElementById('login_div').style.color = "#5e6e66";
   login_error.innerHTML = "";
   return true;
  }
}

function passwordVerify() {
 if (password.value !=="" ) {
    password.style.border = "1px solid #5e6e66";
    document.getElementById('password_div').style.color = "#5e6e66";
    password_error.innerHTML ="";
    return true;
  }
}
function num1Verify() {
 if (num1.value !=="" ) {
    num1.style.border = "1px solid #5e6e66";
    document.getElementById('num1_div').style.color = "#5e6e66";
    num1_error.innerHTML ="";
    return true;
  }
}
function num2Verify() {
 if (num2.value !=="" ) {
    num2.style.border = "1px solid #5e6e66";
    document.getElementById('num2_div').style.color = "#5e6e66";
    num2_error.innerHTML ="";
    return true;
  }
}
function emailcVerify() {
  if (reg.test(vform.emailc.value) == true) 
{
   vform.emailc.style.border = "1px solid #5e6e66";
    document.getElementById('emailc_div').style.color = "#5e6e66";
    emailc_error.innerHTML = "";
    return true;
  }
}
</script>
