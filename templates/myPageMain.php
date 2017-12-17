<?php
  session_start();

	include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

	$id = $_SESSION["ID"];

	$query = "select * from member where id='".$id."'";		// 질의 수정.

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
	<title>EARPORT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="./layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">
	<!--위의 상단바-->
	<?php
	include GROUND_DIR."/sideBar.php";
	?>

	<!-- Top Background Image Wrapper -->
	<div class="bgded overlay" style="background-image:url('./images/demo/backgrounds/bg.jpg');">
		<?php
		include GROUND_DIR."/header.php";
		?>
	</div>
	<!-- End Top Background Image Wrapper -->
	<!-- 마이 페이지 부분-->
<div class="searchGradeALL-back">
  <div class=searchGradeAll>
			<table>
				<tr>
					<td>ID</td>
					<td><?php echo($row["ID"][0]); ?></td>
				</tr>
				<tr>
					<td>등급</td>
					<td><?php echo($row["GRADE"][0]); ?></td>
				</tr>
				<tr>
					<td>가입일자</td>
					<td><?php echo($row["REG_DATE"][0]); ?></td>
				</tr>
				<tr>
					<td>이름</td>
					<td><?php echo($row["NAME"][0]); ?></td>
				</tr>
				<tr>
					<td>생년월일</td>
					<td><?php echo($row["BIRTHDAY"][0]); ?></td>
				</tr>
				<tr>
					<td>회원 주소</td>
					<td><?php echo($row["ADDRESS"][0]); ?></td>
				</tr>
			</table>
			<a href="<? echo MEMBER_ROOT.'/updateMemberForm.php';?>" class="fa fa-sign-in fa-2x btn btn-primary btn-block btn-lg" aria-hidden="true">수정</a>
			<!--여기서는 내 개인 정보 보여준다.-->
			<!--
				id
				등급
				가입일자
				이름
				생년월일
				회원 주소
				수정 시 수정 페이지로.
				
				현재 예매한 운항편. 회원_예매로 예매번호 알아내고 운항편_예매로 운항편_번호 알아낸다.
				운항편 번호 클릭시 운항 내용. searchSchedul.php로 이동.

			-->

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
