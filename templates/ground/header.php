<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/a_team/a_team5/earthport/config/config.php";
  include_once $_SERVER['DOCUMENT_ROOT']."/a_team/a_team5/earthport/config/db_connect.php";


 ?>

<!-- 메뉴바 -->
  <div class="wrapper row1">
    <!--Header-->
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left">
        <h1><a href="<?echo MAIN_ROOT?>/">EARTHPORT</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="<?echo MAIN_ROOT?>/">Home</a></li>
          <li><a class="drop" href="<?php echo TICKET_ROOT."/ticketbookingMain.php"?>">항공권 예매</a>
            <ul>
              <li><a class="drop" href="<?echo TICKET_ROOT."/ticketbooking.php"?>">항공권 예매</a>
                <ul>
                  <li><a href="<?echo TICKET_ROOT.'/ticketbooking.php'?>">예매</a></li>
                  <li><a href="<?echo SEARCH_ROOT.'/searchbooking.php'?>">예매 조회</a></li> <!--여기는 티켓번호로도 조회 가능-->
                </ul>
              </li>
              <li><a href="<?echo SEARCH_ROOT.'/searchSchedul.php'?>">스케줄 조회</a></li>
            </ul>
          </li>
          <li><a class="drop" href="<?echo SEARCH_ROOT.'/serviceMain.php'?>">서비스 안내</a>
            <ul>
              <li><a href="<?echo SERVICE_ROOT.'/findGateLocation.php'?>">게이트 위치</a></li>
              <li><a href="<?echo SERVICE_ROOT.'infoGrade.php'?>">등급별 혜택</a>
                <ul>
                  <li><a href="<?echo SERVICE_ROOT.'/infoGrade.php'?>">등급별 혜택 안내</a></li>
                  <li><a href="<?echo SEARCH_ROOT.'/searchGrade.php'?>">등급 조회</a></li>
                </ul>
              </li>

            </ul>
          </li>
<<<<<<< HEAD
          <li><a href="<?echo MAIN_ROOT?>">Earport 365</a></li>
          <li><a class="drop" href="<?echo MAIN_ROOT?>/myPageMain.php">마이 페이지</a>
=======
          <li><a href="<?echo MAINT_ROOT?>">Earport 365</a></li>
          <li><a class="drop" href="<?echo MEMBER_ROOT.'/myPageMain.php'?>">마이 페이지</a>
>>>>>>> upstream/master
            <ul>
              <li><a href="<?echo MEMBER_ROOT.'/myPageMain.php'?>">페이지 메인</a></li>
              <li><a href="<?echo SEARCH_ROOT.'/searchbooking.php'?>">예약 확인</a></li>
              <li><a href="<?echo MEMBER_ROOT.'/updateMemberForm.php'?>">회원 정보 수정</a></li>
              <li><a href="<?echo MEMBER_ROOT.'/deleteMemberForm.php'?>">회원 탈퇴</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>
