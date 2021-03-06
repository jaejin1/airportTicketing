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
  include GROUND_DIR."/sideBar.php";
?>

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
  <?php
    include GROUND_DIR . "/header.php";
  ?>
</div>
<!-- End Top Background Image Wrapper -->
<?php
  //if(!isset($_SESSION['id']) || !isset($_SESSION['name'])){ ?>
  <!--로그인 부분-->
  <div class="login-back">
    <div class="login">
      <form action ="<?echo LOGIN_ROOT?>/loginPro.php" method="post">
          <i class="fa fa-user fa-4x"  aria-hidden="true"></i>
        <input type="text" name="USER_ID" placeholder="아이디" required="required" />
          <i class="fa fa-lock fa-4x" aria-hidden="true"></i>
        <input type="password" name="passwd" placeholder="비밀번호" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-lg">
          <i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>로그인
        </button>
      </form>
    </div>

    <ul class="login-util" style="visibility:visible">
      <li><span class="login-util-type"><a href= "<?echo MEMBER_ROOT?>/findMemberIdForm.php">아이디 찾기</a></span></li>
      <li><span class="login-util-type"><a href="<?echo MAIN_ROOT."/member"?>/insertmember.php" title="회원 가입하기 새창열기">회원가입 하기</a></span></li>
      <li><span class="login-util-type"><a href="<?echo MEMBER_ROOT?>/findMemberpwForm.php">비밀번호 찾기</a></span></li>
    </ul>
  </div>

  <?php//}else{
  //  $id = $_SESSION['id'];
  //  $name = $_SESSION['name'];
    //echo '<p><strong>$user_name</strong>($user_id)님은 이미 로그인하고 있습니다.';
    //echo '<a href="../earportMain.php">[돌아가기]</a> ';
    //echo '<a href="./logout.php">[로그아웃]</a></p>';
  //}
  ?>

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
