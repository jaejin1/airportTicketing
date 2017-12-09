<?php
	session_start();
  include_once SERVER_ROOT . '/a_team/a_team5/earthport/config/db_connect.php'

	$id = $POST['id'];
	$reg_date = getdate();
	$passwd = md5($POST['passwd']);
	$name = $POST['name'];
	$birthday = $POST['birth'];
	$sex = $POST['sex'];
	$email = $POST['email'];

	echo $id . "<br>";
	echo $reg_date. "<br>";
	echo $passwd. "<br>";
	echo $name. "<br>";
	echo $birthday. "<br>";
	echo $sex. "<br>";
	echo $email. "<br>";

	//$query = "INSERT INTO MEMBER VALUES (".$id.",".$reg_date.",".$passwd.",".$name.",".$birthday.",".$sex.",".$email.")";
	$query = "update member set id = '$id', reg_date = '$reg_date', passwd = '$passwd', name = '$name', birthday = '$birthday', sex = '$sex', email = '$email');";
	try {
		//$result = oci_execute($query, $conn);
		$result = oci_parse($conn, $query);
		oci_execute($result);
		echo $query;

	} catch (Exception $e) {
		echo $e->getMessage();
		#echo "오류입니다.";
		echo "<script>alert('완료 하지 못하였습니다.');</script>";
	}

	oci_close($conn);
	echo "<br>";
?>
