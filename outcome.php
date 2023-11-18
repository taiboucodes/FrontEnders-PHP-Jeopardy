<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outcome</title>
    <link rel="stylesheet" href="outcome.css">
</head>
<body>

    <?php
    
    session_start();

    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }
    $selectedAnswer = $_POST["answerOption"];
    $correctAnswer = json_decode(html_entity_decode($_POST['answer']), true);
    $points = json_decode(html_entity_decode($_POST['points']), true);

    if ($selectedAnswer == $correctAnswer) {
        $_SESSION['score'] += $points; 
        $message = "Correct answer! You have earned +" . $points . " points.";
        $color = "#5cb85c"; 
    } else {
        $message = "Incorrect! The correct answer choice was " . $correctAnswer . ".";
        $color = "#d9534f"; 
        $_SESSION['score'] -= $points;
    }

    echo "<div id='outcome-message' style='color: {$color};'>";
    echo "<h1>{$message}</h1>";
    if ($selectedAnswer == $correctAnswer) {
        echo "<img src='firework.gif' alt='Correct Answer'/>";
    }
    echo "<a href='jeopardy.php' id='return-button'>Return to Game</a>";
    echo "</div>";




    $username =  $_SESSION['username']; 
    $name =  $_SESSION['name'];

    $file = 'leaderboard.txt';


    $userPoints = [];
    $userPoints = json_decode(file_get_contents($file), true);

    if (!isset($userPoints[$username])) {
        $userPoints[$username] = 0;
    }
    $userPoints[$username] += $points;
    
    file_put_contents($file, json_encode($userPoints));

    ?>
</body>
</html>
