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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript">
<!--
function checkemailaddy(){
        if (form.email_select.value == '1') {
            form.email2.readOnly = false;
            form.email2.value = '';
            form.email2.focus();
        }
        else {
            form.email2.readOnly = true;
            form.email2.value = form.email_select.value;
        }
    }
//-->

</script>




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

<!--아이디 찾는 부분-->
<div class="findMemberId">

		<p class="findId_info">E-MAIL로 아이디 찾기</p>
		<div class="findId_label">
			<p class="findId">회원가입 당시 입력한 이름과 E-메일 주소로 일치하는 계정을 찾습니다.</p>

			<form action="./findMember.php"  method="post" name="form">

        <label class="label_stwid65">이름</label><input type="text" id="name" name="name" style="width:383px;" title="이름을 입력하세요.">
        <div>
          <label class="label_stwid65">E-mail</label>


        <input name="email1" type="text" class="box" id="email1"  style="width:84px;"> @ <input name="email2" type="text" class="box" id="email2" style="width:114px;">

          <select name="email_select" class="box" id="email_select" onChange="checkemailaddy();" style="width:144px;float:right; margin-right:40%;margin-top:10px;">
            <option value="" selected>선택하세요</option>
            <option value="empal.com">empal.com</option>
            <option value="dreamwiz.com">dreamwiz.com</option>
            <option value="naver.com">naver.com</option>
            <option value="hotmail.com">hotmail.com</option>
            <option value="chollian.net">chollian.net</option>
            <option value="freechal.com">freechal.com</option>
            <option value="hanafos.com">hanafos.com</option>
            <option value="kebi.com">kebi.com</option>
            <option value="korea.com">korea.com</option>
            <option value="lycos.co.kr">lycos.co.kr</option>
            <option value="netian.com">netian.com</option>
            <option value="netsgo.com">netsgo.com</option>
            <option value="unitel.co.kr">unitel.co.kr</option>
            <option value="yahoo.co.kr">yahoo.co.kr</option>
            <option value="1">직접입력</option>
          </select>
        </div>

        <br/>
          <div class="find_btn">
            <input type="submit" class="btn_idsh" value="아이디 찾기">
          </div>

      </form>


      <br/>
      <br/>
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
