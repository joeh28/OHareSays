<?php
//We thank DontMissTheFlight for the making of this script
include( "../includes/db_admin.php" );

//variables from the user/program/game
$Init = $_GET["playerName"];
$Score = $_GET["highscore"];
$Secret = $_GET["Secret"];

if($Secret != "kIkxPvHc2uK3DWFBzzPSDNEwAlOAc7wH")
{
	die("You are not authorized. Nice try hacker...");
}

//Connections
// Pull the connection from the database connection string
$conn = $pdo;


//SQL Command
$sql = "INSERT INTO OhareSays (playername, highscore) VALUES (:Init,:Score)";
// Prepare the SQL query statement
$stmt = $conn->prepare( $sql );

// Bind parameters
$stmt->bindParam( ':Init', $Init, PDO::PARAM_STR );
$stmt->bindParam( ':Score', $Score, PDO::PARAM_INT );

// Perform the SQL query
$stmt->execute();
// Notify the calling AJAX function of completion
echo "Input Recieved";

// Clear and close the connection
$conn = null;

?>