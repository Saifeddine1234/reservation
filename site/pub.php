  <html>
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width ,intial-scrale=1,user-scalable=no" />
  <title>menu</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <script src="jquery.js"></script>
  <script>
    
    $(document).ready(function(){
    $("#slider img").hide();
    i=0;
    affiche();
    function affiche(){
    i++ ;
  
    
    if (i==1) prec="#slide4";
    
    else prec="#slide"+(i-1);
    ac="#slide"+i;
    
    $(prec).hide();
    $(ac).show(); 
    if(i==4) i=0;
    }
    setInterval(affiche,3000);
  });
  </script>
 </head>
 <body>
 <div class="menuu">
    <div class="gauche3">
      <div class="gauche" >
      <ul><B>
      <li><a href="#noscafes">Nos Cafés</a></li>
      <li><a href="#nosboissons">Nos Boissons</a></li>
      <li><a href="#nosjus">Nos Jus</a></li>
      <li><a href="#nospaninis">Nos Paninis</a></li>
      <li><a href="#nospizzas">Nos Pizzas</a></li>
      <li><a href="#noscrepes">Nos Crepes</a></li>
      <li><a href="#nosglaces">Nos Glaces</a></li>
    </B></ul>
    </div>
        <div class="gauche1">
     <div id="global">  
  
  <div id="slider">
    <div class="pub" id="image">
<?php
 $link = mysqli_connect('localhost','root','','cafee');
$req="SELECT * FROM pub";
$res= mysqli_query($link,$req);
while(($raw =mysqli_fetch_array($res,MYSQLI_NUM))!=null)
      { echo "<img class='slm' id='".$raw[2]."' src='".$raw[3]."'/>";}
      ?>
    </div>
  </div> 
</div>
    </div>
 </body>
 
 
  </html>
  