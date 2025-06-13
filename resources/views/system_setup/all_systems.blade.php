@extends('layouts.app')
@section('breadcrumb', 'All Systems')
@section('page_title', 'All Systems')


@section('content')
<div class="container mt-4">
    <h2 class="text-white">All Systems</h2>
</div>
<div class="container mt-4">
    @if($all_systems->count())
        <div class="row">
            @foreach($all_systems as $system)
                <div class="col-xl-3 col-sm-6 mb-4">
                    <a href="{{  url($system->link) }}">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <H6 class="font-weight-bolder text-uppercase">{{ $system->name }}</H6>
                                            <p class="text-sm mb-0  font-weight-bold">
                                                {{ $system->description ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle d-flex align-items-center justify-content-center" style="height: 60px; width: 60px;">
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
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-3">
            No systems found for this department.
        </div>
    @endif
</div>
@endsection
