<?php

// including the database connection file
    include 'db_conn.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Let's check that if the user with email and phone number is already exist in database or not
        $sql = "SELECT * FROM `user_reg` WHERE email = '$email' OR phone = $phone LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            header("Location: index.php?error=User already exist, try to login instead");  //shows the error if the email id of user is exist in DB.
                exit();
        }
        // After checking the existence, if it fails then user can register successfully.
        else{
        $sql = "INSERT INTO `user_reg`(`name`,`email`,`phone`,`password`,`gender`) VALUES ('$name','$email','$phone','$password','$gender')";

        $result = mysqli_query($conn, $sql);


    // If all the credentials are true then user can direclty go to home page, otherwise give some error
        if($result == TRUE){
            header("Location: home.php");
        }else{
            echo "Error:" .$sql . "<br>" . $conn->error;
          }
    }
    //close the connection.

    $conn->close();

?>