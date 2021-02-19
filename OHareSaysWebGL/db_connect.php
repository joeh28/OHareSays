<?php
	$serverName = "tcp:flywithbutchohareserver.database.windows.net,1433";
	$connectionInfo = array ("Database"=>"FlyWithButchOhareDB_Copy", "UID"=>"DevTeam@flywithbutchohareserver", "PWD"=>"D3vT3@m6066!");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

   /* if ( $conn ) {
        echo "connection established.<br />";
    } else {
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
    }*/
?>