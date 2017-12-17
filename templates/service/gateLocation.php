<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

  $query = "select * from gate";

  $stmt = oci_parse($conn, $query);
  oci_execute($stmt);

  
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
</head>
<body id="top">
<!--위의 상단바-->
<?php
  include GROUND_DIR."/sideBar.php";
?>

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
  <?php
    include GROUND_DIR . "/header.php";
  ?>
</div>
<!-- End Top Background Image Wrapper -->
  <!--정보 제공형 페이지. 게이트 번호와 위치만 알려준다.-->
  <div class="searchGateLoc-back">
		<div class="searchGateLoc">
			<table border=1 cellspacing=0 cellpadding=5>
				<tr class="location">
					<td>게이트 번호</td>	<!--1-->
					<td>게이트 위치</td>	<!--2-->
				</tr>
				<? while (($row_num = oci_fetch_all($stmt,$row)) != false) {
					# code...
				}{?>
			<tr> 
				<td class="gateNo"><?=$row_num['GATE_NO']?></td>			<!--게이트 번호.-->
				<td class="location"><?=$row_num['LOCATION']?>"></td>		<!--게이트 위치-->
			</tr>
		<? } ?>
	</table> 

</div>
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
