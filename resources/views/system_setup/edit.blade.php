<div class="modal fade" id="EditSystem{{ $system->id }}" tabindex="-1" role="dialog" aria-labelledby="editSystemLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Edit System</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form  method="POST" action="{{ url('edit_system/' . $system->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="system_name">System Name</label>
                <input type="text" class="form-control" name="name" value="{{ $system->name }}">
            </div>
            <div class="form-group">
                <label for="name">link</label>
                <input type="text" class="form-control" name="link" value="{{ $system->link }}">
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea name="description" class="form-control">{{ $system->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="departments">Department</label>
                <select class="form-control" name="departments[]" multiple="multiple">
                  @foreach ($departments as $department)
                      <option value="{{ $department->id }}"
                          @if(in_array($department->id, $system->departments->pluck('id')->toArray()))
                              selected
                          @endif>
                          {{ $department->name }}
                      </option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="formFile{{ $system->id }}" class="form-label">Logo</label>

                <div class="mb-2">
                    <img id="logoPreview{{ $system->id }}" 
                        src="{{ $system->logo ? asset('storage/' . $system->logo) : 'https://via.placeholder.com/80x80?text=No+Logo' }}" 
                        alt="Logo Preview" 
                        style="max-height: 80px;">
                </div>

                <input class="form-control" name="logo" type="file" 
                      id="formFile{{ $system->id }}" 
                      onchange="previewLogo(event, {{ $system->id }})">
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

<script>
function previewLogo(event, systemId) {
    const output = document.getElementById('logoPreview' + systemId);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = () => URL.revokeObjectURL(output.src);
}
</script>