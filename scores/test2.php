<?php 

	include( "db_connect.php" );
	
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO game (id, name, order_method, score_format, metric, download_url) VALUES ( 4 , 'BOB',0, NULL, 1, 'amazon.com');";  
$sql = "INSERT INTO score (name, score, ts, game) VALUES ('BOB', 1,DEFAULT, -1);";
//$sql = "SELECT name, score, CURRENT_TIMESTAMP, game FROM score;";
/*ON DUPLICATE KEY UPDATE
   ts = if(2 > score,CURRENT_TIMESTAMP,ts), score = if (2 > score, 2, score);"; */
$stmt = sqlsrv_query( $conn, $sql) or die('Query failed: ' . sqlsrv_errors());



sqlsrv_free_stmt( $stmt);


?>