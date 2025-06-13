@extends('layouts.app')
@section('breadcrumb', 'System Setup')
@section('page_title', 'System Setup')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <button class="btn bg-gradient-dark mb-0" data-toggle="modal" data-target="#new_system"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add System</button>
                      @include('system_setup.create')
                </div>
            </div>
          <div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 tablewithSearch">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logo</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($systems as $system)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $system->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $system->link }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $system->description }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            @foreach ($system->departments as $department)
                                <h6 class="mb-0 text-sm">-{{ $department->name }}</h6>
                            @endforeach
                          </div>
                        </div>
                      </td> <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <img src="{{ asset('storage/' . $system->logo) }}"
                              alt="System Logo"
                              class="img-thumbnail"
                              style="height: 60px; width: 60px; object-fit: contain;">
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                          <button type="button" class="btn btn-icon btn-rounded btn-warning text-secondary font-weight-bold text-xs text-white" data-target="#EditSystem{{ $system->id }}" data-toggle="modal" title='edit'>
                            Edit
                          </button>
                          @include('system_setup.edit')
                          <form method="POST" id="cancelForm{{$system->id}}" class="d-inline-block" action="{{url('delete/system/'.$system->id)}}" onsubmit="show()">
                          @csrf 
                            <button title="Cancel" type="button" class="btn btn-icon btn-rounded btn-danger text-secondary font-weight-bold text-xs text-white" onclick="cancel({{$system->id}})">
                              Delete
                            </button>
                        </form>
                      </td>
                    </tr>  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
  function cancel(id)
    {
        var form = $("#cancelForm"+id)

        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, remove it!",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed)
            {
                form.submit();
            }
        });
    }
</script>
@endsection

