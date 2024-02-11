<?php

// Include configuration file  
require('db.php');
$sql = "SELECT id, username, email, password  FROM users ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>USER BOARD</title>

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
	<div class="container">
		<?php include('./admin_users_modal.php');
		if ($result->num_rows > 0) {
		?>

			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">S/N</th>
						<th scope="col">USERNAME</th>
						<th scope="col">EMAIL</th>
						<th scope="col">PASSWORD</th>
                        <th scope="col">ACTIONS</th>
					</tr>
				</thead>
				<tbody>

					<?php
					// Loop the user data

					echo '<table class="table table-bordered">';
					$i = 1;
					while ($row = $result->fetch_object()) {

						echo '<tr>'
							. '<td>' . $i++ . '</td>'
							. '<td>' . $row->username . '</td>'
							. '<td>' . $row->email . '</td>'
							. '<td>' . $row->password . '</td>'
							. '<td>'

							. '<a href="#" title="View Details" class="text-success infobtn" data-toggle="modal" data-target="#viewblogModal"  data-blog-id="' . $row->id . ' " data-username="' . $row->username . ' " data-email="' . $row->email . ' " data-password="' . $row->password . '"><i class="fas fa-info-circle fa-lg">&nbsp;&nbsp;</i></a>'
							. '<a href="#" title="Edit" class="text-primary editbtn" data-toggle="modal" data-target="#editblogModal"  data-blog-id="' . $row->id . ' " data-username="' . $row->username . ' " data-email="' . $row->email . ' " data-password="' . $row->password . '"><i class="fas fa-edit fa-lg">&nbsp;&nbsp;</i></a>'
							. '<a href="#" title="Delete" class="text-danger delbtn" data-toggle="modal" data-target="#deleteblogModal" data-blog-id=" ' . $row->id . '"><i class="fas fa-trash-alt fa-lg">&nbsp;&nbsp;</i></a>'
							. '</td>'
							. '</tr>';
					}

					?>
				</tbody>
			</table>
		<?php
		} else {
			echo '<h3>No Available Data</h3>';
		}
		?>
	</div>
	<div>
		<a href="admin_dashboard.php"><b>Go back</b></a>
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


			// showAllUser()
			$("body").on("click", (".infobtn"), function() {
			$("#viewblogModal").modal('show');
				   $("#id").text($(this).data('blog-id'));
				   $("#viewUsername").text(`Username:   ${$(this).data('username')}`);
				   $("#viewEmail").text(`Email:   ${$(this).data('email')}`);
				   $("#viewPassword").text(`Password:    ${$(this).data('password')}`);
				  
			

			 	});



			
			
			// Edit User

			$("body").on("click", (".editbtn"), function() {
				
				//console.log($(this).data('start-date'));
				
				
				$("#editblogModal").modal('show');
				$("#id").val($(this).data('blog-id'));
				$("#editUsername").val($(this).data('username'));
				$("#editEmail").val($(this).data('email'));
				$("#editPassword").val($(this).data('password'));
				
				
			});
			
			// Delete user
			 $("body").on("click", ".delbtn", function(e) {
				 e.preventDefault();
			 	$("#deleteblogModal").modal('show');
				 $("#delBlogId").val($(this).data('blog-id'));
			
			 });
		
		});
	</script>
</body>

</html>