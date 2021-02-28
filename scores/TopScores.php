<?php 

	//get connection string
	include( "db_connect.php" );
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
	//test connection string
	if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
	}

	//get name and score from database
	$query = "SELECT * FROM score ORDER BY score DESC";   
	$stmt = sqlsrv_query( $conn, $query) or die('Query failed: ' . sqlsrv_errors());

	if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['name']. "\t" .$row['score']."\r\n";

	}
	
	//free resources
	sqlsrv_free_stmt( $stmt);
	
	//close connection
	sqlsrv_close( $conn );


?>