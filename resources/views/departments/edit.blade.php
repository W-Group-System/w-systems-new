<div class="modal fade" id="EditDepartment{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="editDepartmentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Edit Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form  method="POST" action="{{ url('edit_department/' . $department->id) }}">
            @csrf
            <div class="form-group">
                <label for="department_name">Department Name</label>
                <input type="text" class="form-control" name="name" value="{{ $department->name }}">
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
