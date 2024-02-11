
<!--view modal-->
<div class="modal fade" id="viewblogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Details </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <div class="modal-body" px-4>
            <form action="" method="post" id="show-form-data">
            <div class="form-group">
                <label id="viewUsername"></label>
              </div>
              <div class="form-group">
                <label id="viewEmail"></label>
              </div>
              <div class="form-group">
                <label id="viewPassword"></label>
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
<div class="modal fade" id="editblogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update your Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body" px-4>
          <form action="editblog.php" method="post" id="Edit-form-data">
            <input type="hidden" name="id" id="id" class="form-control" required>
            <div class="form-group">
              <input type="text" name="username" class="form-control" id="editUsername" required>
            </div>
            <div class="form-group">
              <input type="text" name="email" class="form-control" id="editEmail" required>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="editPassword" required>
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
<div class="modal fade" id="deleteblogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="editblog.php" method="POST" id="show-form-data">
              <div class="form-group">
              <h3 style="text-align:center; color:red">Do you want to Delete the Record on row ?</h3>
                <input type="text" name="id" id="delBlogId" />
              </div>
              <button type="submit" name="deleteBlogBtn" class="btn btn-danger" id="delete">DELETE</button>
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