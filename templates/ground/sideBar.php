<?php
  session_start();
  //echo "/insertmember.php"."\n";
  //echo dirname(__FILE__)."\n";
  //echo "현재 티렉터리".basename(__DIR__)."\n";
  //echo $_SERVER['DOCUMENT_ROOT'];
  include_once SERVER_ROOT . '/a_team/a_team5/earthport/config/config.php';
?>
<!--위의 상단바-->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear">
    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-pinterest" href="https://www.pinterest.co.kr/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
        <li><a class="faicon-twitter" href="https://twitter.com/?lang=ko" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="https://kr.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-rss" href="https://www.rss.com/" target="_blank"><i class="fa fa-rss"></i></a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <?
          if(!isset($_SESSION["ID"])){
            ?>
            <li><i class="fa fa-user"></i> <a href= "<?php echo MAIN_ROOT.'/member/insertmember.php' ?>">회원가입</a></li>
            <?echo '<li><i class="fa fa-sign-in"></i> <a href="'?><?php echo MAIN_ROOT . '/login/login.php">로그인</a></li>';
          }else{
            //로그아웃
            echo $_SESSION["ID"].'님 어서오세요.   ';
            ?>
            <li><i class="fa fa-user"></i> <a href= "<?php echo MAIN_ROOT.'/member/updateMemberForm.php' ?>">회원정보수정</a></li>
            <?
            echo '<li><i class="fa fa-sign-in"></i> <a href="'?><?php echo MAIN_ROOT . '/login/logout.php">로그아웃</a></li>';
          }
        ?>

      </ul>
    </div>
  </div>
</div>
