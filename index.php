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
        <form action="jeopardy.php" method="post">
            <h1>Sign In!</h1>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Username">
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Password">
            </div>
            <button type="submit">Log In</button>
            <div class="login-link">
                Don't have an account? <a href="signup.php"> <br>Sign Up</a>
            </div>
        </form>
    </div>
    
</body>
</html>