<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
   <link href="leaderboard.css" type="text/css" rel="stylesheet"/>

</head>
<body>
	<div class="navbar">
        <?php
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                $name = userExists($username, $password); 
                if ($name) {
                    $_SESSION['username'] = $username; 
                    $_SESSION['name'] = $name; 
                }
            }
            if (isset($_SESSION['name'])) {
                echo '<div class="user-container">Welcome, ' . $_SESSION['name'] . '</div>';
            }
            if (isset($_SESSION['score'])) {
                echo '<div class="user-score">Score: ' . $_SESSION['score'] . '</div>';
            }
        ?>
        <a href="LeadershipBoard.php" class="leaderboard-container">Leaderboard</a>
        <a href="logout.php" class="logout-button">Log Out</a>
		<a href="jeopardy.php" class="logout-button home-button">Home</a>
    </div>
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
