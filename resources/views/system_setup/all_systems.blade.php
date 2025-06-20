@extends('layouts.app')
{{-- @section('breadcrumb', 'All Systems')
@section('page_title', 'All Systems') --}}


@section('content')
<div class="container mt-1">
    <h2 class="text-white">W Group Systems</h2>
</div>
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-6">
            <form method="GET" action="">
                <div class="row align-items-center mb-3">
                    <div class="col-md-6">
                        {{-- <label for="department" class="form-label text-white">Filter by Department</label> --}}
                        <select name="department" id="department" class="form-control select2" onchange="this.form.submit(); this.form.show()">
                            <option value="">All Departments</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ request('department') == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form method="GET" class="w-100 d-flex justify-content-end" onsubmit="show()">
                <div class="input-group w-60">
                    <input type="text" class="form-control" style="height:40px" name="search" placeholder="Search" value="{{ request('search') }}">
                    <button class="btn btn-info" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if($all_systems->count())
        <div class="row">
            @foreach($all_systems as $system)
            <div class="col-md-3 mt-md-0 mb-4">
                 <a href="{{  url($system->link) }}" onclick="show()">
                    <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                       <div class="icon icon-shape icon-lg bg-gradient-warning shadow text-center border-radius-lg d-flex align-items-center justify-content-center mx-auto" style="height: 90px; width: 90px;">
                        <img src="{{ asset('storage/' . $system->logo) }}"
                            alt="System Logo"
                            class="img-fluid rounded-circle"
                            style="height: 90px; width: 90px; object-fit: contain;">
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                        @php
                            $description = $system->description ?? '';
                            $words = explode(' ', $description);
                            $limited = implode(' ', array_slice($words, 0, 12));
                        @endphp
                      <p class="text-center mb-0"  title="{{ $description }}" style="min-height: 3em; overflow: hidden; font-size: 12px;"> 
                        {{ count($words) > 10 ? $limited . '...' : $description }}
                      </p>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">{{ $system->name }}</h5>
                    </div>
                  </div>
                 </a>
                </div>
                {{-- <div class="col-xl-3 col-sm-6 mb-4">
                    <a href="{{  url($system->link) }}">
                        <div class="card" style="min-height: 150px;">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <H6 class="font-weight-bolder text-uppercase">{{ $system->name }}</H6>
                                            <p class="text-sm mb-0 font-weight-bold">
                                                @php
                                                    $description = $system->description ?? '';
                                                    $words = explode(' ', $description);
                                                    $limited = implode(' ', array_slice($words, 0, 10));
                                                @endphp

                                                <p class="text-sm mb-0 font-weight-bold" title="{{ $description }}" style="min-height: 3em; overflow: hidden;">
                                                    {{ count($words) > 10 ? $limited . '...' : $description }}
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle d-flex align-items-center justify-content-center" style="height: 70px; width: 70px;">
                                            <img src="{{ asset('storage/' . $system->logo) }}"
                                                alt="System Logo"
                                                class="img-fluid rounded-circle"
                                                style="height: 60px; width: 60px; object-fit: contain;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-3">
            No systems found for this department.
        </div>
    @endif
</div>
@endsection
