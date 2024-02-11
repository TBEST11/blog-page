<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGN UP</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion"></i>&nbsp;&nbsp;TBEST BLOG</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

   
  </nav>
  <div class="container my-5">
    <h2 style="text-align: center;"> <b>Registration Form</b> </h2>
    <form method="POST" action="./action.php"  enctype="multipart/form-data"class="w-50">
    <div class="form-group">
        <label for="picture">Profile Picture</label>
        <input type="file" class="form-control" name="image"  required/>
      </div> 
    <div class="form-group">
        <label for="username">UserName</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your UserName" required>
      </div> 
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email Address" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="Password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repeat the password you enterd before" required>
      </div>
      <div>
        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        <input type="reset" class="btn btn-secondary ml-2" value="Reset">
      </div>
      <div>
            <p>Already have an account? <a href="login.php"><b> Login here</b></a></p>
      </div>
    </form>
  </div>
</body>

</html>