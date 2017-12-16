<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';
session_start();

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

	<!--티켓 예약 부분-->
	<div class="ticketing-back ">
		<div class="ticketing">
			<form id="searchFlight" action="<? echo TICKET_ROOT.'ticketbookingForm'?>" method="post">
				<ui class="where">
					<li class="whereStarting">
						<label for="startingCity">출발지</label>
						<input type="text" name="starting" placeholder="출발지" required="required" />
					</li>
					<li class="whereDestination">
						<label for="destinationCity">도착지</label>
						<input type="text" name="destination" placeholder="도착지" required="required" />
					</li>
				</ui>
				<ui class="when">
					<li class="whenDateDeparture">
						<label for="departureDate">가는날</label>
						<input type="text" name="DEPARTURE_DATE" placeholder="가는날" required="required" />
					</li>
					<li class="whenDateArrive">
						<label for="arriveDate">오는날</label>
						<input type="text" name="ARRIVIE_DATE" placeholder="오는날" required="required" />
					</li>
				</ui>
				<ui>
					<button type="submit" class="btn btn-primary btn-block btn-lg">
						<i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>항공권 검색
					</button>
				</ui>
			</form>
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
