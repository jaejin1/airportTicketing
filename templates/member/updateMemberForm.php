<?php
<<<<<<< HEAD
	include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';
?>
=======
  include_once $_SERVER['DOCUMENT_ROOT'].'/a_team/a_team5/earthport/config/config.php';
  #session_start()
 ?>
>>>>>>> upstream/master

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
<<<<<<< HEAD
<link href="./layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
=======
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
>>>>>>> upstream/master
</head>
<body id="top">
<!--위의 상단바-->
<?php
<<<<<<< HEAD
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


<!--footer 부분-->
<?php
  include GROUND_DIR."/footer.php";
?>
=======
  include GROUND_DIR . "/sideBar.php";
  //include "./headSideBar.php";

?>

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
  <?php
    include GROUND_DIR . "/header.php";
  ?>
</div>
<!-- End Top Background Image Wrapper -->
  <!-- db에서 가져온다. 각각의 자리에 입력.. class 이름도 바꾼다.ctrl + d 연속 누르면 선택 가능.. sublimetext 만 가능.-->
<div class="insertMember" style="background-image:url('../../earhome/images/demo/backgrounds/bg.jpg');">
  <form action="<?php MEMBER_ROOT.'/updateMemberPro.php'?>" method="post">
    <table class="insertMember-table">
      <tr class="insertMember-header">
        <td>회원가입</td>
      </tr>
    </table><!--비활성화 시킨다.-->
    <table class="insertMember-table">
      <tr class="insertMember-info">
        <td class="insertMember-label">회원 ID</td>
        <td class="insertMember-value">
          <form action="<?echo SEARCH_ROOT.'searchId.php'?>" method="post">
          <input type="text" name="id" maxlength="20">&nbsp; <input type="submit" value="[ID 중복 검사]">
          </form>
        </td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">비밀번호</td>
        <td class="insertMember-value"><input type="password" name="passwd" maxlength="20"></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">비밀번호 확인</td>
        <td class="insertMember-value"><input type="password" name="passwdOK" maxlength="20"></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">이 름</td>
        <td class="insertMember-value"><input type="text" name="name" maxlength="10"></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">성 별</td>
        <td class="insertMember-value"><input type="radio" size="6" name="sex" value="남">&nbsp;<label>남성</label>
          <input type="radio" size="6" name="sex" value="여">&nbsp;<label>여성</label></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">생년월일</td>
        <td class="insertMember-value"><input type="text" name="birth"></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">이메일</td>
        <td class="insertMember-value"><input type="text" name="email" maxlength="30"></td>
      </tr>
    </table>
    <input type="submit" name="insertmember" value="회원가입">
  </form>

<!--footer 부분-->
<?php
include GROUND_DIR . "/footer.php";
?>

>>>>>>> upstream/master
<!-- JAVASCRIPTS -->
<?php
  include GROUND_DIR . "/javascriptpart.php";
?>
<<<<<<< HEAD

=======
>>>>>>> upstream/master
</body>
</html>
