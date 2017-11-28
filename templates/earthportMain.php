<?php
  echo getcwd()."/pages/sideBar.php";
?>

<!DOCTYPE html>
<!--
Template Name: EARPORT
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>가자 전세계로- EARPORT365</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="./layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!--위의 상단바-->
<?php
  include getcwd()."/pages/sideBar.php";
?>

<div class="bgded overlay" style="background-image:url('./images/demo/backgrounds/bg.jpg');"> 
  <?php
    include "./pages/header.php";
  ?>
  <!--main banner-->
  <?php
    include "./pages/pageMainBanner.php";
  ?>
  
</div>

<!-- End Top Background Image Wrapper -->
<?php
  include "./pages/article_all.php";
?>

<!--footer-->
<?php
  include "./pages/footer.php";
?>
<!--Javascript-->
<?php
  include "./pages/javascriptpart.php";
?>

</body>
</html>