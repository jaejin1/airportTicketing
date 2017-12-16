<?php
  session_start();

  $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

  $id = $_SESSION["ID"];
  $idch = $_POST['pw'];

  $query = "select * from member where id='".$id."'";

  $stmt = oci_parse($conn, $query);
  oci_execute($stmt);

  $row_num = oci_fetch_all($stmt, $row);


if(!$conn){
    echo "not connect DB";
}


if($idch == ''){
    ?>
<div>패스워드를 입력하세요.</div>
<?php
}else{

    if($row["passwd"][0] == $idch){
    ?>
    <div style="color:green" class="use">
    현재 비밀번호와 일치합니다.
    <input type="hidden" value="1" name="use"/>
    </div>
    <?php
    }else{
    ?>
    <div style="color:red" class="use">
    현재 비밀번호와 일치하지 않습니다.
    <input type="hidden" value="0" name="use"/>
    </div>
    <?php
    }
}
?>
