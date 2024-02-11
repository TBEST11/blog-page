
<!--view modal-->
<div class="modal fade" id="viewPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">POST Details </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <div class="modal-body" px-4>
            <form action="" method="post" id="show-form-data">
            <div class="form-group">
                <label id="viewImage"></label>
              </div>
              <div class="form-group">
                <label id="viewTitle"></label>
              </div>
              <div class="form-group">
                <label id="viewContent"></label>
              </div>
              <div class="form-group">
                <label id="viewCreatedAt"></label>
              </div>
              <div class="form-group">

              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
        <!--button type="button" class="btn btn-primary">Ok</button-->
      </div>
    </div>
  </div>
</div>

<!-- Edit modal  -->
<div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Post Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body" px-4>
          <form action="edit_post.php" method="post" id="Edit-form-data">
            <input type="hidden" name="id" id="id" class="form-control" required>
            <div class="form-group">
              <input type="file" name="image" class="form-control" id="editImage" required>
            </div>
            <div class="form-group">
              <input type="text" name="title" class="form-control" id="editTitle" required>
            </div>
            <div class="form-group">
              <input type="text" name="content" class="form-control" id="editContent" required>
            </div>
            <div class="form-group">
              <input type="date" name="created_at" class="form-control" id="editCreatedAt" required>
            </div>
            <button type="submit" name="editBlogBtn" class="btn btn-primary" id="update">UPDATE</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

      </div>
    </div>
  </div>
</div>


<!--Delete modal-->
<div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" style="text-align:center; color:red" id="exampleModalLabel">DELETE! </h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <div class="modal-body" px-4>
            <form action="editpost.php" method="POST" id="show-form-data">
              <div class="form-group">
              <h3 style="text-align:center; color:red">Do you want to Delete the Record on row ?</h3>
                <input type="text" name="id" id="delPostId" />
              </div>
              <button type="submit" name="deletePostBtn" class="btn btn-danger" id="delete">DELETE</button>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>