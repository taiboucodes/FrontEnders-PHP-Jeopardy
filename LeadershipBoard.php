<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <style>
        body { 
display: flex;
background-position: center;
background-image: url('JeoImage.png');
background-size: cover;
background-attachment: fixed;
background-repeat: no-repeat;
margin:0;

}

table {
border-collapse: collapse;
width: 70%;
margin: 0 auto;
margin-top: 290px;
text-align:center;
}

th, td {
border: 1px solid #ddd;
padding: 12px;
text-align: center;
background-color: navy;
color: white;
font-size: 1.5em;
}

th {
background-color: navy;
color: gold;
font-size: 2.0em;
}
    
caption { 
caption-side: top;
color:white;
margin-bottom: 10px;
font-weight: bold;
font-size: 3.0em;
}
	
	</style>
</head>
<body>
    
    <?php
   
    function readScores() {
     $file = 'leaderboard.txt';
     $scores = [];

    if (file_exists($file)) {
     $content = file_get_contents($file);
     $Jeo = explode(PHP_EOL, $content);

    foreach ($Jeo as $line) {
     $score = json_decode($line, true);
    if ($score) {
     $scores[] = $score;
          }
       }
    }

        
     usort($scores, function ($a, $b) {
      return $b['score'] - $a['score'];
        });

      
      $rank = 1;
     foreach ($scores as &$score) {
      $score['rank'] = $rank++;
        }

      return $scores;
    }

    
    function writeScores($scores) {
     $file = 'leaderboard.txt';

     $Jeo = array_map(function ($score) {
      return json_encode($score);
        }, $scores);

     $content = implode(PHP_EOL, $Jeo);
    file_put_contents($file, $content);
    }

    
    function addOrUpdateScore(&$scores, $playerName, $score) {
    foreach ($scores as &$existingScore) {
    if ($existingScore['player_name'] === $playerName) {
               
    if ($score > $existingScore['score']) {
     $existingScore['score'] = $score;
      return true; 
      } else {
      return false; 
        }
     }
   }

       
        $scores[] = array(
            "player_name" => $playerName,
            "score" => $score
        );

        return true; 
    }

    
    $playerNames = ["Pablo", "Peter", "Randy", "Sophia", "Karen", "Henry", "Bob"];
    foreach ($playerNames as $playerName) {
        $score = rand(0, 7500);

       
        $scores = readScores();

        
        $scoreUpdated = addOrUpdateScore($scores, $playerName, $score);

        
     if ($scoreUpdated) {
            
     usort($scores, function ($a, $b) {
      return $b['score'] - $a['score'];
            });

            
      $scores = array_slice($scores, 0, 5);

            
      writeScores($scores);
      }
   }

    
    $scores = readScores();
    ?>

   
    <table>
      <caption>Leaderboard</caption>
	<tr>
      <th>Rank</th>
      <th>Player</th>
      <th>Score</th>
     </tr>

        <?php
		
        foreach ($scores as $score) {
         echo "<tr><td>{$score['rank']}</td><td>{$score['player_name']}</td><td>{$score['score']}</td></tr>";
        }
        ?>
    </table>

</body>
</html>