<?php
  session_start();
  #include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
  $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");


	$id = $_SESSION["ID"];


  $query = "delete from member where id='".$id."'";


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

  session_destroy();

?>


<!DOCTYPE html>
<html>
<body>
  <script>
    alert("회원탈퇴가 완료되었습니다.");
    document.location.href="../";
  </script>
</body>
</html>
