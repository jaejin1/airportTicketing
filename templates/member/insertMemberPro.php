<?php
<<<<<<< HEAD:templates/member/insertPro.php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
	session_start();
=======
	session_start();
  include_once SERVER_ROOT . '/a_team/a_team5/earthport/config/db_connect.php'
>>>>>>> upstream/master:templates/member/insertMemberPro.php

	$id = $POST['id'];
	#$reg_date = getdate();
	$passwd = md5($POST['passwd']);
	$name = $POST['name'];
	$birthday = $POST['birth'];
	$sex = $POST['sex'];
	$email = $POST['email'];

	echo $id . "<br>";
	#echo $reg_date. "<br>";
	echo $passwd. "<br>";
	echo $name. "<br>";
	echo $birthday. "<br>";
	echo $sex. "<br>";
	echo $email. "<br>";

<<<<<<< HEAD:templates/member/insertPro.php



	//$query = "INSERT INTO MEMBER VALUES (".$id.",".$reg_date.",".$passwd.",".$name.",".$birthday.",".$sex.",".$email.")";

	$query = "insert into member values ('$id', sysdate, '$passwd', '$name', '$birthday','$sex', '$email');";

	$query2 = "insert into member values ('test123', sysdate, 'test', 'test', 'test','test', 'test');";

	try {
		//$result = oci_execute($query, $conn);
		//$result = oci_parse($conn, $query2);

		//echo $query2;
		//echo $result;
		$conn2 = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

		$sql = "select * from MEMBER";
		$stmt = oci_parse($conn2, $sql);

		oci_execute($stmt);

		list($num) = oci_fetch_all($stmt);

		echo $num;

		oci_free_statement($stmt)

		if($row_num == 1){
	 		echo $row['ID'];

		} else {
			echo "오류입니다.";
		}
		//oci_commit($result);
		//echo $query;



=======
	//$query = "INSERT INTO MEMBER VALUES (".$id.",".$reg_date.",".$passwd.",".$name.",".$birthday.",".$sex.",".$email.")";
	$query = "insert into member values ('$id', '$reg_date', '$passwd', '$name', '$birthday','$sex', '$email');";
	try {
		//$result = oci_execute($query, $conn);
		$result = oci_parse($conn, $query);
		oci_execute($result);
		echo $query;
>>>>>>> upstream/master:templates/member/insertMemberPro.php

	} catch (Exception $e) {
		echo $e->getMessage();
		echo "오류입니다.";
		echo "<script>alert('잘못된 접근입니다.');</script>";
	}

	oci_close($conn);
	echo "<br>";
?>
