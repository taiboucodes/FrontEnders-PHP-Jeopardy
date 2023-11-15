<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy</title>
</head>
<body>
    
    <?php
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
    ?>


</body>
</html>