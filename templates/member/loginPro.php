<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
<<<<<<< HEAD
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';
 ?>
=======
>>>>>>> upstream/master

  $id = $_POST['id'];
  $passwd = $_POST['passwd'];

  $conn = oci_connect("b389064", "b389064", "203.249.87.162:1521/orcl");

  $query = "select * from MEMBER where ID='$id' AND PASSWD='$passwd'";

  $stmt = oci_parse($conn, $query);
  oci_execute($stmt);
  $row_num = oci_fetch_all($stmt, $row);

<<<<<<< HEAD
	}

    if( !isset($members[$id]) || $members[$id]['password'] != $passwd ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    /* If success */
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $members[$id]['name'];
?>
<meta http-equiv="refresh" content="0;url=index.php" />

<!--footer 부분-->
<?php
  include GROUND_ROOT . "/footer.php";
?>
<!-- JAVASCRIPTS -->
<?php
  include GROUND_ROOT . "/javascriptpart.php";
?>

</body>
</html>
=======
  //밑에는 재욱이의 코드 물론 위에는 내가 좀 짜놨지만..
  if($row_num == 1){
    $_SESSION['id']=$row['ID'];
    echo "alert('var_dump($id님 환영 합니다.)')"; #확인용... 디비 연결되면 지우자.. 이거 대신에 메인화면이나 이전 화면으로 이동..
    echo "<script> history.back();</script>"
  } else {
    echo "오류입니다.";
  }
  echo "오류...?";
  oci_close($conn);
?>
>>>>>>> upstream/master
