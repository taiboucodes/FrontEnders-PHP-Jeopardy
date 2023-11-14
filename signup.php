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
        <form action="login.php" method="post">
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
    
    

</body>
</html>