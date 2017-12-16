<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

	$query = "select * from ticketing";		// 질의 수정.
	$stmt = oci_parse($conn, $query);
	oci_execute($stmt);

	//$row_num = oci_fetch_all($stmt, $row);

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
	<title>EARTHPORT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<link href="../layout/styles/ticketing.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
	<!--위의 상단바-->
	<?php
	include GROUND_ROOT . "/sideBar.php";
	?>

	<!-- Top Background Image Wrapper -->
	<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
		<?php
		include GROUND_ROOT . "/header.php";
		?>
	</div>
	<!-- End Top Background Image Wrapper -->

	<!--스케줄 부분-->

	<!--전체 스케줄 조회한다.-->
	<div class="searchSchedul-back">
		<div class="searchSchedul">
			<table border=1 cellspacing=0 cellpadding=5>
				<tr class="title">
					<td>운항편 번호</td>	<!--1-->
					<td>예매 번호</td>		<!--2-->
					<td>출발지</td>		<!--3-->
					<td>도착지</td>		<!--4-->
					<td>탑승 시간</td>		<!--5-->
					<td>비행기 번호</td>	<!--6-->
					<td>가는 날</td>		<!--7-->
					<td>오는 날</td>		<!--8-->
					<td>게이트 번호</td>	<!--9-->
					<td>좌석 번호</td>		<!--10-->
				</tr>
			
				<? while($row_num= oci_fetch_array($stmt, $OCI_BOTH)){?>
			<tr> 
				<td class="num"><?=$row_num["TICKETING_NO"]?></td>			<!--운항편 번호.-->
																			<!--예매 번호. 가격 확인 alert -->
					<td><?=$row_num["STARTING"]?></td>							<!--출발지-->
					<td><?=$row_num["DESTINATION"]?></td>						<!--도착지-->
					<td><?=$row_num["TIME"]?></td>								<!--탑승 시간-->
					<!--<td><?=$row_num[""]?></td>	-->								<!--비행기 번호 클릭시 조회 가능. sql in 해야함-->
					<td><?=$row_num["DEPARTURE_DATE"]?></td>					<!--가는 날-->
					<td><?=$row_num["ARRIVAL_DATE"]?></td>						<!--오는 날-->
					<!--<td><?=$row_num[""]?></td>			-->								<!--게이트 번호 sql in 해야함-->
				<!--	<td><?=$row_num[""]?></td>			-->								<!--좌석 번호 sql in 해야함-->
				</tr>
			<? } ?>
		</table> 

	</div>
</div>

<!--footer 부분-->
<?php
include GROUND_ROOT . "/footer.php";
?>
<!-- JAVASCRIPTS -->
<?php
include GROUND_ROOT . "/javascriptpart.php";
?>

</body>
</html>
