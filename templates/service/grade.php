<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

if(!isset($_SESSION["ID"])){
  ?>
  <script>
    alert('로그인이 필요합니다.');
    document.location.href="<? echo LOGIN_ROOT.'/login.php';?>";
  </script>
  <?
}


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

  <div>
    <?php


    $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

    $id = $_SESSION["ID"];

    $query = "select grade , discount from member_grade where member_grade.grade = (select grade from member where id ='".$id."')";


    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);

    $row_num = oci_fetch_all($stmt, $row);

    if(!$conn){
      echo "not connect DB";
    }


    ?>
    <!--여기도 정보 페이지 본인의 회원 등급과 할인율 알려주고 나머지 등급들의 할인율 알려주기.-->
    <div class="searchGrade-back">
      <div class="searchGrade">
       <h3> 회원등급은 <?echo $row["GRADE"][0]; ?> 입니다. </h3>
       <h3> <?echo $id?>님의 할인율은  <?echo $row["DISCOUNT"][0]; ?>% 입니다. </h3>
       <a href="<? echo SERVICE_ROOT.'/grade_all.php';?>" class="fa fa-sign-in fa-2x btn btn-primary btn-block btn-lg" aria-hidden="true">등급별 조회가기</a> 
     </div>
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
