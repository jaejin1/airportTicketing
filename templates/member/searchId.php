<?
	include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';

	$id = $POST['id'];
	#실패하면 ' ' 빼고 해보자..
	$query = "select COUNT(id) FROM MEMBER WHERE id = '$id'";

	try {
		//$result = oci_execute($query, $conn);
		$result = oci_parse($conn, $query);
		oci_execute($stmt);
  		$row_num = oci_fetch_all($stmt, $row);
  		if($row_num > 1){
    		echo "<script>alert('사용중인 id가 있습니다.');</script>");
  		}

	} catch (Exception $e) {
		echo $e->getMessage();
		echo "<script>alert('앗! 무언가가 잘못 되었습니다.');</script>";
	}
?>