<?php

// Include configuration file  
require('db.php');
$sql = "SELECT id, image, title, content, created_at  FROM post ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>POST BOARD</title>

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
		<?php include('./admin_post_modal.php');
		if ($result->num_rows > 0) {
		?>

			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">S/N</th>
						<th scope="col">BLOG IMAGE</th>
						<th scope="col">TITLE</th>
						<th scope="col">CONTENT</th>
                        <th scope="col">TIME OF BLOG CREATION </th>
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
							. '<td>' . $row->image . '</td>'
							. '<td>' . $row->title . '</td>'
							. '<td>' . $row->content . '</td>'
                            . '<td>' . $row->created_at . '</td>'
							. '<td>'

							. '<a href="#" title="View Details" class="text-success infobtn" data-toggle="modal" data-target="#viewblogModal"  data-post-id="' . $row->id . ' " data-image="' . $row->image . ' " data-title="' . $row->title . ' " data-content="' . $row->content . '" data-created-at="' . $row->created_at . '"><i class="fas fa-info-circle fa-lg">&nbsp;&nbsp;</i></a>'
							. '<a href="#" title="Edit" class="text-primary editbtn" data-toggle="modal" data-target="#editblogModal"  data-blog-id="' . $row->id . ' " data-image="' . $row->image . ' " data-title="' . $row->title . ' " data-content="' . $row->content . '" data-created-at="' . $row->created_at . '"><i class="fas fa-edit fa-lg">&nbsp;&nbsp;</i></a>'
							. '<a href="#" title="Delete" class="text-danger delbtn" data-toggle="modal" data-target="#deleteblogModal" data-post-id=" ' . $row->id . '"><i class="fas fa-trash-alt fa-lg">&nbsp;&nbsp;</i></a>'
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
			$("#viewbPostModal").modal('show');
				   $("#id").text($(this).data('post-id'));
				   $("#viewImage").file(`Image:   ${$(this).data('image')}`);
				   $("#viewTitle").text(`Title:   ${$(this).data('Title')}`);
				   $("#viewContent").text(`Content:    ${$(this).data('content')}`);
                   $("#viewcreated_at").text(`Time of Creation:   ${$(this).data('Created-at')}`);
				  
			

			 	});



			
			
			// Edit User

			$("body").on("click", (".editbtn"), function() {
				
				//console.log($(this).data('start-date'));
				
				
				$("#editPostModal").modal('show');
				$("#id").val($(this).data('post-id'));
				$("#editImage").val($(this).data('image'));
				$("#editTitle").val($(this).data('title'));
				$("#editContent").val($(this).data('content'));
                $("#editCreatedAt").val($(this).data('created-at'));
				
				
			});
			
			// Delete user
			 $("body").on("click", ".delbtn", function(e) {
				 e.preventDefault();
			 	$("#deletepostrModal").modal('show');
				 $("#delpostId").val($(this).data('post-id'));
			
			 });
		
		});
	</script>
</body>

</html>