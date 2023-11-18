<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy Question</title>
    <link rel="stylesheet" href="display.css">
</head>
<body>
    <?php
    $question = $_GET['question'];

    $questionEntry = json_decode(html_entity_decode($question), true);
    $question = htmlentities(json_encode($questionEntry['question']));
    $choices = $questionEntry["choices"];

    $answer = htmlentities(json_encode($questionEntry['answer']));
   
    $points = htmlentities(json_encode($questionEntry['points']));

    echo "<div class=\"question-container\">";
    echo "<h1>" . $question . "</h1>";
    echo "<form action=\"outcome.php\" method=\"post\">";
    for ($i = 0; $i < 4; $i++) {
        echo "<input type=\"radio\" id=\"" . $i . "\" name=\"answerOption\" value=\"" . $i . "\">";
        echo "<label for=\"" .  $i  . "\">". urldecode($choices[$i]) ."</label><br><br>";
    }

    echo "<input type=\"hidden\" name=\"answer\" value=\"" . $answer . "\">";
    echo "<input type=\"hidden\" name=\"points\" value=\"" . $points . "\">";


    echo "<input type=\"submit\" value=\"Submit\">";
    echo "</form>";
    echo "</div>";

    ?>
</body>
</html>


