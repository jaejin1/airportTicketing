<?php
  session_start();
  #include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
  $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl","AL32UTF8");


	$id = $_POST['id'];
	#$reg_date = getdate();
	$passwd = $_POST['pw'];
	$name = $_POST['name'];
	$birthday = $_POST['birth'];
	$sex = $_POST['sex'];
	$email = $_POST['email1'].$_POST['email2'];

	#echo "post !! : ";
	#var_dump($_POST);
	#echo "<br>";
	$query = "insert into member values ('$id', sysdate, '$passwd', '$name', '$birthday','$sex', '$email','normal')";


	try {
		//$result = oci_execute($query, $conn);
		//$result = oci_parse($conn, $query2);
    $parse = oci_parse($conn, $query);
    oci_execute($parse);

    if(!$parse){
    	$e =  oci_error($conn);

    	echo "에러 ".$e['message']."<br>";
    }
    //oci_free_statement($result);
    //oci_close($conn);
    #$rowdd = oci_fetch_all($parse, $row);
    #echo "<br>실행";
    #var_dump($rowdd);
    #echo "<br>실행2";
    #var_dump($row);
    #echo "<br>실행3";
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
    alert("회원가입이 완료되었습니다.");
    //document.location.href="../login/login.php";
  </script>
</body>
</html>
