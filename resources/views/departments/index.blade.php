@extends('layouts.app')
@section('breadcrumb', 'Department')
@section('page_title', 'Department')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <button class="btn bg-gradient-dark mb-0" data-toggle="modal" data-target="#new_department"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Department</button>
                      @include('departments.create')
                </div>
            </div>
          <div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 tablewithSearch">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($departments as $department)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $department->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        {{-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a> --}}
                        <button type="button" class="btn btn-icon btn-rounded btn-warning text-secondary font-weight-bold text-xs text-white" data-target="#EditDepartment{{ $department->id }}" data-toggle="modal" title='edit'>
                            Edit
                        </button>
                        @include('departments.edit')
                        <form method="POST" id="cancelForm{{$department->id}}" class="d-inline-block" action="{{url('delete/'.$department->id)}}" onsubmit="show()">
                        @csrf 
                          <button title="Cancel" type="button" class="btn btn-icon btn-rounded btn-danger text-secondary font-weight-bold text-xs text-white" onclick="cancel({{$department->id}})">
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
@endsection

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