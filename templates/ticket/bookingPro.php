<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';
	session_start();

	if(!isset($_SESSION["ID"])){
    ?>
    <script>
      alert('로그인이 필요합니다.');
    	document.location.href="<? echo LOGIN_ROOT. '/login.php'?>";
    </script>
    <?
  }else{
  	$var = $_POST["TICKETING_NO"];
  	echo "<script>alert(' 예매 번호 : ".$var."');</script>";
  }
	
	$var = $_POST["TICKETING_NO"];
	//예매 해서 성공하면 출력
	#echo "<script>alert('예매 성공');</script>";
	$randomNum = mt_rand(1, 10000);
	#echo '<script>document.location.href="../"</script>';

	//아니면 출력.
	
?>
