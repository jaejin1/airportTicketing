<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/config.php';
 ?>

<!DOCTYPE html>
<!--
Template Name: EARPORT
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>EARPORT</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">


</head>
<body id="top">
<!--위의 상단바-->
<?php
  include GROUND_DIR . "/sideBar.php";
?>

<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/bg.jpg');">
  <?php
    include GROUND_DIR . "/header.php";
  ?>
</div>
<!-- End Top Background Image Wrapper -->

<!--아이디 찾는 부분-->
<div class="findMemberId">
	<li>
		<p class="findId_info">ID 찾기 결과</p>
		<div class="findId_label">
			<p class="findId">회원가입 당시 입력한 이름과 E-메일 주소로 일치하는 계정을 찾습니다.</p>

      <?
        $conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");


      	$name = $_POST['name'];
      	$fstemail = $_POST['email1'];
      	$lstemail = $_POST['email2'];


      	$email = $fstemail.'@'.$lstemail;

        echo $name;
        echo $email;

      	$query = "select * from MEMBER WHERE name ='".$name."' AND email = '".$email."'";

      	$stmt = oci_parse($conn, $query);
      	oci_execute($stmt);

      	$row_num = oci_fetch_all($stmt, $row);

        echo $row_num;

        if($row_num == 0){
      		// 아이디없음
      		?>
      		<script>
      	    alert("ID가 존재하지 않습니다.");
      	    //document.location.href="../member/findMemberIdForm.php";
      	  </script>
      		<?
      	}else {
      		// 아이디있음
      		for($i = 0; $i <$row_num; $i++){
            echo "<tr>\n";
            echo "<td>" . $row["ID"][$i] . "</td>";
            echo "</tr>\n";
          }
      	}


        oci_close($conn);
      ?>
		</div>
	</li>
</div>

<!--footer 부분-->
<?php
  include GROUND_DIR . "/footer.php";
?>
<!-- JAVASCRIPTS -->
<?php
  include GROUND_DIR . "/javascriptpart.php";
?>
</body>
</html>
