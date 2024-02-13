<?php 

// Start the session and include the db connection file
session_start();
include "db_conn.php";

// validating the fields.
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// This checks if the form has been submitted by verifying that both the name and password fields have been posted.
if(isset($_POST['name']) && isset($_POST['password'])){
    $uname = validate($_POST['name']); 
    $pass = validate($_POST['password']); 


    //  Checking if username or password is empty
    if(empty($uname)){
        header("Location: login.php?error=User Name is required");
        exit();
    } else if(empty($pass)){
        header("Location: login.php?error=Password is required");
        exit();
    }


    // fetch the username and password from DB
    $sql = "SELECT * FROM user_reg WHERE name = '$uname' AND password ='$pass'";
    $result = mysqli_query($conn, $sql);
    

    // if  no record found in DB then redirect to error page with message "Invalid UserName/Password"
    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['name'] === $uname && $row['password'] === $pass) {
                echo "Logged In!";
                $_SESSION['name'] = $row['name'];
                // $_SESSION['password'] = $row['password'];
                $_SESSION['id'] = $row['id'];
                // Corrected header location
                header("Location: home.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect User Name or Password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect User Name or Password");
            exit();
        }
    } else {
        // Display the MySQL error for debugging purposes
        echo "Error: " . mysqli_error($conn);
        exit();
    }
    
    }
?>
<html>
    <head>
        <title>Login-form</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <form action="home.php" method="post">
                <h2>Login Page</h2>
                <!-- This code will handle the errors -->
                <?php
                if(isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>

               <!-- Form for login page -->
               <label for="username">Username: </label>
               <input type="text" name="name" placeholder="username"><br>

               <label for="password">Password: </label>
               <input type="password" name="password" placeholder="password"><br>

               <button type="submit"> Login </button> 
            </form>
    </body>
</html>
