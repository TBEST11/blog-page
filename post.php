 
</div>
</div>
<form method="POST" enctype="multipart/form-data"class="container w-50" action="postaction.php">
  <h2>YOU CAN MAKE YOUR POST HERE:</h2>
    <div class="form-group">
  
    <input type="file" class="form-control"  name="postimg" >
  </div>
  <div class="form-group">
    <label for="tiltle">Blog Title</label>
    <input type="text" class="form-control" id="title" name="title"  required>
  </div>
    <div class="form-group">
    <label for="content">Write your post Content</label>
    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Make a Post" required></textarea>
  </div>
  <button class="btn btn-dark" type="submit" name="submitPost">POST</button>
     <div class="col-sm-6">
     </div>
  </div>


</form>
