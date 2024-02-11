<?php
session_start();
require_once "db.php";
if (isset($_POST['submit'])) {
    $username = $_POST['admin_username'];
  
            // $password = $_POST['password'];


    if (empty(trim($_POST["admin_username"]))) {
        $user_Id_err = "Please enter a userName.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["admin_username"]))) {
        $user_Id_err = "User Id can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT admin_username FROM admindb WHERE admin_username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_user_id);

            // Set parameters
            $param_user_id = trim($_POST["admin_username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $user_id_err = "This user_id is already taken.";
                } else {
                    $admin_username = trim($_POST["admin_username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    $data['taskMsg'] = '';
    if(empty($admin_username)) {
      $data['taskMsg'] = "Empty Field!";
     }
    
    if (empty(trim($_POST["admin_password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["admin_password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $admin_password = trim($_POST["admin_password"]);
    }
    //$data['taskMsg'] = '';
    //if(empty($password)) {

    // $data['taskMsg'] = "Empty Field!";
    // }
    if (empty(trim($_POST["admin_confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $admin_confirm_password = trim($_POST["admin_confirm_password"]);
        if (empty($password_err) && ($admin_password != $admin_confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    $validation = false;
    if (empty($data['taskMsg'])) {
        $validation = true;
    }

    if ($validation) {

        /* insert query*/
        $sql = "INSERT INTO `admindb` (`admin_username`, `admin_password`) VALUES ('$admin_username',  '$admin_password')";
               // $result = $conn->query($query);

        //if ($result) {
        //  $data['success'] = "Task is added successfully";
        // }

        //return $data;
        $result = mysqli_query($conn, $sql);
     # Checks that the query executed successfully
        if ($result) {
        } else {
            echo "Failed to insert new data.";
        }
    }
}
//$param_userId = $userId;
$param_password = password_hash($admin_password, PASSWORD_DEFAULT); // Creates a password hash
header("location:admin_login.php");

?>