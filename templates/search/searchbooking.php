<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

if(isset($_SESSION["ID"])){
	echo '<script>document.location.href="'.TICKET_ROOT.'/ticketbookingForm.php";</script>';
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

	<!--찾는 부분-->
	<div class="searchTicketing-back">
		<div class="searchTicketing">
			<form id="searchFlight" action="<? echo TICKET_ROOT.'/ticketbookingForm.php'?>" method="post" target="_blank">
				<ui class="findTicketing">
					<li class="findTicketing_f">
						<label for="startingCity">예매 번호</label>
						<input type="text" name="booking_no" placeholder="예매 번호" required="required" />
					</li>
					<button type="submit" class="btn btn-primary btn-block btn-lg">
						<i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>예매 조회하기
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
