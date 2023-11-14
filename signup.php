<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="login-container">
        <form action="index.php" method="post">
            <h1>Sign Up!</h1>
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter name">
            </div>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Username">
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Password">
            </div>
            <button type="submit">Sign Up</button>
            <div class="login-link">
                Already have an account? <a href="index.php"> <br> Log in</a>
            </div>
        </form>
    </div>
    
    <?php
    if (isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"])) {
        // Retrieve the data from the POST request.
        $name = $_POST["name"];
        $username = $_POST["username"];
        // For security, you would want to hash the password before storing it.
        // NEVER store passwords as plain text in a real application.
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
        // Create a CSV line with the user's data.
        $userData = $name . "," . $username . "," . $password . "\n";
        
        // Append the 'userData' string to the 'users.txt' file.
        file_put_contents("users.txt", $userData, FILE_APPEND);
    }
    ?>
    

</body>
</html>