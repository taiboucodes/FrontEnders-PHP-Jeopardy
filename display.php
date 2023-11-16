<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy Question</title>
</head>
<body>

<?php

$question = $_GET['question'];


$questionEntry = json_decode(html_entity_decode($question), true);
$question = htmlentities(json_encode($questionEntry['question']));
$choices = $questionEntry["choices"];


$answer = htmlentities(json_encode($questionEntry['answer']));
$points = htmlentities(json_encode($questionEntry['points']));





echo "<div class=\"question-card\">";
 echo "<h1>" . $question . "</h1>";
 echo "<form action=\"outcome.php\" method=\"post\">";
 foreach ($choices as $choice) {
     echo "<input type=\"radio\" id=\"" .$answer . "\" name=\"answerOption\" value=\"" . urldecode($choice) . "\">";
     echo "<label for=\"" .  urldecode($choice)  . "\">". urldecode($choice) ."</label><br>";
 }
echo "</div>";




?>

</body>
</html>
