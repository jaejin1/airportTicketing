<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';

	
	

	$query = "select * from AIRPORT where airport_no = '".$_GET["AIRPORT_NO"]."'";		// 질의 수정.

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt);

	$row_num = oci_fetch_all($stmt, $row);

	#echo "개수".$row_num."<br>";
	#echo $_GET["AIRPORT_NO"]."<br>";
	#echo "변수".$AIRPORT_NO;
	#var_dump($row);
	//var_dump($row)."<br>";
	//echo $query."<br>";
	if(!$conn){
		echo "not connect DB";
	}
	oci_close($conn);
	?>
<!DOCTYPE html>
<html>
<body>
<table border=1 cellspacing=0 cellpadding=5>
	<tr>
		<td>비행기 번호</td>
		<td>비행기 기종</td>
	</tr>
	<tr>

		<td><? echo $row["AIRPORT_NO"][0]?></td>
		<td><? echo $row["AIRPORT_KINDS"][0]?></td>
	</tr>
</table>
</body>
</html>
