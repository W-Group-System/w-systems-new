<div class="modal fade" id="new_system" tabindex="-1" role="dialog" aria-labelledby="newSystemLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Add New System</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form  method="POST" action="{{ url('/new_system') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">System Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="name">link</label>
                <input type="text" class="form-control" name="link" required>
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="departments">Department</label>
                <select class="form-control" name="departments[]" multiple="multiple">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="formFile" class="form-label">Logo</label>
              <input class="form-control" name="logo" type="file" id="formFile">
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
