
     <!DOCTYPE html>
 <html lang="en">

 <head>
     <title> Admin DashBoard</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 </head>

 <body>
     <nav class="navbar navbar-expand-md bg-dark navbar-dark">
         <!-- Brand -->
         <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion"></i>&nbsp;&nbsp;TBEST Blog</a>

         <!-- Toggler/collapsibe Button -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
             <span class="navbar-toggler-icon"></span>
         </button>

         <!-- Navbar links -->
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="#">HOME</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">BLOG</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">ABOUT</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">CONTACT US</a>
                 </li>
             </ul>
         </div>
     </nav>
     <div class="container my-5">


         <div class="row">
             <div class="col-sm-6">

                 <h1>Welcome to Admin Control Panel</h1>

                 <div class="container">
                     <div class="row">
                         <div class="col">
                             <div class="card text-center">
                                 <div class="card-header">
                                     <h3 class="card-title">Users Post</h3>
                                 </div>
                                 <div class="card-body">
                                     <a href="users_post.php"><img src="images/user_post.png" alt="users post image" width="54%" height="54%"></a>
                                     <p class="card-text text-muted">View All Users post.</p>
                                     <a href="users_post.php" class="btn btn-primary"> ALL POST </a>
                                 </div>
                             </div>
                         </div>

                         <div class="col">
                             <div class="card text-center">
                                 <div class="card-header">
                                     <h3 class="card-title">Register User</h3>
                                 </div>
                                 <div class="card-body">
                                     <a href="registered_users.php"> <img src="images/loginimage.jpg" alt="registered_user image" width="53%" height="53%"></a>
                                     <p class="card-text text-muted">View the list of Registered user.</p>
                                     <a href="registered_users.php" class="btn btn-primary"> VIEW LIST</a>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>

             </div>
             <div class="col-sm-6">
             </div>
         </div>
     </div>
     
 </body>

 </html>