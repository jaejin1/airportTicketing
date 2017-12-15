<?
	include_once $_SERVER['DOCUMENT_ROOT'] . '/a_team/a_team5/earthport/config/db_connect.php';
	#추가하고 싶은 기능은  // 눌렀으면 alert 떠서 삭제 여부 확인 하고 눌렀을때 이동..
	$id = $_POST['id'];
  	$passwd = $_POST['passwd'];

	echo '<script language="javascript"> 
			function del() {
			 var cd=confirm("Are You Sure want to this this member!");
			 if(cd==true) {
			  return true; 
			 }else{
			  return false; 
			 } 
			} 
		  </script>';
	// 이 코드는 무엇이지...
 	echo '<a href="edit.php?del=d&id=<?php echo $row['id']; ?>" onclick="return del();" >
 		<img border="0" src="images/icon_delete.png" /></a>';

 //to delete request 
 	if($_GET['del']=='d') {
 	 $query_del="DELETE FROM MEMBER WHERE id='$id'";
 	  //mysql_query($query_del)
 	   //or die(mysql_error());
 	    //header("Location:home.php"); 
 	}
?>

