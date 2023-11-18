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



     $file = 'leaderboard.txt';
     $points = [];

     if (file_exists($file)) {
    $points = json_decode(file_get_contents($file), true);
}

arsort($points);


  echo "<table>";
  echo "<caption>Leaderboard</caption>";
    echo "<tr>
  <th>Rank</th>
  <th>Player</th>
  <th>Score</th>
  </tr>";


    $count = 1;

    foreach ($points as $userName => $userPoints) {
     echo "<tr><td>" . $count . "</td><td>" . $userName. "</td><td>" . $userPoints . "</td></tr>";
      $count++;

      if ($count >= 6){
        break;
      }
    }
   echo "</table>"
    ?>

</body>
</html>