<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

  if(!isset($_SESSION["ID"])){
    ?>
    <script>
      alert('로그인이 필요합니다.');
    	document.location.href="../login/login.php";
    </script>
    <?
  }
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
?>

<!DOCTYPE html>
<!--
Template Name: EARTHPORT
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

	<!--티켓 예약 부분-->
	<div class="ticketing-back ">
		<div class="ticketing">
			<form id="searchFlight" action="<? echo TICKET_ROOT.'/ticketbookingForm.php'?>" method="post" name = "userinput">
				<ui class="where">


          <li class="whereStarting">
						<label for="startingCity">출발지</label>
						<select required="required" name="starting" >
              <?
                $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

                $query = "select distinct starting from TICKETING";

                $stmt = oci_parse($conn, $query);
                oci_execute($stmt);
                $row_num = oci_fetch_all($stmt, $row);

                if(!$conn){
                  echo "not connect DB";
                }

                for($i = 0; $i<$row_num; $i++){
                  echo "<option value='".$row["STARTING"][$i]."'>".$row["STARTING"][$i]."</option>";
                }
              ?>
            </select>
					</li>




					<li class="whereDestination">
						<label for="destinationCity">도착지</label>
            <select required="required" name="destination" >
              <?


                $query = "select distinct destination from TICKETING";

                $stmt = oci_parse($conn, $query);
                oci_execute($stmt);
                $row_num = oci_fetch_all($stmt, $row);


                if(!$conn){
                  echo "not connect DB";
                }

                for($i = 0; $i<$row_num; $i++){
                  echo "<option>".$row["DESTINATION"][$i]."</option>";
                }
              ?>
            </select>
					</li>
				</ui>
				<ui class="when">
					<li class="whenDateDeparture">
						<label for="departureDate">가는날</label>
						<input type="date" name="DEPARTURE_DATE" placeholder="가는날" required="required" />
					</li>
					<li class="whenDateArrive">
						<label for="arriveDate">오는날</label>
						<input type="date" name="ARRIVIE_DATE" placeholder="오는날" required="required" />
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
