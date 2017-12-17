<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';
	//로그인 되어있으면 //예매 확인. 없으면 예매 조회로.
if(isset($_SESSION["ID"])){
	$sql = "select * FROM ticketing WHERE TICKETING_NO IN (select TICKETING_NO FROM TICKETING_BOOKING where BOOKING_NO IN (select BOOKING_NO FROM MEMBER_BOOKING where id IN (select id from MEMBER WHERE id = '".$_SESSION["ID"]."')))";
	$stmt = oci_parse($conn, $sql);
	oci_execute($stmt);
	#var_dump($_POST);
	#echo $sql;
	$row_num = oci_fetch_all($stmt, $row);
}else{
	$sql = "select * FROM ticketing where TICKETING_NO IN (select TICKETING_NO from TICKETING_BOOKING WHERE BOOKING_NO = '".$_POST["booking_no"]."')";
	$stmt = oci_parse($conn, $sql);
	oci_execute($stmt);
	#var_dump($_POST);
	#echo $sql;
	$row_num = oci_fetch_all($stmt, $row);
    //디비에서 받아오기.
}
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

	<!--검색한 부분 여기서는 운항편 정보를 알려준다.-->
	<div class="findResult-back">
		<div class="findResult">
			<table>
				<tr>
					<td>예매 번호</td>
					<td>운항편 번호</td>
					<td>출발지</td>
					<td>목적지</td>
					<td>예상 이동 시간</td>
					<td>변경 시간</td>
					<td>가는날</td>
					<td>오는날</td>
					<td>비행기 번호</td>
					<td>게이트 번호</td>
					<td>좌석 번호</td>
					<td>예매 취소</td>
				</tr>
				<?
				if($row_num == 0){
				?>
				<tr>
					<td class ="noSearchNum" colspan="12">조회하신 예매 목록이 없습니다.
					</td>
				</tr>
				<?}else{
				for ($i=0; $i < $row_num; $i++) { 
				?>
				<tr>
					<td><?echo $row["BOOKING_NO"][$i]?></td>
					<td><?echo $row["TICKETING_NO"][$i]?></td>
					<td><?echo $row["STARTING"][$i]?></td>
					<td><?echo $row["DESTINATION"][$i]?></td>
					<td><?echo $row["TIME"][$i]?></td>
					<td><?echo $row["CHANGE_TIME"][$i]?></td>
					<td><?echo $row["DEPARTURE_DATE"][$i]?></td>
					<td><?echo $row["ARRIVAL_DATE"][$i]?></td>
					<td><?echo $row["AIRPORT_NO"][$i]?></td>
					<td><?echo $row["GATE_NO"][$i]?></td>
					<td><?echo $row["SEAT_NO"][$i]?></td>
					<td><input type="submit" name="cancel" value="예매 취소"></td>
				</tr>
				<?}}?>
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
