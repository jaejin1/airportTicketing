<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';
	 	

	$id = $_POST['id'];
	$fstemail = $_POST['first-email'];
	$lstemail = $_POST['last-email'];

	$email = $fstemail.$lstemail;

	$query = oci_parse($conn, "select * from MEMBER WHERE name = $name AND email = $email");

	if( !isset($members[$id]) || $members[$id]['email'] != $email ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('아이디 또는 이메일 주소가 잘못되었습니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    /* IF SUCCESS */
    //창 띄워서 아이디 표시해주기.
    echo "";
?>
