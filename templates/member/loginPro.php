<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';
  session_start();
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
  //include "./headSideBar.php";
?>

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
  <?php
    include GROUND_ROOT . "/header.php";
  ?>
</div>
<!-- End Top Background Image Wrapper -->

<!--login부분-->
<?php
    if ( !isset($_POST['id']) || !isset($_POST['passwd']) ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('아이디 또는 비밀번호가 빠졌거나 잘못된 접근입니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    $id = $_POST['id'];
    $passwd = $_POST['passwd'];

 	//디비 접근
 	include "./db_connect.php";

	$query = oci_parse($conn, "select * from MEMBER WHERE id = $id");

	try{

    if( !isset($members[$id]) || $members[$id]['password'] != $passwd ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    /* If success */
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $members[$id]['name'];
  }catch(Exception e){
  
  }
?>
<meta http-equiv="refresh" content="0;url=index.php" />

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
