<?php
define("SERVEUR","localhost");
define("NOMBASE","reservation");
define("USER","root");
define("MDP","");
$conn=mysqli_connect(SERVEUR,USER,MDP,NOMBASE) or die("connect impossible");
?>