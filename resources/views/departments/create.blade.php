<div class="modal fade" id="new_department" tabindex="-1" role="dialog" aria-labelledby="newDepartmentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Add New Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form  method="POST" action="{{ url('new_department') }}">
            @csrf
            <div class="form-group">
                <label for="department_name">Department Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>

      

    </div>
  </div>
</div>
