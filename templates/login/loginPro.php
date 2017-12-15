<?php
  session_start();

  $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

  $idch = $_POST['USER_ID'];
  $pwch = $_POST['passwd'];

  $query = "select * from member where id='".$idch."'";

  $stmt = oci_parse($conn, $query);
  oci_execute($stmt);

  $row_num = oci_fetch_all($stmt, $row);

  if($row_num == 1){
    if($row["PASSWD"][0] == $pwch){
      // login 성공
      ?>
      <script>
        <?$_SESSION["ID"] = $idch;?>
        alert("로그인 성공!!");
        document.location.href="../";
      </script>
      <?php
    }else{
      // 비밀번호 틀림
      // login 실패
      ?>
      <script>
        alert("비밀번호가 틀립니다..");
        document.location.href="../login/login.php";
      </script>
      <?php

    }


  }else{
    // id 없음

    // login 실패
    ?>
    <script>
      alert("ID가 없습니다.");
      document.location.href="../login/login.php";
    </script>
    <?php
  }

?>
