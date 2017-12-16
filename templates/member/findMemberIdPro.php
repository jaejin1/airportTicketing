<?php
  session_start();

	$conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");


	$name = $_POST['name'];
	$fstemail = $_POST['email1'];
	$lstemail = $_POST['email_select'];


	$email = $fstemail.'@'.$lstemail;


	$query = "select * from MEMBER WHERE name ='".$name."' AND email = '".$email."'";

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt);

	$row_num = oci_fetch_all($stmt, $row);


	if(!$conn){
		echo "not connect DB";
	}

	oci_close($conn);


	if($row_num == 0){
		// 아이디없음
		?>
		<script>
	    alert("ID가 존재하지 않습니다.");
	    document.location.href="../member/findMemberIdForm.php";
	  </script>
		<?
	}else {
		// 아이디있음
		?>
		<script>
			document.location.href="../member/findMember.php";
		</script>
		<?
	}


?>
