@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Add New Vehicle</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="index.html"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Vehicles
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">
                                Add New Vehicle</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('vehicle.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Input vehicle name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="name">Number</label>
                <input type="text" name="number" class="form-control" placeholder="Input vehicle number">
            </div>
            <div class="col-md-12 mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="" rows="5"></textarea>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
</div>
@endsection