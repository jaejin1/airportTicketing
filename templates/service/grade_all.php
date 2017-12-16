<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

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
<title>EARPORT</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


</head>
<body id="top">
<!--위의 상단바-->
<?php
  include GROUND_DIR . "/sideBar.php";
?>

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
  <?php
    include GROUND_DIR . "/header.php";
  ?>
</div>
<!-- End Top Background Image Wrapper -->

<div>

  <table>
    <tr>
      <td>등급별 혜택</td>
      <td>할인율 </td>
      <td>월별 쿠폰 개수 </td>
    </tr>
    <tr>
      <td>normal</td>
      <td> 5 % </td>
      <td> 10개 </td>
    </tr>
    <tr>
      <td>VIP</td>
      <td> 20 % </td>
      <td> 20개 </td>
    </tr>
  </table>


</div>

<!--footer 부분-->
<?php
  include GROUND_DIR . "/footer.php";
?>
<!-- JAVASCRIPTS -->
<?php
  include GROUND_DIR . "/javascriptpart.php";
?>
</body>
</html>
