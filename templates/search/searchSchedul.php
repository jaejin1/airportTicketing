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
<title>EARTHPORT</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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
			<table class="searchSchedul-table">
      <tr class="searchSchedul-header">
        <td>항공 스케줄</td>
      </tr>
    </table>
    <table class="searchSchedul-table">
      <tr class="searchSchedul-info">
        <td class="searchSchedul-label">회원 ID</td>
        <td class="searchSchedul-value"><input type="text" name="id" id="id" maxlength="20"/>&nbsp;
          <div id="idch">아이디를 입력하세요.
            <input type="hidden" value="0" name="use"/>
          </div>
        </td>
      </tr>
      <tr class="searchSchedul-table">
        <td class="searchSchedul-label">비밀번호</td>
        <td class="searchSchedul-value"><input type="password" name="pw" id="pw" maxlength="20"/></td>
      </tr>
      <tr class="searchSchedul-table">
        <td class="searchSchedul-label">비밀번호 확인</td>
        <td class="searchSchedul-value"><input type="password" name="pwch" id="pwch"  onkeyup="check_pw(this.value)" maxlength="20"/>
          <div id="check">비밀번호를 확인하세요.</div>
        </td>

      </tr>
      <tr class="searchSchedul-table">
        <td class="searchSchedul-label">이 름</td>
        <td class="searchSchedul-value"><input type="text" name="name" id="name" maxlength="10"/></td>
      </tr>
      <tr class="searchSchedul-table">
        <td class="searchSchedul-label">성 별</td>
        <td class="searchSchedul-value"><input type="radio" size="1" name="sex" value="man" checked="checked"/>&nbsp;<label>남성</label>
          <input type="radio" size="1" name="sex" value="woman">&nbsp;<label>여성</label></td>
      </tr>
      <tr class="searchSchedul-table">
        <td class="searchSchedul-label">생년월일</td>
        <td class="searchSchedul-value"><input type="text" name="birth"/></td>
      </tr>
      <tr class="searchSchedul-table">
        <td class="searchSchedul-label">이메일</td>
        <td class="searchSchedul-value"><input type="text" name="email" maxlength="30"/></td>
      </tr>
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
