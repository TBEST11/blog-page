<?php

require "./db.php";

if (isset($_POST["editPostBtn"])) {
    return editpostItem($conn, $_POST);
}

if (isset($_POST["deletePostBtn"])) {
    return deletepost($conn, $_POST["id"]);
}

function editpostItem($conn, $data)
{
    $id = $data['id'];
    $image = $data['image'];
    $title = $data['title'];
    $content = $data['content'];
    $created_at = $data['created_at'];
    

    if (!empty($image) ||!empty($title) || !empty($content) || !empty($created_at)) {
        $sql = "UPDATE `post` SET `image`='$image',`title`='$title', `content`='$content', `created_at`='$created_at' WHERE `id`='$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: users_post.php");
        } else {
            echo "😉😉😉✌";
        }
    }
}

function deletepost($conn, $id)
{

    $sql = ("DELETE FROM `post`  WHERE `id`='$id'");
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header("Location: users_post.php");
    } else {
        echo "😉😉😉✌";
    }
}
