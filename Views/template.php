<?php
session_start();

if(isset($_GET['route'])){
   if($_GET['route'] == "home" || 
      $_GET['route'] == "gallery" ||
      $_GET['route'] == "logout" ||
      $_GET['route'] == "about"    ||
      $_GET['route'] == "gallery-2"    ||
      $_GET['route'] == "te"  ||
      $_GET['route'] == "te1"  ||
      $_GET['route'] == "contact"){
      include("modules/".$_GET['route'].".php");
   }else if($_GET['route'] == "dashboard"       || 
         $_GET['route'] == "addPost"            ||
         $_GET['route'] == "background-images"  ||
         $_GET['route'] == "dash-about"         ||
         $_GET['route'] == "dash-contact"       ||
         $_GET['route'] == "dash-users"         ||
         $_GET['route'] == "footer-info"        ||
         $_GET['route'] == "gallery-add"        ||
         $_GET['route'] == "gallery-view"
      ){
         if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == "kaqasje"){
         include("Views/includes/header.php");
         include("modules/dashboard/".$_GET['route'].".php");
         include("Views/includes/footer.php");
  
      }else{
     include("modules/login.php");  
   }
}else{
   include("modules/404.php"); 
}
}else{
  include("modules/home.php");

}
?>