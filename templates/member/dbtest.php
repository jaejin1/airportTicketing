<?php
  //include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';

  $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

  $query = "select * from member";

  $stmt = oci_parse($conn, $query);
  oci_execute($stmt);

  $row_num = oci_fetch_all($stmt, $row);



  echo $row_num;
  echo ' jaejin ';
  for($i = 0; $i <$row_num; $i++){
    echo "<tr>\n";
    echo "<td>" . $row["ID"][$i] . "</td>";

    echo "<td>" . $row["REG_DATE"][$i]. "</td>";
    echo "</tr>\n";
  }
  echo 'jajein';

  oci_close($conn);
?>
