<?php

	$conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

	if(!$conn){
		echo "Oracle Connect Error";
		echo "Error Message:[".ocierror($conn)."]";
		exit();
	}
	else
	{
		echo "Connected!";
 }
 	//echo "<br />";
 	//echo "<br />";
	//echo "<br />";
	//echo "Server Version=".OCIServerVersion($conn);
	OCIlogoff($conn);
?>
