<?php 

	$debug = false;
	
		//get connection string
        include( 'db_connect.php' );		
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
	//test connection string
	if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
	}

	//Get variables from game
	$name = $_GET['name']; 
	$score = $_GET['score']; 
	$game = $_GET['game']; 
	$hash = $_GET['hash']; 
		
		

	// query to insert/update scores!
	$query = "INSERT INTO score (name, score, game) VALUES ('".$name."'".",".$score.",".$game.");";

	//And finally we send our query.
	$result = sqlsrv_query($conn, $query) or die('Query failed: ' . sqlsrv_errors()); 
			
			
	//clear objects
	sqlsrv_free_stmt($result);
	
	//close connection
	sqlsrv_close( $conn );


?>