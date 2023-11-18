<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
   <link href="leaderboard.css" type="text/css" rel="stylesheet"/>

</head>
<body>
    
    <?php
   //The function read is used to read the score 
    function read() {
     $file = 'leaderboard.txt';
     $points = [];

    if (file_exists($file)) {
     $content = file_get_contents($file);
     $Jeo = explode(PHP_EOL, $content);

    foreach ($Jeo as $game) {
     $score = json_decode($game, true);
    if ($score) {
     $points[] = $score;
          }
       }
    }

     //Sorts by the highest score to the lowest score   
     usort($points, function ($a, $b) {
      return $b['score'] - $a['score'];
        });

     //The ranks is based on the score the player gets  
      $rank = 1;
     foreach ($points as &$score) {
      $score['rank'] = $rank++;
        }

      return $points;
    }

    
    function write($points) {
     $file = 'leaderboard.txt';

     $Jeo = array_map(function ($score) {
      return json_encode($score);
        }, $points);

     $content = implode(PHP_EOL, $Jeo);
    file_put_contents($file, $content);
    }

    //The function add or also updates the player's score 
    function AddScore(&$points, $ThePlayers, $score) {
    foreach ($points as &$RecentScore) {
    if ($RecentScore['player_name'] === $ThePlayers) {
               
    if ($score > $RecentScore['score']) {
     $RecentScore['score'] = $score;
      return true; 
      } else {
      return false; 
        }
     }
   }

       //If a player doesn't exist it adds a new score for them. 
        $points[] = array(
            "player_name" => $ThePlayers,
            "score" => round($score, -2)
        );

        return true; 
    }

    
    $ThePlayerss = ["Pablo", "Peter", "Randy", "Sophia", "Karen", "Henry", "Bob"];
    foreach ($ThePlayerss as $ThePlayers) {
        $score = rand(0, 7500);

       
        $points = read();

        
        $scoreUpdated = AddScore($points, $ThePlayers, $score);

     //It keeps only the top 5 players high scores on the leaderboard    
     if ($scoreUpdated) {
            
     usort($points, function ($a, $b) {
      return $b['score'] - $a['score'];
            });

            
      $points = array_slice($points, 0, 5);

            
      write($points);
      }
   }

    
    $points = read();
    ?>

   
    <table>
      <caption>Leaderboard</caption>
	<tr>
      <th>Rank</th>
      <th>Player</th>
      <th>Score</th>
     </tr>

        <?php
		
        foreach ($points as $score) {
         echo "<tr><td>{$score['rank']}</td><td>{$score['player_name']}</td><td>{$score['score']}</td></tr>";
        }
        ?>
    </table>

</body>
</html>
