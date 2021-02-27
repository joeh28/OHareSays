<!DOCTYPE html>
<!-- 2017 Levi D. Smith -->
<?php
  $param_unique = "1";
  $param_latest = "0";
  if (isset($_GET["unique"])) {
    $param_unique = $_GET["unique"];
#      $params .= '?unique=' . $_GET["unique"];
  }
  if (isset($_GET["latest"])) {
    $param_latest = $_GET["latest"];
#      $params .= '?latest=' . $_GET["latest"];
  }
?>
<html>
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-62497279-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-62497279-1');
</script>
<!-- End Google Analytics -->

        <!-- Start Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Share+Tech" rel="stylesheet">
        <!-- End Google Font -->

<?php
  $site_name = "Example";
  $site_url = "https://example.com";
?>

 
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="expires" content="-1">

  <style>
    body {
      font-family: "Share Tech", Sans-Serif;
      font-size: 10pt;
      background-image: url("https://example.com/blog/wp-content/uploads/2015/03/website_bkg3.jpg");
      background-repeat: no-repeat;
      background-color: #15c117;
      background-size: cover;
    }

    h2 {
      color: #FFFF00;
      font-size: 20pt; 
      text-shadow: 2px 2px 1px #000;
    }

    a {
      text-decoration: none;
      color: black;
    }

    a:hover {
      color: green; 
      text-decoration: underline;
    }
    
    
    .game {
      width: 320px;    
      float: left;
      background-color: #daffdb;
      border: 2px solid black;
      padding: 4px;
      margin: 4px;
    }

    .game .game_metric {
      font-style: italic;
    }

    .game .game_name {
      width: 100%;    
      font-size: 14pt;
      color: #000000;
      float: none;
    }

    .game .score_first_place {
      color: #FFFFFF;
      background-color: #0000FF;
      font-weight: bold;
      padding: 4px;
      overflow: auto;
    }

    .game .score_second_place {
      color: #FFFFFF;
      background-color: #FF0000;
      font-weight: bold;
      padding: 4px;
      overflow: auto;
    }

    .game .score_third_place {
      color: #A0A000;
      background-color: #FFFFFF;
      font-weight: bold;
      padding: 4px;
      overflow: auto;
    }

    .game .score_other {
      color: #000000;
      background-color: #E0E0E0;
      padding: 4px;
      overflow: auto;
    }

    .score_name {
      width: 96px;
      float: left;
    }

    .score_score {
      width: 128px;
      float: left;
      text-align: right;
    }

    .back {
      color: #FFFF00;
      clear: both;
      background-color:  #53ffff;
      font-weight: bold;
      float: left;
      overflow: auto;      
      padding: 4px;
     // border: 1px 8px 1px 1px #15c117;
      border: 1px solid #000000;
    }

    a .back {
      color: #FFFF00;

    }


  </style>
</head>
<body>

<h2>Leaderboards</h2>
<?php
    echo '<a href="' . $site_url . '/scores/DisplayScores?unique=1">Top Scores by Name</a> - ';
    echo '<a href="' . $site_url . '/scores/DisplayScores?unique=0">All Top Scores</a> - ';
    echo '<a href="' . $site_url . '/scores/DisplayScores?latest=1">Latest Scores</a>';
?>

<p id="game_display"></p>
<div class="back">
<?php
    echo '<a href="' . $site_url . '">Back to ' . $site_name . '</a>';
?>
</div>


<script>

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    var strGame = "";
    
    for ( var i = 0; i < myObj.games.length; i++) {
      strGame += '<div class="game">';
      strGame += '<div class="game_name">';
      strGame += '<a href="' + myObj.games[i].download_url + '">';
      strGame += myObj.games[i].name; 
      strGame += '</a>';
      strGame += '</div>' + "\n";
      strGame += '<div class="game_metric">' + myObj.games[i].metric + '</div>' + "\n";

      if (myObj.games[i].scores) {

        for ( var j = 0; j < myObj.games[i].scores.length; j++) {
<?php
  if ($param_latest == "1") {
?>
            strGame += '<div class="score_other">';
<?php
  } else {
?>
          if (j == 0) {
            strGame += '<div class="score_first_place">';
          } else if (j == 1) {
            strGame += '<div class="score_second_place">';
          } else if (j == 2) {
            strGame += '<div class="score_third_place">';
          } else {
            strGame += '<div class="score_other">';
          }
<?php
  }
?>
          strGame += '<div class="score_name">';
          strGame += myObj.games[i].scores[j].name + "\n";
          strGame += '</div>';
          strGame += '<div class="score_score">';
          strGame += myObj.games[i].scores[j].score + "\n";
          strGame += '</div>';
          strGame += '</div>';

        }
      } else {
        strGame += "<div>No Scores</div>";
      }

      strGame += '</div>';
    } 

	document.getElementById("game_display").innerHTML = strGame;
  }
};

	document.getElementById("game_display").innerHTML = "Loading";

<?php
  $params = "?";
  if ($param_unique == "1") {
      $params .= 'unique=1';
  } else {
      $params .= 'unique=0';
  }
  $params .= "&";
  if ($param_latest == "1") {
      $params .= 'latest=1';
  } else {
      $params .= 'latest=0';
  }
  echo 'xmlhttp.open("GET", "' . $site_url . '/scores/leaderboard.json' . $params . '", true);';
?>
xmlhttp.send();

</script>

</body>
</html>
