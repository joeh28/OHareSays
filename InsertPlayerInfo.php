<?php
        // Configuration
        $hostname = 'tcp:flywithbutchohareserver.database.windows.net,1433';
        $username = 'DevTeam';
        $password = 'D3vT3@m6066!';
        $database = 'FlyWithButchOhareDB_Copy';
		
		//grabs the script to connect to the database
		//include( "../includes/db_connect.php" );

        $secretKey = "A1qoeIDMeT29"; // Change this value to match the value stored in the client javascript below 

        try {
            $dbh = new PDO('mysql:host='. $hostname .';dbname='. $database, $username, $password);
        } catch(PDOException $e) {
            echo '<h1>An error has ocurred.</h1><pre>', $e->getMessage() ,'</pre>';
        }

        $realHash = md5($_GET['pname'] . $_GET['hscore'] . $secretKey); 
        if($realHash == $hash) { 
            $sth = $dbh->prepare('INSERT INTO OhareSays (playername, highscore) VALUES (pname, hscore)');
            try {
                $sth->execute($_GET);
            } catch(Exception $e) {
                echo '<h1>An error has ocurred.</h1><pre>', $e->getMessage() ,'</pre>';
            }
        } 
?>