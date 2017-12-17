<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

	$query = "select ticketing.*, ticketing_airport.airport_no, ticketing_gate.gate_no from ticketing JOIN ticketing_airport ON ticketing.TICKETING_NO = ticketing_airport.TICKETING_NO JOIN ticketing_gate ON  ticketing.ticketing_no = ticketing_gate.ticketing_no";		

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt);

	$row_num = oci_fetch_all($stmt, $row);
	//echo "개수".$row_num."<br>";
	//var_dump($row)."<br>";
	//echo $query."<br>";
	if(!$conn){
		echo "not connect DB";
	}
	oci_close($conn);
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
	include GROUND_DIR . "/sideBar.php";
	?>

	<!-- Top Background Image Wrapper -->
	<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
		<?php
		include GROUND_DIR . "/header.php";
		?>
	</div>
	<!-- End Top Background Image Wrapper -->

	<!--스케줄 부분-->

	<!--전체 스케줄 조회한다.-->
	<div class="searchSchedul-back">
		<div class="searchSchedul">
			<table border=1 cellspacing=0 cellpadding=5>
				<tr class="titleLabel">
					<td>운항편 번호</td>	<!--1-->
					<td>출발지</td>		<!--2-->
					<td>도착지</td>		<!--3-->
					<td>탑승 시간</td>		<!--4-->
					<td>변경 시간</td>		<!--5-->
					<td>비행기 번호</td>	<!--6-->
					<td>가는 날</td>		<!--7-->
					<td>오는 날</td>		<!--8-->
					<td>게이트 번호</td>	<!--9-->
					<td>예매</td>			<!--10-->
				</tr>
				<?
				if($row_num == 0){
				?>
				<tr>
					<td class ="noSearchSchedul" colspan="10">조회하신 운항편 목록이 없습니다.
					</td>
				</tr>
				<?}else{
					for ($i=0; $i < $row_num; $i++) { 
				?>
				<tr class="titleSchedul">
					<form action="<?echo TICKET_ROOT.'/bookingPro.php'?>" method="POST" name ="TICKETING_NO">
						<td><? echo $row["TICKETING_NO"][$i]?></td>						<!--운항편 번호.-->
					<td><? echo $row["STARTING"][$i]?></td>							<!--출발지-->
					<td><? echo $row["DESTINATION"][$i]?></td>						<!--도착지-->
					<td><? echo $row["TIME"][$i]?></td>								<!--탑승 시간-->
					<td><? echo $row["CHANGE_TIME"][$i]?></td>						<!--변경 시간-->
					<td><a href="" target="_blank" onclick="window.open('<? echo SERVICE_ROOT?>/showAirport.php?AIRPORT_NO=<?=$row['AIRPORT_NO'][$i]?>', '_blank', 'width=550 height=500')">
						<? echo $row["AIRPORT_NO"][$i]?></a></td>								<!--비행기 번호 클릭시 조회-->
					<td><? echo $row["DEPARTURE_DATE"][$i]?></td>						<!--가는 날-->
					<td><? echo $row["ARRIVAL_DATE"][$i]?></td>						<!--오는 날-->
					<td><? echo $row["GATE_NO"][$i]?></td>							<!--게이트 번호 클릭시 위치-->
					<td ><input type="submit" value="예매"></td>
					</form>
				</tr>
					<? }} ?>
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
