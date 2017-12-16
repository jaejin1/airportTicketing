<?php
  $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

  $idch = $_POST['id'];

  $query = "select * from member where id='".$idch."'";

  $stmt = oci_parse($conn, $query);
  oci_execute($stmt);

  $row_num = oci_fetch_all($stmt, $row);



if(!$conn){
    echo "not connect DB";
}


if($idch == ''){
    ?>
<div>아이디를 입력하세요.</div>
<?php
}else{

    if($row_num == 0){
    ?>
    <div style="color:green" class="use">
    사용가능한 아이디입니다.
    <input type="hidden" value="1" name="use"/>
    </div>
    <?php
    }else{
    ?>
    <div style="color:red" class="use">
    아이디가 존재합니다.
    <input type="hidden" value="0" name="use"/>
    </div>
    <?php
    }
}
?>
