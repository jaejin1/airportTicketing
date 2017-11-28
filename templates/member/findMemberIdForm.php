<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
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
</head>
<body id="top">
<!--위의 상단바-->
<?php
  include "./headSideBar.php";
?>

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
  <?php
    include GROUND_ROOT . "/header.php";
  ?>
</div>
<!-- End Top Background Image Wrapper -->

<!--아이디 찾는 부분-->
<div class="findMemberId">
	<li>
		<p class="findId_info">E-MAIL로 아이디 찾기</p>
		<div class="findId_label">
			<p class="findId">회원가입 당시 입력한 이름과 E-메일 주소로 일치하는 계정을 찾습니다.</p>
			<form class="findId_form" action="./findMemberIdPro.php">
				<label class="label_stwid65">이름</label><input type="text" id="name" name="name" style="width:383px;" title="이름을 입력하세요.">
				<label class="label_stwid65">E-mail</label><input type="text" id="first-email" name="first-email" title="이메일ID" style="width:84px;"> @
				<input type="text" id="last-email" name="last-email" title="이메일 도메인주소" style="width:114px;" readonly="readonly">
				<select title="메일 도메인 선택" id="emailList" style="width:144px;float:right">
					<option value="">선택</option>
					<option value="W">직접입력</option>
					<option value="naver.com">naver.com</option>
					<option value="hanmail.net">hanmail.net</option>
					<option value="daum.net">daum.net</option>
					<option value="gmail.com">gmail.com</option>
					<option value="hotmail.com">hotmail.com</option>
					<option value="nate.com">nate.com</option>
				</select>
				<input type="submit" class="btn_idsh" value="아이디 찾기">
			</form>
		</div>
	</li>
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
