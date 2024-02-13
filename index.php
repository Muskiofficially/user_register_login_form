
<!-- Creating the registration form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration page</title>
</head>
<body>
    <form action="register.php" method="post"> 
        <h2 class="reg">Registration form</h2>

        <!-- php script for showing the error in form itself -->
        <?php
                if(isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>

        <label for="username">Name: </label>
        <input type="text" name="name" placeholder="username" required><br>

        <label for="email">Email: </label>
        <input type="email" name="email" placeholder="email" required><br>

        <label for="phone">Phone: </label>
        <input type="text" name="phone" placeholder="phone" required><br>

        <label for="password">Password: </label>
        <input type="password" name="password" placeholder="password" required><br> 

        <label for="gender">Gender: </label>
        <input type="radio" name="gender" value="Male">Male 
        <input type="radio" name="gender" value="Female">Female

        <button type="submit">Register</button>
    </form>
    <div class="login">
    <p>Already Have an account? </p>               
    <button><a href="login.php">Login</a></button>
    </div>
</body>
</html>
