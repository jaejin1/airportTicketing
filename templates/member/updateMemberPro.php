<?php
  session_start();
  #include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
  $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");


	$id = $_SESSION['ID'];
	#$reg_date = getdate();
	$passwd = $_POST['pw'];

	$email = $_POST['email1'].'@'.$_POST['email_select'];

  $birthday = $_POST['birth'];

  $address = $_POST['address'];



	#$query = "insert into member values ('$id', sysdate, '$passwd', '$name', '$birthday','$sex', '$email','normal')";
  $query = "update member set passwd='".$passwd."', email='".$email."' , birthday='".$birthday."' , address='".$address."' where id='".$id."'";
  #$query = "select * from member where id='".$idch."'";


	try {
		//$result = oci_execute($query, $conn);
		//$result = oci_parse($conn, $query2);
    $parse = oci_parse($conn, $query);
    oci_execute($parse);

    oci_free_statement($result);
    oci_close($conn);

	} catch (Exception $e) {
		echo $e->getMessage();
		echo "오류입니다.";
		echo "<script>alert(잘못된 접근입니다.);</script>";
	}

	oci_close($conn);
	echo "<br>";
?>


<!DOCTYPE html>
<html>
<body>
  <script>
    alert("정보 수정되었습니다.");
    document.location.href="../";
  </script>
</body>
</html>
