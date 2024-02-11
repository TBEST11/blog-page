<?php

require "./db.php";

if (isset($_POST["editBlogBtn"])) {
    return editblogItem($conn, $_POST);
}

if (isset($_POST["deleteBlogBtn"])) {
    return deleteblog($conn, $_POST["id"]);
}

function editblogItem($conn, $data)
{
    $id = $data['id'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    

    if (!empty($username) ||!empty($email) || !empty($password)) {
        $sql = "UPDATE `users` SET `username`='$username', `email`='$email', `password`='$password' WHERE `id`='$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: registered_users.php");
        } else {
            echo "😉😉😉✌";
        }
    }
}

function deleteBlog($conn, $id)
{

    $sql = ("DELETE FROM `users`  WHERE `id`='$id'");
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header("Location: registered_users.php");
    } else {
        echo "😉😉😉✌";
    }
}
