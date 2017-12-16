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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script><!-- 최신버전 제이쿼리 -->

<script>
  $(document).ready(function(){

    $('#id').blur(function(){

            $.ajax({ // ajax실행부분
                type: "post",
                url : "./checkid.php",
                data : {
                    id : $('#id').val()
                },
                success : function s(a){ $('#idch').html(a); },
                error : function error(){ alert('시스템 문제발생');}
            });
    });

  });
</script>
<script>
function check_pw(val){

    var du = document.userinput;
    var ogpw = du.pw.value;
    var same = "<span style='color:green;'>비밀번호가 일치합니다.</span>";
    var diff = "<span style='color:red;'>비밀번호가 일치하지 않습니다.</span>";

    if(ogpw == val){
        document.getElementById("check").innerHTML = same;
    }else if(ogpw != val){
        document.getElementById("check").innerHTML = diff;
    }
}
</script>
<script>
  function blank_up(){
    var du = document.userinput;

    if(du.use.value == '0'){
        alert("아이디 중복을 확인해주세요.");
        du.use.focus();
        return false;
    }  // 여기까지

    if(!du.pw.value){
        alert("패스워드를 입력하시오");
        du.pw.focus();
        return false;
    }

    if(du.pw.value != du.pwch.value){
        alert("패스워드를 정확하게 입력해주세요.");
        du.pwch.focus();
        return false;
    }

    if(!du.name.value){
        alert("이름을 입력하시오");
        du.name.focus();
        return false;
    }


    if(!du.birth.value){
        alert("생년월일을 입력하시오");
        du.birth.focus();
        return false;
    }

    if(!du.email.value){
        alert("이메일을 입력하시오");
        du.email.focus();
        return false;
    }
    // 부분 추가
  }


</script>
</head>
<body id="top">
<!--위의 상단바-->
<?php
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

<div class="insertMember" style="background-image:url('../../earhome/images/demo/backgrounds/bg.jpg');">
  <form action="./insertPro.php" method="post" name="userinput">
    <table class="insertMember-table">
      <tr class="insertMember-header">
        <td>항공 스케줄</td>
      </tr>
    </table>
    <table class="insertMember-table">
      <tr class="insertMember-info">
        <td class="insertMember-label">회원 ID</td>
        <td class="insertMember-value"><input type="text" name="id" id="id" maxlength="20"/>&nbsp;
          <div id="idch">아이디를 입력하세요.
            <input type="hidden" value="0" name="use"/>
          </div>
        </td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">비밀번호</td>
        <td class="insertMember-value"><input type="password" name="pw" id="pw" maxlength="20"/></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">비밀번호 확인</td>
        <td class="insertMember-value"><input type="password" name="pwch" id="pwch"  onkeyup="check_pw(this.value)" maxlength="20"/>
          <div id="check">비밀번호를 확인하세요.</div>
        </td>

      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">이 름</td>
        <td class="insertMember-value"><input type="text" name="name" id="name" maxlength="10"/></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">성 별</td>
        <td class="insertMember-value"><input type="radio" size="1" name="sex" value="man" checked="checked"/>&nbsp;<label>남성</label>
          <input type="radio" size="1" name="sex" value="woman">&nbsp;<label>여성</label></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">생년월일</td>
        <td class="insertMember-value"><input type="text" name="birth"/></td>
      </tr>
      <tr class="insertMember-table">
        <td class="insertMember-label">이메일</td>
        <td class="insertMember-value"><input type="text" name="email" maxlength="30"/></td>
      </tr>
    </table>
    <input type="submit" name="insertmember" value="회원가입" onclick="return blank_up()"/>
  </form>

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
