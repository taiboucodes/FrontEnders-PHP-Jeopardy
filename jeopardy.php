
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy</title>
</head>
<body>

    
    <?php

    include 'questions.php';

    echo '<table border=\'1\'>';
    echo '<tr>';
    foreach ($questions as $category => $groupedQuestions) {
        echo '<th>' . $category . '</th>';
    
    }
    echo "</tr>";

            
    for ($i = 0; $i < 5; $i++) {
        echo"<tr>";

        foreach ($questions as $category => $groupedQuestions) {
                $question = $groupedQuestions[$i];
                echo "<td><a href=\"display.php?question=" . htmlentities(json_encode($question)) . "\">" . $question["points"] . "</a></td>";
            }
        echo '</tr>';
        }
    echo "</table>"

    ?>


</body>
</html>