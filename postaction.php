<?php

require_once "db.php";
if (isset($_POST['submitPost'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $postimg = $_FILES["postimg"]["name"];
    $imagetemp = $_FILES["postimg"]['tmp_name'];
    $imageSize = $_FILES["postimg"]["size"];
    $imageError = $_FILES["postimg"]["error"];
    $imageType = $_FILES["postimg"]["type"];

    $imageExt = explode('.', $postimg);
    $imageActualExt = strtolower(end($imageExt));
    $extension = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($imageActualExt, $extension)) {
        if ($imageError == 0) {
            if ($imageSize < 1000000) {
                $imageName = uniqid('',true). "." . $imageActualExt;
                $destination = 'image/' . $imageName;
                move_uploaded_file($imagetemp, $destination);
                
            } else {
                echo "Your file is too big! ";
            }
        } else {
            echo "there was an Error uploading your file! ";
        }
    } else {
        echo "You can not upload file of this type! ";
    }
    
    $data['taskMsg'] = '';
    if(empty($title)) {
      $data['taskMsg'] = "Empty Field!";
     }
     $data['taskMsg'] = '';
     if(empty($content)) {
       $data['taskMsg'] = "Empty Field!";
      }
    
    
    $validation = false;
    if (empty($data['taskMsg'])) {
        $validation = true;
    }

    if ($validation) {

        /* insert query*/
        $sql = "INSERT INTO `post` (`image`, `title`, `content`) VALUES ('$destination','$title', '$content')";
        $result = mysqli_query($conn, $sql);
     # Checks that the query executed successfully
        if ($result) {
        } else {
            echo "Failed to insert new data.";
        }
    }
}

header("location:user_dashboard.php");

?>