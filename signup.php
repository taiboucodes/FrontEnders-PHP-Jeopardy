<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up / Log In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="login-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>Sign Up</h1>
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Enter Name">
                </div>
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required placeholder="Enter username">
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter password">
                </div>
                <br>
                <button type="submit" name="signup">Sign Up</button>
                <div class="login-link">
                    Already have an account? <a href="index.php"> <br> Log in</a>
                </div>
            </form>
        </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
            $name = $_POST["name"];
            $username = $_POST["username"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $data = "$name,$username,$password\n";

        // Append data to users.txt file, so they don't have sign up each time
        $file = 'users.txt';
            if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
                header('Location: index.php'); //takes user to log in page
                exit();
            } else {
                echo "Error writing to $file. Please check file permissions.";
            }
        }
    ?>

</body>
</html>
