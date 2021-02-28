<?php 

	include( "db_connect.php" );
	
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT name, score, CURRENT_TIMESTAMP, game FROM score;";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['name'].", ".$row['score']. ", ".$row['ts']. ", ".$row['game']. "<br />";
}

sqlsrv_free_stmt( $stmt);


?>