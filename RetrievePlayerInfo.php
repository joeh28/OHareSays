<?php
// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "DevTeam", "pwd" => "{your_password_here}", "Database" => "FlyWithButchOhareDB_Copy", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:flywithbutchohareserver.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


    $sth = $dbh->query('SELECT TOP 5 * FROM OhareSays ORDER BY highscore DESC');
    $sth->setFetchMode(PDO::FETCH_ASSOC);

    $result = $sth->fetchAll();

    if(count($result) > 0) {
        foreach($result as $r) {
            echo $r['playername'], "\t", $r['highscore'], "\n";
        }
    }
?>