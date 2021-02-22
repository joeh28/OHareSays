<?php
        //We thank DontMissTheFlight for the making of this script
include( "../includes/db_connect.php" );

//variables from the user/program/game


//Connect to database

$conn = sqlsrv_connect( $serverName, $connectionInfo);
		
		//Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected Successfully";
		
?>