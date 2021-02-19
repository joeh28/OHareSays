<?php
//We thank DontMissTheFlight for the making of this script
include( "../includes/db_connect.php" );

//variables from the user/program/game


//Connections

$conn = sqlsrv_connect( $serverName, $connectionInfo);

//Test connection

if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);// Kill it if there is an error...dont keep running the code
}

//SQL Command
$sql = "SELECT TOP 5 playername, highscore FROM OhareSays ORDER BY highscore DESC";
$result = sqlsrv_query ( $conn, $sql);
if($result == false)
{
    die("Query invalid");
}
// Array to store everything from result
$ScoreArray = [];
while($row = sqlsrv_fetch_object($result))
{
	array_push($ScoreArray,$row);
}

//Console Return



//Real Return 

echo json_encode($ScoreArray);


$conn->close(); // closes connection

?>