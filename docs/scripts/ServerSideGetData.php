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
		
		
	//SQL Command to get player info
	$sql = "SELECT TOP 5 playername, highscore FROM OhareSays ORDER BY highscore DESC";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0)
	{
		//output data of each row
		while($row = $result->fetch_assoc())
		{
			echo $row["playername"]. " ". $row["highscore"]. "<br>";
		}
		else
		{
			echo "0 results";
		}
		
	}
	$conn->close();

		
?>