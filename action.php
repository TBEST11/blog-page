<?php
session_start();
require_once "db.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $image = $_FILES["image"]["name"];
    $imagetemp = $_FILES["image"]['tmp_name'];
    $imageSize = $_FILES["image"]["size"];
    $imageError = $_FILES["image"]["error"];
    $imageType = $_FILES["image"]["type"];

    $imageExt = explode('.', $image);
    $imageActualExt = strtolower(end($imageExt));
    $extension = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($imageActualExt, $extension)) {
        if ($imageError == 0) {
            if ($imageSize < 1000000) {
                $imageName = uniqid('',true). "." . $imageActualExt;
                $destination = 'image/' . $imageName;
                move_uploaded_file($imagetemp, $destination);
                //$sql="UPDATE profileimg SET statu =0 WHERE userid= '$id'";
                //mysqli_query($conn, $sql);
                // header("location: user_dashboard.php");
            } else {
                echo "Your file is too big! ";
            }
        } else {
            echo "there was an Error uploading your file! ";
        }
    } else {
        echo "You can not upload file of this type! ";
    }

    // $password = $_POST['password'];


    if (empty(trim($_POST["username"]))) {
        $user_Id_err = "Please enter a userName.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $user_Id_err = "User Id can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT username FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_user_id);

            // Set parameters
            $param_user_id = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $user_id_err = "This user_id is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    $data['taskMsg'] = '';
    if (empty($username)) {
        $data['taskMsg'] = "Empty Field!";
    }

    $data['taskMsg'] = '';
    if (empty($email)) {
        $data['taskMsg'] = "Empty Field!";
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    //$data['taskMsg'] = '';
    //if(empty($password)) {

    // $data['taskMsg'] = "Empty Field!";
    // }
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    $validation = false;
    if (empty($data['taskMsg'])) {
        $validation = true;
    }

    if ($validation) {

        /* insert query*/
        $sql = "INSERT INTO `users` (`image`, `username`, `email`, `password`) VALUES ('$destination','$username', '$email', '$password')";
        // $result = $conn->query($query);

        //if ($result) {
        //  $data['success'] = "Task is added successfully";
        // }

        //return $data;
        mysqli_query($conn, $sql);
        $sql = "SELECT * FROM`users` WHERE username= '$username' AND email='$email'";
        $result= mysqli_query($conn, $sql);
        # Checks that the query executed successfully
        if (mysqli_num_rows($result)> 0) {
            while($row = mysqli_fetch_assoc($result)){
                //$userid= $row('id');
               // $sql = "INSERT INTO `profileimg` (`userid`, `status``) VALUES ('$userid',1)"; 
                //mysqli_query($conn, $sql);
                // $result = $conn->query($query);
            }
        } else {
            echo "Failed to insert new data.";
        }
    }
}

//$param_userId = $userId;
$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
header("location:login.php");
