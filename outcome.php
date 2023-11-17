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
        print("right answer!");
        $_SESSION['score'] += $points;
    print("you have " . $points . " points");
    }
    else{
        print("wrong answer! the correct answer was " . $correctAnswer);
    }


//     $correctAnswer = $answer;
//     $points = $_POST["points"];

//      // Compare the selected answer ID with the correct answer ID
//      if ($selectedAnswer === $correctAnswer) {
//         echo "Correct! You've earned $points points.";
//         $_SESSION['score'] += $points;
//     } else {
//         echo "Incorrect! The correct answer was option " . $correctAnswer . ".";
//     }

//     echo "<br>Your current score is: " . $_SESSION['score'];
//     echo "<br><a href='jeopardy.php'>Back to the game board</a>";

?>