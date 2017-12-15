<?php

	/*$conn = oci_connect("B389064", "B389064","203.249.87.162:1521/orcl");

	if(!$conn){
		echo "Oracle Connect Error";
		echo "Error Message:[".ocierror($conn)."]";
		exit();
	}
	else
	{
		echo "Connected!";
 }
 echo "<br />";
 echo "<br />";
	echo "<br />";
	echo "Server Version=".OCIServerVersion($conn);
	OCIlogoff($conn);
*/

	define('DB_NAME','B389064');
	define('DB_PASSWORD','B389064');
	define('DB_HOST', '203.249.87.162:1521/orcl');

	class DBConnect{

		function __construct(){
			//$conn = oci_connect(DB_NAME, DB_PASSWORD, DB_HOST);
			$conn = oci_connect("B389064", "B389064", "203.249.87.162:1521/orcl");


			if(!$conn){
				echo "Oracle Connect Error";
				echo "Error Message:[".ocierror($conn)."]";
				exit();
			}
			else
			{
		   		echo "Connected!";
			}
			echo "<br />";
			echo "<br />";
			echo "<br />";
			echo "Server Version=".OCIServerVersion($conn);
			OCIlogoff($conn);

		}
	}

	$DBConnect = new DBConnect();
?>
