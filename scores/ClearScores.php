<?php 

        include 'db_connect.php';
        include 'update_key.php';
        //These are our variables.

        $id = mysqli_real_escape_string($conn, $_GET['id']); 
        $hash = $_GET['hash']; 
        
        //We md5 hash our results.
        $str_date = date("Ymd");
   
        $expected_hash = md5($id  . $str_date . $secretKey); 

        //If what we expect is what we have:
        if($expected_hash == $hash) { 
            $query = 'DELETE FROM OhareSaysScore where game = ' . $id;

            //And finally we send our query.
            $result = sqlsrv_query($conn, $query) or die('Query failed: ' . sqlsrv_errors()); 
            echo "<html><head>";
//            echo '<meta http-equiv="refresh" content="0; url=' . $redirect_url . '" />';
            echo "</head><body>";
            echo "Game " . $id . " Scores Cleared";
            echo "</body></html>";
        }  else {
            echo "Invalid hash value<br/>";
//            echo "Expected: ". $expected_hash . " got: " . $hash;
        }



?>
