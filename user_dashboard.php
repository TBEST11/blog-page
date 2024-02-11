<?php
session_start();
// Include configuration file  
if (!isset($_SESSION['username'])) {
    header('Location: ./login.php');
}
require('db.php');
$username = $_SESSION['username'];
$image = $_SESSION['image'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>USER DASHBOARD</title>
    <link rel="stylesheet" href="styles.css">
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" /-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
    
    <style>
    .profile-pic {
    float: right;
    height: 40px;
    width: 40px;
    margin-top: 10px;
    margin-right: 20px;
    border-radius: 50%;
}
</style>

</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion"></i>&nbsp;&nbsp;TBEST BLOG</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="index.php">HOME</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="logout.php">LOGOUT</a>
                 </li>
             </ul>
         </div>
            <?php
            echo "<img src = " . $image . " class='profile-pic'  />";
            ?>
        </div>
    </nav>
    <div class="container">
        <?php

        $sql = ("SELECT `id`,`username`, `image` FROM users WHERE username='$username'");
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id'];
                $image = $row['image'];
                $username = $row['username'];
                echo "<div>";
                if (empty($image)) {
                    //echo "<img src = ". $image."".mt_rand ()." width= '100px' height= '100px'/>";
                    echo "<img src ='image/dprofpix.jpg' alt='' width='100px' height= '100px'/>";
                } else {
                    echo "<h1>Welcom {$row['username']}</h1>";
                    echo "<br>";
                    echo "<img src = " . $image . " width= '100px' height= '100px'/>";
                    echo "<div class='container'>";
                    echo "<h2> Cover photo</h2>";
                    echo "<input type='file' name='cover_photo'/>";
                }
                echo "</div>";
            }
        } else {
            echo "there are no users inside the database";
        }

        ?>

    </div>

    <?php include 'post.php' ?>
    <div class="container w-50">
        <?php
        // Include configuration and connect to the database
        include 'db.php';

        // Fetch posts from the database
        $sql = "SELECT * FROM post ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);

        // Display each post
        while ($row = mysqli_fetch_assoc($result)) {
            $image = $row['image'];
            echo "<div class='post'>";
            echo "<h2>{$row['title']}</h2>";
            echo "<img src = " . $image . " width= '200px' height= '200px'/>";
            echo "<p>{$row['content']}</p>";
            echo "<span class='date'>Posted on: {$row['created_at']}</span>";
            echo "</div>";
        }

        // Close database connection
        mysqli_close($conn);

        ?>
    </div>


    <div class="my-5 container w-10">
        <a href="register.php"><b>Register New Account</b></a>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/js/all.min.js" integrity="sha512-YUwFoN1yaVzHxZ1cLsNYJzVt1opqtVLKgBQ+wDj+JyfvOkH66ck1fleCm8eyJG9O1HpKIf86HrgTXkWDyHy9HA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
    <script src="script.js"></script>
</body>

</html>