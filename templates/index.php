<?php
  //echo getcwd()."/ground/sideBar.php";
  //echo $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
  include_once $_SERVER['DOCUMENT_ROOT'] ."/a_team/a_team5/earthport/config/config.php";

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
  include GROUND_DIR.'/sideBar.php';
?>  

<div class="bgded overlay" style="background-image:url('./images/demo/backgrounds/bg.jpg');">
  <?php
    include GROUND_DIR . "/header.php";
  ?>
  <!--main banner-->
  <?php
    include MAINPAGE_DIR . "/mainPageBanner.php";
  ?>

</div>

<!-- End Top Background Image Wrapper -->
<?php
  include MAIN_DIR . "/article_all.php";
?>

<!--footer-->
<?php
  include GROUND_DIR . "/footer.php";
?>
<!--Javascript-->
<?php
  include GROUND_DIR . "/javascriptpart.php";
?>

</body>
</html>
