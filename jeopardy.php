<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy</title>
    <link rel="stylesheet" href="jeopardy.css">
</head>
<body>
        <div class="navbar">
        <?php
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                $name = userExists($username, $password); //return name 
                if ($name) {
                    $_SESSION['username'] = $username; // Save the username in the session
                    $_SESSION['name'] = $name; // Save the name in the session
                }
            }

            // Display the user's name if logged in
            if (isset($_SESSION['name'])) {
                echo '<div class="user-container">Welcome, ' . $_SESSION['name'] . '</div>';
            }
			// Display the user's current score
            if (isset($_SESSION['score'])) {
                echo '<div class="user-score">Score: ' . $_SESSION['score'] . '</div>';
            }
        ?>
        <a href="logout.php" class="logout-button">Log Out</a>
    </div>
    <?php
    session_start();


    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }
    function userExists($username, $password) {
        $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($users as $user) {
            list($name, $storedUsername, $storedPassword) = explode(',', $user);
            if ($username == $storedUsername && password_verify($password, trim($storedPassword))) {
                return $name;
            }
        }
        return false;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

         $name = userExists($username, $password); //return name 
        if ($name) {
            echo "Login successful. Welcome, $name!"; //takes user to game page
        } else {
            echo "Login failed. Invalid username or password.";
        }
    }

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
    echo "</table>";

    print("you have " . $_SESSION["score"] . " points");



    ?>


</body>
</html>
