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

    // Initialize score if not already set
    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }
    $selectedAnswer = $_POST["answerOption"];
    $correctAnswer = json_decode(html_entity_decode($_POST['answer']), true);
    $points = json_decode(html_entity_decode($_POST['points']), true);

    if ($selectedAnswer == $correctAnswer) {
        $_SESSION['score'] += $points; // Update score before creating the message
        $message = "Correct answer! You have " . $_SESSION['score'] . " points."; // Now the updated score will be displayed
        $color = "#5cb85c"; // Green for correct answers
    } else {
        $message = "Incorrect! The correct answer choice was " . $correctAnswer . ".";
        $color = "#d9534f"; // Red for incorrect answers
        $_SESSION['score'] -= $points;
    }

    echo "<div id='outcome-message' style='color: {$color};'>";
    echo "<h1>{$message}</h1>";
    if ($selectedAnswer == $correctAnswer) {
        echo "<img src='firework.gif' alt='Correct Answer'/>";
    }
    echo "<a href='jeopardy.php' id='return-button'>Return to Game</a>";
    echo "</div>";

    ?>

</body>
</html>
